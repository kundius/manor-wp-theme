function setCaptchaToken(form, token) {
  const captchaInput = form.querySelector('[name="smartcaptcha-token"]')

  if (captchaInput) {
    captchaInput.value = token || ''
  }
}

function initSmartCaptchaForForm(form) {
  if (form.dataset.smartCaptchaInitialized === 'true') {
    return
  }

  const container = form.querySelector('[data-smartcaptcha-container]')
  const captchaInput = form.querySelector('[name="smartcaptcha-token"]')

  if (!container || !captchaInput || typeof window.smartCaptcha?.render !== 'function') {
    return
  }

  const widget = window.smartCaptcha.render(container, {
    sitekey: theme_ajax?.smartCaptchaSiteKey || '',
    callback: (token) => setCaptchaToken(form, token),
  })

  const widgetId = typeof widget === 'object' ? widget.id || widget.widgetId || widget : widget

  if (widgetId) {
    form.dataset.smartCaptchaWidgetId = String(widgetId)
  }

  form.dataset.smartCaptchaInitialized = 'true'
}

window.initSmartCaptcha = () => {
  const items = document.querySelectorAll('[data-feedback-form]') || []

  Array.from(items).forEach(initSmartCaptchaForForm)
}

export function applyFeedbackForm(form) {
  const submit = form.querySelector('[type="submit"]')
  const errors = form.querySelector('[data-feedback-form-errors]')
  const reset = form.querySelector('[data-feedback-form-reset]')

  form.addEventListener('submit', (e) => {
    e.preventDefault()

    errors.innerHTML = ''
    form.setAttribute('data-feedback-form-status', 'loading')
    submit.setAttribute('disabled', '')

    const captchaInput = form.querySelector('[name="smartcaptcha-token"]')
    if (captchaInput && !captchaInput.value) {
      form.setAttribute('data-feedback-form-status', 'failure')
      errors.innerHTML = 'Подтвердите, что вы не робот.'
      submit.removeAttribute('disabled')
      return
    }

    const formData = new FormData(e.target)
    formData.append('action', form.dataset.feedbackFormAction)

    fetch(e.target.action, {
      method: 'post',
      body: formData
    })
      .then(async (response) => {
        const text = await response.text()

        try {
          return JSON.parse(text)
        } catch (error) {
          throw new Error(`Ошибка разбора JSON: ${error?.message || 'неизвестная ошибка'}${text ? `\n${text}` : ''}`)
        }
      })
      .then((result) => {
        if (!result.success) {
          errors.innerHTML = Object.values(result.data).join('<br>')
          form.setAttribute('data-feedback-form-status', 'failure')
        } else {
          form.setAttribute('data-feedback-form-status', 'success')
          form.reset()
          setCaptchaToken(form, '')

          if (form.dataset.smartCaptchaWidgetId && typeof window.smartCaptcha?.reset === 'function') {
            window.smartCaptcha.reset(form.dataset.smartCaptchaWidgetId)
          }

          if (form.dataset.feedbackFormGoal && typeof ym !== 'undefined') {
            const elYmId = document.querySelector('[data-ym-id]')
            if (elYmId && elYmId.dataset.ymId) {
              ym(elYmId.dataset.ymId, 'reachGoal', form.dataset.feedbackFormGoal)
              console.log('goal', elYmId.dataset.ymId, form.dataset.feedbackFormGoal)
            }
          }

          setTimeout(() => {
            form.removeAttribute('data-feedback-form-status')
          }, 4000)
        }
      })
      .catch((error) => {
        console.error(error)
        form.setAttribute('data-feedback-form-status', 'failure')
        if (errors) {
          errors.innerHTML = `Ошибка отправки формы. ${error.message}`
        }
      })
      .finally(() => {
        submit.removeAttribute('disabled')
      })
  })

  reset.addEventListener('click', () => {
    form.removeAttribute('data-feedback-form-status')
  })
}

export function initFeedbackForm() {
  const items = document.querySelectorAll('[data-feedback-form]') || []

  Array.from(items).forEach(applyFeedbackForm)
  window.initSmartCaptcha()
}
