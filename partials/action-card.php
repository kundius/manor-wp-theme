<article class="action-card">
  <figure class="action-card__media">
    <?php the_post_thumbnail('full', ['class' => 'action-card__image']); ?>
  </figure>
  <div class="action-card__header">
    <?php if ($result = getLastDayAndMonth()): ?>
    <div class="action-card__date"><?php echo "Только до {$result['day']} {$result['month']}"; ?></div>
    <?php endif; ?>
    <div class="action-card__title"><?php the_title(); ?></div>
  </div>
  <?php if ($content = get_the_content()): ?>
  <div class="action-card__content">
    <?php echo $content; ?>
  </div>
  <?php endif; ?>
</article>
