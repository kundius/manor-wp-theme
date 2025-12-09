

<?php $video = carbon_get_the_post_meta('video'); ?>
<article class="review-video-card">
  <figure class="review-video-card__media">
    <?php the_post_thumbnail('medium', [
      'class' => 'review-video-card__media-image',
    ]); ?>
  </figure>
  <a href="<?php echo $video; ?>" target="_blank" data-fslightbox="videos">
    <?php echo $video; ?>
  </a>
</article>
