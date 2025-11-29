<?php
$inquiry_options = [
  'Увеличить/уменьшить площадь',
  'Изменить материалы отделки',
  'Сделать перепланировку',
  'Изменить материал кровли',
  'Добавить утеплитель',
  'Изменить высоту потолков',
  'Увеличить/изменить окна',
  'Добавить/убрать терассу, крыльцо и др.'
];
?>
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
        <form action="" class="project-inquiry__form">
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
          <div class="project-inquiry__control">
            <span class="project-inquiry__control-label">Телефон</span>
            <input type="text" value="" name="phone" data-maska="+7 (###) ###-##-##" placeholder="+7 (000) 000-00-00" class="project-inquiry__control-input">
            <button type="submit" class="project-inquiry__control-submit">Получить расчёт</button>
          </div>
          <div class="project-inquiry__rules">
            Нажимая на кнопку, я даю своё <a href="">согласие на взаимодействие и обработку персональных данных</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>