

<?php
$video = carbon_get_the_post_meta('video');
$rutube_id = extract_rutube_id($video);
?>
<article class="review-video-card">
  <figure class="review-video-card__media">
    <?php if (has_post_thumbnail()): ?>
      <?php the_post_thumbnail('custom-medium', [
        'class' => 'review-video-card__image',
      ]); ?>
    <?php elseif ($rutube_id): ?>
      <img src="https://rutube.ru/api/video/<?php echo $rutube_id; ?>/thumbnail/?redirect=1" alt="" class="review-video-card__image">
    <?php else: ?>
      <img src="<?php bloginfo(
        'template_url',
      ); ?>/assets/No-Image-Placeholder.png" alt="" class="review-video-card__image">
    <?php endif; ?>
  </figure>
  <?php if ($rutube_id): ?>
  <a href="#video-<?php echo get_the_ID(); ?>" target="_blank" data-fslightbox="video" class="review-video-card__play">
    <span></span>
  </a>
  <div class="hidden">
    <iframe id="video-<?php echo get_the_ID(); ?>" width="720" height="405" src="https://rutube.ru/play/embed/<?php echo $rutube_id; ?>/" style="border: none;" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  </div>
  <?php else: ?>
  <a href="<?php echo $video; ?>" target="_blank" data-fslightbox="video">
    <?php echo $video; ?>
  </a>
  <?php endif; ?>
</article>
