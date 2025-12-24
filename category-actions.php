<?php
$category = get_queried_object();
$query_params = [
  'post_type' => 'post',
  'orderby' => [
    'is_sticky' => 'DESC',
    'date' => 'DESC',
  ],
  'paged' => get_query_var('paged') ?: 1,
  'cat' => $category->term_id,
];
$articles = new WP_Query($query_params);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

    <section class="page-section">
      <div class="page-bg-sharp" class="intro-section" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0"></div>

      <div class="container">
        <div class="page-section__breadcrumbs breadcrumbs">
          <ol class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList" aria-label="Хлебные крошки">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a class="breadcrumbs__item" itemprop="item" href="/">
                <span itemprop="name">Главная</span>
              </a>
              <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span class="breadcrumbs__item" itemprop="item" aria-current="page">
                <span itemprop="name"><?php single_term_title(); ?></span>
              </span>
              <meta itemprop="position" content="2" />
            </li>
          </ol>
        </div>

        <?php if ($title = single_term_title('', 0)): ?>
        <h1 class="page-section__title<?php if (
          mb_strlen($title) > 20
        ): ?> page-section__title--small<?php endif; ?>">
          <?php echo $title; ?>
        </h1>
        <?php endif; ?>

        <?php if ($description = get_term_field('description', $category)): ?>
        <div class="page-section__description">
          <?php echo nl2br($description); ?>
        </div>
        <?php endif; ?>

        <?php if ($articles->have_posts()): ?>
          <div class="actions-list">
            <?php
            while ($articles->have_posts()) {
              $articles->the_post();

              echo '<div class="actions-list__item">';
              get_template_part('partials/action-card');
              echo '</div>';
            }
            wp_reset_postdata();
            ?>
          </div>

          <?php echo get_pagination($articles); ?>
        <?php else: ?>
          <p>Извините, ничего не найдено.</p>
        <?php endif; ?>
      </div>
    </section>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
