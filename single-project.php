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
              <a class="breadcrumbs__item" itemprop="item" href="<?php the_permalink(11); ?>">
                <span itemprop="name"><?php echo get_the_title(11); ?></span>
              </a>
              <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span class="breadcrumbs__item" itemprop="item" aria-current="page">
                <span itemprop="name">
                  <?php echo implode(' ', [
                    $type_label[$type],
                    $dimensions,
                    '«' . get_the_title() . '»',
                  ]); ?>
                </span>
              </span>
              <meta itemprop="position" content="3" />
            </li>
          </ol>
        </div>

        <h1 class="page-section__title page-section__title--small">
          <?php echo $type_label[$type]; ?><br>
          <span class="font-for-number"><?php echo $dimensions; ?></span> «<?php the_title(); ?>»
        </h1>

        <div class="project-layout">
          <div class="project-layout__media">

            <div class="gallery" data-gallery>
              <div class="gallery-main">
                <div class="gallery-main__viewport" data-gallery-main-viewport>
                  <div class="gallery-main__container">
                    <?php if (has_post_thumbnail()): ?>
                      <div class="gallery-main__slide">
                        <a href="<?php echo get_the_post_thumbnail_url(
                          get_the_ID(),
                          'full',
                        ); ?>" data-fslightbox="gallery" target="_blank">
                          <?php the_post_thumbnail('custom-large'); ?>
                          <span class="gallery-main__loupe">
                            <span class="icon icon-search"></span>
                          </span>
                        </a>
                      </div>
                    <?php endif; ?>

                    <?php foreach ($gallery as $key => $id): ?>
                      <div class="gallery-main__slide">
                        <a
                          href="<?php echo wp_get_attachment_image_url($id, 'full'); ?>"
                          target="_blank"
                          data-fslightbox="gallery">
                          <?php echo wp_get_attachment_image($id, 'custom-large'); ?>
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
                        <?php the_post_thumbnail('custom-small'); ?>
                      </div>
                    <?php endif; ?>

                    <?php foreach ($gallery as $key => $id): ?>
                      <div class="gallery-thumbs__slide">
                        <?php echo wp_get_attachment_image($id, 'custom-small'); ?>
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
                <div class="project-prices">
                  <div class="project-prices__title">Комплектации</div>
                  <div class="project-prices__grid">
                    <?php while ($packages->have_posts()): ?>
                      <?php $packages->the_post(); ?>
                      <?php $display_name = carbon_get_the_post_meta('display_name'); ?>
                      <?php $is_active = carbon_get_post_meta(
                        $current_post_id,
                        'package_' . get_the_ID() . '_is_active',
                      ); ?>
                      <?php if ($is_active): ?>
                        <?php $price = carbon_get_post_meta(
                          $current_post_id,
                          'package_' . get_the_ID() . '_price',
                        ); ?>
                        <button type="button" class="project-price" data-project-packages-anchor="<?php echo get_the_ID(); ?>">
                          <span class="project-price__body">
                            <span class="project-price__name"><?php echo $display_name; ?></span>
                            <span class="project-price__price">
                              <span class="project-price__price-lbl">
                                Цена от:
                              </span>
                              <span class="project-price__price-val">
                                <?php echo number_format($price, 0, ',', ' '); ?>
                              </span>
                              <span class="project-price__price-cur">
                                ₽
                              </span>
                            </span>
                          </span>
                          <span class="project-price__help">
                            <span class="project-price__help-ico">
                              ?
                            </span>
                            <span class="project-price__help-txt">
                              Что входит<br>
                              в стоимость?
                            </span>
                          </span>
                        </button>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </div>
                </div>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="project-layout__params">
            <div class="project-params">
              <div class="project-params__title">Технические характеристики:</div>
              <div class="project-params__list">
                <div class="project-params__row">
                  <div class="project-params__label">
                    Материал
                  </div>
                  <div class="project-params__value">
                    <?php if ($material = carbon_get_the_post_meta('material')): ?>
                      <?php echo $material; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </div>
                </div>
                <div class="project-params__row">
                  <div class="project-params__label">
                    Размер
                  </div>
                  <div class="project-params__value">
                    <?php echo $dimensions ?: '-'; ?>
                  </div>
                </div>
                <div class="project-params__row">
                  <div class="project-params__label">
                    Общая S
                  </div>
                  <div class="project-params__value">
                    <?php if ($total_area = carbon_get_the_post_meta('total_area')): ?>
                      <?php echo $total_area; ?> м<sup>2</sup>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </div>
                </div>
                <div class="project-params__row">
                  <div class="project-params__label">
                    Застройки S
                  </div>
                  <div class="project-params__value">
                    <?php if ($footprint_area = carbon_get_the_post_meta('footprint_area')): ?>
                      <?php echo $footprint_area; ?> м<sup>2</sup>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </div>
                </div>
                <div class="project-params__row">
                  <div class="project-params__label">
                    Комнат
                  </div>
                  <div class="project-params__value">
                    <?php if ($room_count = carbon_get_the_post_meta('room_count')): ?>
                      <?php echo $room_count; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </div>
                </div>
                <div class="project-params__row">
                  <div class="project-params__label">
                    Сроки
                  </div>
                  <div class="project-params__value">
                    <?php if ($duration = carbon_get_the_post_meta('duration')): ?>
                      <?php echo $duration; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="project-layout__contact">
            <div class="project-contact">
              <div class="project-contact__title">
                Не знаете с чего начать? Наши менеджеры дадут подробную бесплатную консультацию
              </div>
              <div class="project-contact__desc">Деловое общение, без спама, без sms</div>
              <button type="button" class="project-contact__feedback">Проконсультироваться</button>
              <div class="project-contact__socials">
                <a href="#" class="project-contact__social project-contact__social--whatsapp">
                  <span class="project-contact__social-ico">
                    <span class="icon icon-whatsapp"></span>
                  </span>
                  <span class="project-contact__social-lbl">
                    Написать в<br>
                    Whatsapp
                  </span>
                </a>
                <a href="#" class="project-contact__social project-contact__social--telegram">
                  <span class="project-contact__social-ico">
                    <span class="icon icon-telegram"></span>
                  </span>
                  <span class="project-contact__social-lbl">
                    Написать в<br>
                    Telegram
                  </span>
                </a>
                <a href="#" class="project-contact__social project-contact__social--vk">
                  <span class="project-contact__social-ico">
                    <span class="icon icon-vk"></span>
                  </span>
                  <span class="project-contact__social-lbl">
                    Перейти в<br>
                    Вконтакте
                  </span>
                </a>
              </div>
            </div>
          </div>
          <div class="project-layout__discount">
            <div class="project-discount">
              <div class="project-discount__sticker"></div>
              <div class="project-discount__header">
                <div class="project-discount__title">Скидка + подарки</div>
                <div class="project-discount__date"><span>до 11.11.25</span></div>
              </div>
              <div class="project-discount__desc">
                <ul>
                  <li>
                    Металлическая <strong>сетка от грызунов</strong>
                  </li>
                  <li>
                    <strong>Антисептирование</strong> основания, лаг, чернового пола
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="project-layout__benefits">
            <div class="project-benefits">
              <div class="project-benefits__item">
                <div class="project-benefits__item-ico">
                  <img src="<?php bloginfo('template_url'); ?>/assets/benefit-1.png" alt="">
                </div>
                <div class="project-benefits__item-txt">
                  В проект можно внести любые изменения по желанию заказчика
                </div>
              </div>
              <div class="project-benefits__item">
                <div class="project-benefits__item-ico">
                  <img src="<?php bloginfo('template_url'); ?>/assets/benefit-2.png" alt="">
                </div>
                <div class="project-benefits__item-txt">
                  Возможна оплата строительства дома для ПМЖ сертификатом материнского капитала
                </div>
              </div>
              <div class="project-benefits__item">
                <div class="project-benefits__item-ico">
                  <img src="<?php bloginfo('template_url'); ?>/assets/benefit-3.png" alt="">
                </div>
                <div class="project-benefits__item-txt">
                  Вы можете воспользоваться выгодным кредитом от банков-партнеров: Т-Банк, Альфа Банк, Сбербанк, МТС Банк, Локо Банк, Совком Банк, ОТП Банк, Кредит Европа Банк, Ренесанс банк.<br>
                  <a href="#">Консультация по кредиту</a>
                </div>
              </div>
            </div>
          </div>
          <?php if ($packages->have_posts()): ?>
            <div class="project-layout__packages">
              <div class="project-packages">
                <div class="project-packages__title">
                  Подробные комплектации
                </div>
                <div class="project-packages__tabs">
                  <?php $index = 0; ?>
                  <?php while ($packages->have_posts()): ?>
                    <?php $packages->the_post(); ?>
                    <?php $display_name = carbon_get_the_post_meta('display_name'); ?>
                    <?php $is_active = carbon_get_post_meta(
                      $current_post_id,
                      'package_' . get_the_ID() . '_is_active',
                    ); ?>
                    <?php if ($is_active): ?>
                      <?php $index++; ?>
                      <button data-project-packages-tab="<?php echo get_the_ID(); ?>" type="button" class="project-packages__tab<?php echo $index ===
