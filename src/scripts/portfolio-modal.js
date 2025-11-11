// import MicroModal from 'micromodal'

import { applySlideshowEmbla } from './slideshow-embla'

// export function initModal() {
//   const triggers = document.querySelectorAll('[data-modal-open]') || []

//   Array.from(triggers).forEach((trigger) => {
//     trigger.addEventListener('click', e => {
//       e.preventDefault()
//       MicroModal.show(trigger.dataset.modalOpen, {
//         awaitOpenAnimation: true,
//         awaitCloseAnimation: true,
//         closeTrigger: 'data-modal-close'
//       })
//     })
//   })
// }
export function applyPortfolioModal(trigger) {
  // const viewportNode = root.querySelector('[data-portfolio-embla-viewport]')

  const open = () => {
    const data = JSON.parse(trigger.dataset.portfolioModal)
    console.log(data)
    const id = `modal-${Date.now()}`

    const modalEl = document.createElement('div')
    modalEl.setAttribute('id', id)
    modalEl.setAttribute('class', 'modal protfolio-modal')
    modalEl.setAttribute('aria-hidden', 'true')

    const overlayEl = document.createElement('div')
    overlayEl.setAttribute('class', 'modal__overlay')
    overlayEl.setAttribute('tabindex', '-1')
    overlayEl.setAttribute('data-modal-close', '')

    const containerEl = document.createElement('div')
    containerEl.setAttribute('class', 'modal__container')
    containerEl.setAttribute('role', 'dialog')
    containerEl.setAttribute('aria-modal', 'true')

    const closeEl = document.createElement('button')
    closeEl.setAttribute('class', 'modal__close')
    closeEl.setAttribute('aria-label', 'Закрыть')
    closeEl.setAttribute('data-modal-close', '')

    const contentEl = document.createElement('div')
    contentEl.setAttribute('class', 'modal__content')

    contentEl.innerHTML = `
<div class="protfolio-modal__layout">
<div class="protfolio-modal__layout-body">

            <div class="slideshow-embla" data-slideshow-embla>
              <div class="slideshow-embla__viewport" data-slideshow-embla-viewport>
                <div class="slideshow-embla__container">
                  ${data.images.map(
                    (image) => `<div class="slideshow-embla__slide"><img src="${image}" /></div>`
                  )}
                </div>
              </div>
              <button class="slideshow-embla__control" type="button" data-slideshow-embla-prev>
                <span class="icon icon-chevron-left"></span>
              </button>
              <button class="slideshow-embla__control" type="button" data-slideshow-embla-next>
                <span class="icon icon-chevron-right"></span>
              </button>
            </div>

</div>
<div class="protfolio-modal__layout-side">
<div class="protfolio-modal__header">
<div class="protfolio-modal__year">
${data.year}
</div>
<div class="protfolio-modal__title">
${data.title}
</div>
</div>
<div class="protfolio-modal__desc">
${data.desc}
</div>
</div>
</div>
    `

    contentEl.appendChild(closeEl)
    containerEl.appendChild(contentEl)
    overlayEl.appendChild(containerEl)
    modalEl.appendChild(overlayEl)
    document.body.appendChild(modalEl)

    const nodes = Array.from(contentEl.querySelectorAll('[data-slideshow-embla]'))
    nodes.forEach(applySlideshowEmbla)

    // onShow: modal => console.info(`${modal.id} is shown`), // [1]
    // onClose: modal => console.info(`${modal.id} is hidden`), // [2]
    // openTrigger: 'data-custom-open', // [3]
    // closeTrigger: 'data-custom-close', // [4]
    // openClass: 'is-open', // [5]
    // disableScroll: true, // [6]
    // disableFocus: false, // [7]
    // awaitOpenAnimation: false, // [8]
    // awaitCloseAnimation: false, // [9]
    // debugMode: true // [10]
    MicroModal.show(id, {
      awaitOpenAnimation: true,
      awaitCloseAnimation: true,
      closeTrigger: 'data-modal-close',
      onClose: () => overlayEl.addEventListener('animationend', () => modalEl.remove())
    })
  }

  trigger.addEventListener('click', open)
}

export function initPortfolioModal() {
  const nodes = Array.from(document.querySelectorAll('[data-portfolio-modal]'))
  nodes.forEach(applyPortfolioModal)
}
