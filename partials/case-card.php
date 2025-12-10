<article class="case-card">
  <figure class="case-card__media">
    <?php the_post_thumbnail('medium', [
      'class' => 'case-card__media-image',
    ]); ?>
  </figure>
  <div class="case-card__body">
    <?php if ($date = get_the_date('d.m.Y')): ?>
    <div class="case-card__date">
      <span class="icon icon-calendar"></span>
      <?php echo $date; ?>
    </div>
    <?php endif; ?>
    <div class="case-card__title">
      <?php the_title(); ?>
    </div>
    <div class="case-card__params">
      <?php if ($dimensions = carbon_get_the_post_meta('dimensions')): ?>
      <div class="case-card__param">
        <div class="case-card__param-ico">
          <span class="icon icon-area"></span>
        </div>
        <div class="case-card__param-val">
          <?php echo $dimensions; ?> м<sup>2</sup>
        </div>
      </div>
      <?php endif; ?>
      <?php if ($duration = carbon_get_the_post_meta('duration')): ?>
      <div class="case-card__param">
        <div class="case-card__param-ico">
          <span class="icon icon-clock-circle"></span>
        </div>
        <div class="case-card__param-val">
          <?php echo $duration; ?> <?php echo plural($duration, ['день', 'дня', 'дней']); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <div class="case-card__footer">
      <a href="<?php the_permalink(); ?>" class="case-card__more">Смотреть проект</a>
    </div>
  </div>
</article>
