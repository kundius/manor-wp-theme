<article class="article-card">
  <figure class="article-card__media">
    <?php the_post_thumbnail('full', ['class' => 'article-card__image']); ?>
    <div class="article-card__date"><?php echo get_the_date('d.m.Y'); ?></div>
    <div class="article-card__title"><?php the_title(); ?></div>
  </figure>
  <div class="article-card__header">
    <div class="article-card__date"><?php echo get_the_date('d.m.Y'); ?></div>
    <div class="article-card__title"><?php the_title(); ?></div>
  </div>
  <?php if ($content = get_the_content()): ?>
  <div class="article-card__content">
    <?php echo $content; ?>
  </div>
  <?php endif; ?>
</article>
