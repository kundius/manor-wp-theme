<div class="feedback-form" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
  <div class="feedback-form__side">
    <div class="feedback-form__photo"></div>
    <div class="feedback-form__person">
      <div class="feedback-form__person-name">
        Фамилия И.О.
      </div>
      <div class="feedback-form__person-job">
        Менеджер компании
      </div>
    </div>
    <div class="feedback-form__phone">
      <div class="feedback-form__phone-lbl">
        Телефон для связи
      </div>
      <div class="feedback-form__phone-val">
        8-960-209-79-33
      </div>
    </div>
  </div>
  <form
    class="feedback-form__main"
    action="<?php echo admin_url('admin-ajax.php'); ?>"
    data-feedback-form
    data-feedback-form-goal=""
    data-feedback-form-action="feedback_form"
  >
    <input type="hidden" name="submitted" value="">
    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce'); ?>">
    <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
    <input type="hidden" name="subject" value="Заказать звонок">

    <div class="feedback-form__errors" data-feedback-form-errors></div>

    <div class="feedback-form__header">
      <div class="feedback-form__header-icon"></div>
      <div class="feedback-form__header-title">
        Получить<br>
        консультацию специалиста
      </div>
      <div class="feedback-form__header-desc">
        Выбор дома - это непростая задача со множеством переменных. Мы проконсультируем вас по любым вопросам
      </div>
    </div>
    <div class="feedback-form__input phone-control">
      <span class="phone-control__label">Ваш телефон</span>
      <input type="text" value="" name="phone" data-maska="+7 (###) ###-##-##" placeholder="+7 (000) 000-00-00" class="phone-control__input" required>
    </div>
    <button type="submit" class="feedback-form__submit">Отправить заявку</button>
    <div class="feedback-form__rules">
      <?php echo nl2br(carbon_get_theme_option('crb_form_rules')); ?>
      Нажимая на кнопку, я даю своё <a href="">согласие</a> на <a href="">взаимодействие</a> и <a href="">обработку персональных данных</a>
    </div>
    <div class="feedback-form-success">
      <div class="feedback-form-success__title">
        Сообщение успешно отправлено
      </div>
      <div class="feedback-form-success__desc">
        Мы свяжемся с вами в ближайшее время
      </div>
      <button type="button" class="feedback-form-success__close" data-feedback-form-reset>Закрыть</button>
    </div>
  </form>
  <svg xmlns="http://www.w3.org/2000/svg" width="519px" height="449px" class="feedback-form__figure-gray">
    <path fill-rule="evenodd" fill="rgb(225, 229, 238)" d="M-0.000,77.227 L122.118,-0.001 L501.041,102.371 L518.1000,448.999 L26.938,425.651 L-0.000,77.227 Z" />
  </svg>
  <svg xmlns="http://www.w3.org/2000/svg" width="912px" height="497px" class="feedback-form__figure-red">
    <path fill-rule="evenodd" fill="rgb(201, 65, 60)" d="M-0.000,142.999 L349.1000,-0.001 L891.1000,110.999 L911.1000,496.999 L47.1000,466.999 L-0.000,142.999 Z" />
  </svg>
</div>
