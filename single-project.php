<?php
$gallery = carbon_get_post_meta(get_the_ID(), 'gallery');
$packages = new WP_Query([
  'post_type' => 'package',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
]);
$current_post_id = get_the_ID();
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
              <a class="breadcrumbs__item" itemprop="item" href="/">
                <span itemprop="name">Каркасные дома</span>
              </a>
              <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span class="breadcrumbs__item" itemprop="item" aria-current="page">
                <span itemprop="name"><?php the_title() ?></span>
              </span>
              <meta itemprop="position" content="3" />
            </li>
          </ol>
        </div>

        <h1 class="page-section__title page-section__title--small">
          <?php the_title() ?>
        </h1>

        <div class="project-layout">
          <div class="project-layout__media">

            <div class="gallery" data-gallery>
              <div class="gallery-main">
                <div class="gallery-main__viewport" data-gallery-main-viewport>
                  <div class="gallery-main__container">
                    <?php if (has_post_thumbnail()): ?>
                      <div class="gallery-main__slide">
                        <a href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" data-fslightbox="gallery" target="_blank">
                          <?php the_post_thumbnail('large') ?>
                          <span class="gallery-main__loupe">
                            <span class="icon icon-search"></span>
                          </span>
                        </a>
                      </div>
                    <?php endif ?>

                    <?php foreach ($gallery as $key => $id): ?>
                      <div class="gallery-main__slide">
                        <a
                          href="<?php echo wp_get_attachment_image_url($id, 'full') ?>"
                          target="_blank"
                          data-fslightbox="gallery">
                          <?php echo wp_get_attachment_image($id, 'large'); ?>
                          <span class="gallery-main__loupe">
                            <span class="icon icon-search"></span>
                          </span>
                        </a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <button type="button" data-gallery-main-prev class="gallery-main__prev">
                  <span class="icon icon-chevron-left"></span>
                </button>
                <button type="button" data-gallery-main-next class="gallery-main__next">
                  <span class="icon icon-chevron-right"></span>
                </button>
                <div class="gallery-labels">
                  <div class="gallery-label">
                    <div class="gallery-label__icon">
                      <div class="icon icon-guarante"></div>
                    </div>
                    <div class="gallery-label__title">
                      Расширенная двойная гарантия 3 года
                    </div>
                  </div>
                  <div class="gallery-label">
                    <div class="gallery-label__icon">
                      <div class="icon icon-pay"></div>
                    </div>
                    <div class="gallery-label__title">
                      Оплата<br>
                      в 2 этапа
                    </div>
                  </div>
                  <div class="gallery-label">
                    <div class="gallery-label__icon">
                      <div class="icon icon-contract"></div>
                    </div>
                    <div class="gallery-label__title">
                      стоимость фиксирована
                      в&nbsp;договоре и неизменна
                    </div>
                  </div>
                  <!-- flags -->
                </div>
                <!-- flags -->
              </div>
              <div class="gallery-thumbs">
                <div class="gallery-thumbs__viewport" data-gallery-thumbs-viewport>
                  <div class="gallery-thumbs__container">
                    <?php if (has_post_thumbnail()): ?>
                      <div class="gallery-thumbs__slide">
                        <?php the_post_thumbnail('small') ?>
                      </div>
                    <?php endif ?>

                    <?php foreach ($gallery as $key => $id): ?>
                      <div class="gallery-thumbs__slide">
                        <?php echo wp_get_attachment_image($id, 'small'); ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <button type="button" data-gallery-thumbs-prev class="gallery-thumbs__prev">
                  <span class="icon icon-chevron-left"></span>
                </button>
                <button type="button" data-gallery-thumbs-next class="gallery-thumbs__next">
                  <span class="icon icon-chevron-right"></span>
                </button>
              </div>
            </div>

          </div>
          <div class="project-layout__prices">
            <div class="project-layout__prices-inner">
              <?php if ($packages->have_posts()): ?>
                <div class="project-packages">
                  <div class="project-packages__title">Комплектации</div>
                  <div class="project-packages__grid">
                    <?php while ($packages->have_posts()): ?>
                      <?php $packages->the_post(); ?>
                      <?php $is_active = carbon_get_post_meta($current_post_id, 'package_' . get_the_ID() . '_is_active'); ?>
                      <?php if ($is_active): ?>
                        <?php $price = carbon_get_post_meta($current_post_id, 'package_' . get_the_ID() . '_price'); ?>
                        <div class="project-package">
                          <div class="project-package__body">
                            <div class="project-package__name"><?php the_title() ?></div>
                            <div class="project-package__price">
                              <div class="project-package__price-lbl">
                                Цена от:
                              </div>
                              <div class="project-package__price-val">
                                <?php echo number_format($price, 0, ',', ' '); ?>
                              </div>
                              <div class="project-package__price-cur">
                                ₽
                              </div>
                            </div>
                          </div>
                          <div class="project-package__help">
                            <div class="project-package__help-ico">
                              ?
                            </div>
                            <div class="project-package__help-txt">
                              Что входит<br>
                              в стоимость?
                            </div>
                          </div>
                        </div>
                      <?php endif ?>
                    <?php endwhile ?>
                  </div>
                </div>
                <?php wp_reset_postdata() ?>
              <?php endif ?>
            </div>
          </div>
          <div class="project-layout__params">
            <div class="outline h-[240px]">project-layout__params</div>
          </div>
          <div class="project-layout__contact">
            <div class="outline h-[330px]">project-layout__contact</div>
          </div>
          <div class="project-layout__discount">
            <div class="outline h-[180px]">layout__discount</div>
          </div>
          <div class="project-layout__benefits">
            <div class="outline h-[180px]">layout__benefits</div>
          </div>
          <div class="project-layout__components">
            <div class="outline h-[500px]">layout__components</div>
          </div>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>