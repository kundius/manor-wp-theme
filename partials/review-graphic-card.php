

<?php
$video = carbon_get_the_post_meta('video');
$rutube_id = extract_rutube_id($video);
?>
<article class="review-graphic-card">
  <figure class="review-graphic-card__media">
    <?php if (has_post_thumbnail()): ?>
    <a href="<?php echo get_the_post_thumbnail_url(
      get_the_ID(),
      'full',
    ); ?>" data-fslightbox="graphic" target="_blank">
      <?php the_post_thumbnail('medium', [
        'class' => 'review-graphic-card__image',
      ]); ?>
    </a>
    <?php else: ?>
      <img src="<?php bloginfo(
        'template_url',
      ); ?>/assets/No-Image-Placeholder.png" alt="" class="review-graphic-card__image">
    <?php endif; ?>
  </figure>
  <div class="review-graphic-card__body">
    <div class="review-graphic-card__date">
      <?php echo get_the_date('Y'); ?>
    </div>
    <div class="review-graphic-card__content">
      <?php echo get_the_content(); ?>
    </div>
  </div>
</article>
