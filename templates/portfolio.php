<?php
/*
Template Name: Наши работы
*/
$cases = new WP_Query([
  'post_type' => 'case',
  'paged' => get_query_var('paged') ?: 1,
  'meta_query' => [],
]); ?>
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
      <div class="page-bg-sharp" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0"></div>

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
                <span itemprop="name"><?php the_title(); ?></span>
              </span>
              <meta itemprop="position" content="2" />
            </li>
          </ol>
        </div>

        <?php if ($title = get_the_title()): ?>
        <h1 class="page-section__title<?php if (
          mb_strlen($title) > 20
        ): ?> page-section__title--small<?php endif; ?>">
          <?php echo $title; ?>
        </h1>
        <?php endif; ?>

        <?php if ($description = carbon_get_the_post_meta('description')): ?>
        <div class="page-section__description">
          <?php echo nl2br($description); ?>
        </div>
        <?php endif; ?>

        <div class="portfolio-list">
          <?php
          while ($cases->have_posts()) {
            $cases->the_post();
            get_template_part('partials/case-card');
          }
          wp_reset_postdata();
          ?>
        </div>

        <?php echo get_pagination($cases); ?>

        <div class="page-section__content">
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
