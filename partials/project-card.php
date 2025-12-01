<?php
$type = carbon_get_the_post_meta('type');
$dimensions = carbon_get_the_post_meta('dimensions');
$type_label = [
  'frame' => 'КД',
];
?>
<div class="project-card">
  <div class="project-card__media">
    <?php if ($sticker_text = carbon_get_the_post_meta('sticker_text')): ?>
      <div class="project-card__flag project-card__flag--<?php echo carbon_get_the_post_meta('sticker_color'); ?>">
        <?php echo $sticker_text; ?>
      </div>
    <?php endif; ?>
    <?php the_post_thumbnail('medium', [
      'class' => 'project-card__image'
    ]) ?>
  </div>
  <div class="project-card__title">
    <?php echo $type_label[$type]; ?> <span class="font-for-number"><?php echo $dimensions; ?></span> «<?php the_title(); ?>»
  </div>
  <div class="project-card__data">
    <div class="project-card__params">
      <?php if ($total_area = carbon_get_the_post_meta('total_area')): ?>
        <div class="project-card__param">
          <div class="project-card__param-ico">
            <span class="icon icon-area"></span>
          </div>
          <div class="project-card__param-val">
            <?php echo $total_area; ?> м<sup>2</sup>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($duration = carbon_get_the_post_meta('duration')): ?>
        <div class="project-card__param">
          <div class="project-card__param-ico">
            <span class="icon icon-calendar"></span>
          </div>
          <div class="project-card__param-val">
            <?php echo $duration; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php if ($price = carbon_get_the_post_meta('price')): ?>
      <div class="project-card__price">
        <div class="project-card__price-lbl">
          от
        </div>
        <div class="project-card__price-val">
          <?php echo number_format($price, 0, ',', ' '); ?>
        </div>
        <div class="project-card__price-cur">
          ₽
        </div>
      </div>
    <?php endif; ?>
  </div>
  <div class="project-card__actions">
    <button type="button" class="project-card__action project-card__action--order">
      Заказать
    </button>
    <a href="<?php the_permalink(); ?>" class="project-card__action project-card__action--show">
      Смотреть проект
    </a>
  </div>
</div>