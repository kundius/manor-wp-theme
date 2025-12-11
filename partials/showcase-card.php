<?php
$type = carbon_get_the_post_meta('type');
$dimensions = carbon_get_the_post_meta('dimensions');
$type_label = [
  'frame' => 'КД',
];
?>
<div class="showcase-card">
  <div class="showcase-card__media">
    <?php the_post_thumbnail('custom-medium', [
      'class' => 'showcase-card__image',
    ]); ?>
    <a href="<?php the_permalink(); ?>" class="showcase-card__more">смотреть проект подробнее</a>
  </div>
  <div class="showcase-card__footer">
    <div class="showcase-card__title">
      <?php echo $type_label[
        $type
      ]; ?> <span class="font-for-number"><?php echo $dimensions; ?></span> «<?php the_title(); ?>»
    </div>
    <?php if ($price = carbon_get_the_post_meta('price')): ?>
      <div class="showcase-card__price">
        <div class="showcase-card__price-num">
          <?php echo number_format($price, 0, ',', ' '); ?>
        </div>
        <div class="showcase-card__price-cur">
          ₽
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
