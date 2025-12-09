<?php
/*
Template Name: Отзывы
*/
$reviews = new WP_Query([
  'post_type' => 'review',
  'paged' => get_query_var('paged') ?: 1,
  'meta_query' => [
    [
      'key' => 'video',
      'value' => '',
      'compare' => isset($_GET['alt']) ? '==' : '!=',
    ],
  ],
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
              <meta itemprop="position" content="3" />
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

        <div class="reviews-tabs">
          <a
            class="reviews-tabs__item <?php if (
              !isset($_GET['alt'])
            ): ?> reviews-tabs__item--active<?php endif; ?>"
          href="<?php echo add_query_param_to_current_url('alt', null); ?>"
          >Видео-отзывы</a>
          <a
            class="reviews-tabs__item <?php if (
              isset($_GET['alt'])
            ): ?> reviews-tabs__item--active<?php endif; ?>"
          href="<?php echo add_query_param_to_current_url('alt', '1'); ?>"
          >Письменные отзывы</a>
        </div>
        <a
          href="https://lipsum.app/id/1/1600x1200"
          data-fancybox="gallery"
          data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code"
        >
          <img
            src="https://lipsum.app/id/1/200x150"
            width="200"
            height="150"
            alt="Sample image #1"
          />
        </a>
        <a href="https://lipsum.app/id/2/1600x1200" data-fancybox="gallery">
          <img
            src="https://lipsum.app/id/2/200x150"
            width="200"
            height="150"
            alt="Sample image #2"
          />
        </a>
        <a href="https://lipsum.app/id/3/1600x1200" data-fancybox="gallery">
          <img
            src="https://lipsum.app/id/3/200x150"
            width="200"
            height="150"
            alt="Sample image #3"
          />
        </a>
        <?php if (isset($_GET['alt'])): ?>
        <div class="reviews-text-list">
          <?php
          while ($reviews->have_posts()) {
            $reviews->the_post();
            get_template_part('partials/review-text-card');
          }
          wp_reset_postdata();
          ?>
        </div>
        <?php else: ?>
        <div class="reviews-video-list">
          <?php
          while ($reviews->have_posts()) {
            $reviews->the_post();
            get_template_part('partials/review-video-card');
          }
          wp_reset_postdata();
          ?>
        </div>
        <?php endif; ?>

        <?php if ($content = get_the_content()): ?>
          <div class="page-section__content">
            <div class="content">
              <?php echo $content; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