1
  ? ' active'
  : ''; ?>">
                        <?php echo $display_name; ?>
                      </button>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
                <div class="project-packages__contents">
                  <?php $index = 0; ?>
                  <?php while ($packages->have_posts()): ?>
                    <?php $packages->the_post(); ?>
                    <?php $is_active = carbon_get_post_meta(
                      $current_post_id,
                      'package_' . get_the_ID() . '_is_active',
                    ); ?>
                    <?php if ($is_active): ?>
                      <?php $index++; ?>
                      <div data-project-packages-content="<?php echo get_the_ID(); ?>" class="project-packages__content<?php echo $index ===
1
  ? ' active'
  : ''; ?>">
                        <?php the_content(); ?>
                      </div>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <?php get_template_part('partials/project-inquiry'); ?>
    <?php get_template_part('partials/work-scheme'); ?>

    <section class="project-similar">
      <div class="container">
        <div class="project-similar__header" data-scroll="" data-scroll-css-progress="" data-scroll-position="start, middle" data-scroll-offset="0, 40%">
          <div class="project-similar__title">
            Похожие проекты
          </div>
        </div>

        <div class="similar-embla" data-similar-embla>
          <div class="similar-embla__viewport" data-similar-embla-viewport>
            <div class="similar-embla__container">
              <?php while ($similar->have_posts()): ?>
                <?php $similar->the_post(); ?>
                <div class="similar-embla__slide">
                  <?php get_template_part('partials/project-card'); ?>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
          <button class="similar-embla__control" type="button" data-similar-embla-prev>
            <span class="icon icon-chevron-left"></span>
          </button>
          <button class="similar-embla__control" type="button" data-similar-embla-next>
            <span class="icon icon-chevron-right"></span>
          </button>
        </div>
      </div>
    </section>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
