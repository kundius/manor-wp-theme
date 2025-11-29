<?php
$work_scheme = [
  1 => 'Заполните <a href="#">форму заявки</a> или позвоните нам<br> по бесплатному номеру<br> <a href="tel:88007077353"><strong>8 (800) 707-73-53</strong></a>',
  2 => 'Связываемся с вами для уточнения деталей, вносим изменения, подбираем комплектацию,  составляем подробное техническое описание',
  3 => 'Заключаем договор: договоренности отражаем в комплектации, пропишем гарантию, фиксируем стоимость',
  4 => 'Вы оплачиваете 70% стоимости после завоза материал0в на участок',
  5 => 'Строим точно в срок с соблюдением регламентов, используя современные инструменты',
  6 => '30% оплачивается по окончании строительства и подписания акта приема-передачи объекта',
];
?>
<section class="work-scheme">
  <div class="container">
    <div class="work-scheme__title" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
      <div class="work-scheme__title-inner">Схема работы</div>
    </div>
    <div class="work-scheme__list">
      <?php foreach ($work_scheme as $key => $item): ?>
        <div class="work-scheme__item">
          <div class="work-scheme__item-num">
            <?php echo $key; ?>
          </div>
          <div class="work-scheme__item-check"></div>
          <div class="work-scheme__item-desc">
            <?php echo $item; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>