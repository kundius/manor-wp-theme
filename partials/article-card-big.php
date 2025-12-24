<article class="article-card-big <?php if (
  isset($args['reverse'])
): ?> article-card-big--reverse <?php endif; ?>">
  <figure class="article-card-big__media">
    <?php the_post_thumbnail('full', ['class' => 'article-card-big__image']); ?>
    <div class="article-card-big__header">
      <div class="article-card-big__date"><?php echo get_the_date('d.m.Y'); ?></div>
      <div class="article-card-big__title"><?php the_title(); ?></div>
    </div>
  </figure>
  <?php if ($content = get_the_content()): ?>
  <div class="article-card-big__content">
    <?php echo $content; ?>
  </div>
  <?php endif; ?>
</article>
