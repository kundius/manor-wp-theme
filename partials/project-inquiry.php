<?php
$inquiry_options = [
  'Увеличить/уменьшить площадь',
  'Изменить материалы отделки',
  'Сделать перепланировку',
  'Изменить материал кровли',
  'Добавить утеплитель',
  'Изменить высоту потолков',
  'Увеличить/изменить окна',
  'Добавить/убрать терассу, крыльцо и др.',
]; ?>
<section class="project-inquiry" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0">
  <div class="container">
    <div class="project-inquiry__layout">
      <div class="project-inquiry__layout-left">
        <div class="project-inquiry__content">
          <div class="project-inquiry__title">
            Понравился проект, но хотите внести изменения?
          </div>
          <div class="project-inquiry__desc">
            Рассчитаем стоимость за 1 день
          </div>
        </div>
      </div>
      <div class="project-inquiry__layout-right">
        <form
          action="<?php echo admin_url('admin-ajax.php'); ?>"
          class="project-inquiry__form"
          data-feedback-form
          data-feedback-form-goal=""
          data-feedback-form-action="feedback_form"
        >
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(
            'feedback-nonce',
          ); ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="Рассчитаем стоимость за 1 день">

          <div class="project-inquiry__options">
            <?php foreach ($inquiry_options as $inquiry_option): ?>
              <label class="project-inquiry__option">
                <input type="checkbox" name="option[]" value="<?php echo $inquiry_option; ?>" class="project-inquiry__option-input">
                <span class="project-inquiry__option-checkbox"></span>
                <span class="project-inquiry__option-label">
                  <?php echo $inquiry_option; ?>
                </span>
              </label>
            <?php endforeach; ?>
          </div>
          <div class="project-inquiry__errors" data-feedback-form-errors></div>
          <div class="project-inquiry__control">
            <span class="project-inquiry__control-label">Телефон</span>
            <input type="text" value="" name="phone" data-maska="+7 (###) ###-##-##" placeholder="+7 (000) 000-00-00" class="project-inquiry__control-input">
            <button type="submit" class="project-inquiry__control-submit">Получить расчёт</button>
          </div>
          <div class="project-inquiry__rules">
            <?php echo nl2br(carbon_get_theme_option('crb_form_rules')); ?>
          </div>
          <div class="project-inquiry-success">
            <div class="project-inquiry-success__title">
              Сообщение успешно отправлено
            </div>
            <div class="project-inquiry-success__desc">
              Мы свяжемся с вами в ближайшее время
            </div>
            <button type="button" class="project-inquiry-success__close" data-feedback-form-reset>Закрыть</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
