<div class="portfolio-card">
  <?php if (has_post_thumbnail()): ?>
  <div class="portfolio-card__media">
    <a href="<?php echo get_the_post_thumbnail_url(
      get_the_ID(),
      'full',
    ); ?>" data-fslightbox="gallery" target="_blank" class="portfolio-card-thumb">
      <?php the_post_thumbnail('custom-large', [
        'class' => 'portfolio-card-thumb__image',
      ]); ?>
      <span class="portfolio-card-thumb__loupe">
        <span class="icon icon-search"></span>
      </span>
    </a>
    <?php if ($gallery = carbon_get_the_post_meta('gallery')): ?>
    <div class="hidden">
      <?php foreach ($gallery as $key => $id): ?>
        <a
          href="<?php echo wp_get_attachment_image_url($id, 'full'); ?>"
          target="_blank"
          data-fslightbox="gallery">
        </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <div class="portfolio-card__content">
    <div class="portfolio-card__header">
      <div class="portfolio-card__title">
        <?php the_title(); ?>
      </div>
    </div>
    <?php if ($description = carbon_get_the_post_meta('description')): ?>
    <div class="portfolio-card__desc">
      <?php echo $description; ?>
    </div>
    <?php endif; ?>
  </div>
</div>
