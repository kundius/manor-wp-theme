<article class="article-card">
  <figure class="article-card__media">
    <?php the_post_thumbnail('full', ['class' => 'article-card__image']); ?>
  </figure>
  <div class="article-card__header">
    <div class="article-card__date"><?php echo get_the_date('d.m.Y'); ?></div>
    <div class="article-card__title"><?php the_title(); ?></div>
  </div>
  <?php if ($excerpt = get_the_excerpt()): ?>
  <div class="article-card__content">
    <?php echo $excerpt; ?>
  </div>
  <?php endif; ?>
  <div class="article-card__more">
    <a href="<?php the_permalink(); ?>" class="article-card__more-link">Читать далее</a>
  </div>
</article>
