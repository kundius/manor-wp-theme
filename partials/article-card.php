<article class="article-card <?php if (
  isset($args['reverse'])
): ?> article-card--reverse <?php endif; ?>">
  <figure class="article-card__media">
    <?php the_post_thumbnail('full', ['class' => 'article-card__image']); ?>
    <div class="article-card__date"><?php echo get_the_date('d.m.Y'); ?></div>
    <div class="article-card__title"><?php the_title(); ?></div>
  </figure>
  <?php if ($content = get_the_content()): ?>
  <div class="article-card__content">
    <?php echo $content; ?>
  </div>
  <?php endif; ?>
</article>
