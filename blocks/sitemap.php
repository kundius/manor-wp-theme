<?php
$pages_query = new WP_Query([
  'post_type' => 'page',
  'posts_per_page' => -1,
]);
$posts_query = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => -1,
]);
$project_query = new WP_Query([
  'post_type' => 'project',
  'posts_per_page' => -1,
]);
$portfolio_query = new WP_Query([
  'post_type' => 'case',
  'posts_per_page' => -1,
]);
?>
<h2>Страницы:</h2>
<ul>
  <?php while ($pages_query->have_posts()): ?>
    <?php $pages_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
    </li>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</ul>

<h2>Проекты:</h2>
<ul>
  <?php while ($project_query->have_posts()): ?>
    <?php $project_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
    </li>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</ul>

<h2>Портфолио:</h2>
<ul>
  <?php while ($portfolio_query->have_posts()): ?>
    <?php $portfolio_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
    </li>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</ul>

<h2>Записи:</h2>
<ul>
  <?php while ($posts_query->have_posts()): ?>
    <?php $posts_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
    </li>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</ul>
