<?php
$gallery = carbon_get_the_post_meta('gallery');
$type = carbon_get_the_post_meta('type');
$dimensions = carbon_get_the_post_meta('dimensions');
$packages = new WP_Query([
  'post_type' => 'package',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC',
]);
$current_post_id = get_the_ID();
$type_label = [
  'frame' => 'Каркасный дом',
];
$similar = new WP_Query([
  'post_type' => 'project',
  'posts_per_page' => 12,
  'orderby' => 'rand',
]);
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
              <a class="breadcrumbs__item" itemprop="item" href="<?php the_permalink(9); ?>">
                <span itemprop="name"><?php echo get_the_title(9); ?></span>
              </a>
              <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span class="breadcrumbs__item" itemprop="item" aria-current="page">
                <span itemprop="name">
                  <?php the_title(); ?>
                </span>
              </span>
              <meta itemprop="position" content="3" />
            </li>
          </ol>
        </div>

        <h1 class="page-section__title page-section__title--small">
          <?php the_title(); ?>
        </h1>

        <div class="case-layout">
          <div class="case-layout__date">
            <?php if ($date = get_the_date('d.m.Y')): ?>
            <div class="case-details-date">
              <span class="icon icon-calendar"></span>
              <?php echo $date; ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="case-layout__media">
            <?php if (has_post_thumbnail()): ?>
              <div class="case-details-thumbnail">
                <a href="<?php echo get_the_post_thumbnail_url(
                  get_the_ID(),
                  'full',
                ); ?>" data-fslightbox="gallery" target="_blank" class="case-details-thumbnail__link">
                  <?php the_post_thumbnail('large', [
                    'class' => 'case-details-thumbnail__image',
                  ]); ?>
                  <span class="case-details-thumbnail__loupe">
                    <span class="icon icon-search"></span>
                  </span>
                </a>
              </div>
            <?php endif; ?>
          </div>
          <div class="case-layout__params">
            <div class="case-params">
              <?php if ($dimensions = carbon_get_the_post_meta('dimensions')): ?>
              <div class="case-params__item">
                <div class="case-params__item-ico">
                  <span class="icon icon-area"></span>
                </div>
                <div class="case-params__item-val">
                  <?php echo $dimensions; ?> м<sup>2</sup>
                </div>
              </div>
              <?php endif; ?>
              <?php if ($duration = carbon_get_the_post_meta('duration')): ?>
              <div class="case-params__item">
                <div class="case-params__item-ico">
                  <span class="icon icon-clock-circle"></span>
                </div>
                <div class="case-params__item-val">
                  <?php echo $duration; ?> <?php echo plural($duration, ['день', 'дня', 'дней']); ?>
                </div>
              </div>
              <?php endif; ?>
              <?php if ($address = carbon_get_the_post_meta('address')): ?>
              <div class="case-params__item">
                <div class="case-params__item-ico">
                  <span class="icon icon-marker"></span>
                </div>
                <div class="case-params__item-val case-params__item-val--small">
                  <?php echo $address; ?>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="case-layout__specifications">
            <?php if ($specifications = carbon_get_the_post_meta('specifications')): ?>
            <div class="case-specifications">
              <div class="case-specifications__title">Технические характеристики:</div>
              <dl class="case-specifications__list">
                <?php foreach ($specifications as $item): ?>
                <dt><?php echo $item['name']; ?>:</dt>
                <dd><?php echo $item['content']; ?></dd>
                <?php endforeach; ?>
              </dl>
            </div>
            <?php endif; ?>
          </div>
          <div class="case-layout__description">
            <?php if ($description = carbon_get_the_post_meta('description')): ?>
            <div class="case-description">
              <div class="case-description__title">Особенности проекта:</div>
              <div class="case-description__content">
                <?php echo $description; ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="case-layout__gallery">
            <?php if ($gallery = carbon_get_the_post_meta('gallery')): ?>
            <div class="case-gallery">
              <?php foreach ($gallery as $key => $id): ?>
                <a
                  href="<?php echo wp_get_attachment_image_url($id, 'full'); ?>"
                  target="_blank"
                  data-fslightbox="gallery"
                  class="case-gallery__item">
                  <?php echo wp_get_attachment_image($id, 'medium'); ?>
                </a>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
