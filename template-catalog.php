<?php
/*
Template Name: Каталог
*/
$query_params = [
  'post_type' => 'project',
  'orderby' => [
    'is_sticky' => 'DESC',
    'menu_order' => 'ASC'
  ],
  'paged' => get_query_var('paged') ?: 1
];
$projects = new WP_Query($query_params);
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

    <div class="page-section">
      <div class="page-section__bg"></div>

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
                <span itemprop="name"><?php the_title() ?></span>
              </span>
              <meta itemprop="position" content="3" />
            </li>
          </ol>
        </div>

        <h1 class="page-section__title<?php if (mb_strlen(get_the_title()) > 20): ?> page-section__title--small<?php endif; ?>">
          <?php the_title(); ?>
        </h1>

        <div class="catalog-filter">

        </div>

        <div class="catalog-list">
          <?php
          while ($projects->have_posts()) {
            $projects->the_post();
            get_template_part('partials/project-card');
          }
          wp_reset_postdata();
          ?>
        </div>

        <div class="page-section__content content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>