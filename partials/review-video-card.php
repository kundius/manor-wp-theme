

<?php $video = carbon_get_the_post_meta('video'); ?>
<article class="review-video-card">
  <figure class="review-video-card__media">
    <?php the_post_thumbnail('medium', [
      'class' => 'review-video-card__media-image',
    ]); ?>
  </figure>
  <a href="#video-<?php echo get_the_ID(); ?>" target="_blank" data-fslightbox="video">
    <?php echo $video; ?>
  </a>
  <div class="hidden">
    <iframe id="video-<?php echo get_the_ID(); ?>" width="720" height="405" src="<?php echo $video; ?>" style="border: none;" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  </div>
</article>
