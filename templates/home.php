<?php
/*
Template Name: Главная
*/
$showcase_projects = new WP_Query([
  'post_type' => 'project',
  'orderby' => [
    'menu_order' => 'ASC',
  ],
  'posts_per_page' => -1,
  'meta_query' => [
    [
      'key' => 'at_home',
      'compare_key' => '=',
      'value' => 'yes',
    ],
  ],
]);
$favorite_projects = new WP_Query([
  'post_type' => 'project',
  'orderby' => [
    'menu_order' => 'ASC',
  ],
  'posts_per_page' => -1,
  'meta_query' => [
    [
      'key' => 'favorite',
      'compare_key' => '=',
      'value' => 'yes',
    ],
  ],
]);
$cases = new WP_Query([
  'post_type' => 'case',
  'orderby' => [
    'menu_order' => 'ASC',
  ],
  'posts_per_page' => -1,
  'meta_query' => [
    [
      'key' => 'at_home',
      'compare_key' => '=',
      'value' => 'yes',
    ],
  ],
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

    <section class="intro-section">
      <div class="page-bg-sharp page-bg-sharp--intro" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0">
        <div class="page-bg-sharp__fade"></div>
      </div>
      <div class="container">
        <div class="intro-content">
          <div class="intro-content__vertical-text" data-scroll data-scroll-speed="-0.2"></div>
          <div class="intro-content__title">
            <span>Каркасные</span>
            <span>дома</span>
          </div>
          <div class="intro-content__content">
            <div class="intro-content__content-title">
              Качество<br>
              на первом месте
            </div>
            <div class="intro-content__content-desc">
              Строительная компания «Поместье» - производитель и застройщик быстровозводимого жилья для сезонного (дачного) и круглогодичного проживания во многих регионах России
            </div>
          </div>
          <div class="intro-content__actions">
            <a href="<?php the_permalink(CATALOG_PAGE_ID); ?>" class="intro-content__action">
              <div class="intro-content__action-text">
                Каталог проектов
              </div>
              <span class="icon icon-arrow-right"></span>
            </a>
          </div>
          <div class="intro-content__enum" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 60%">
            <div class="intro-content__enum-item">
              <div class="intro-content__enum-item-check">
                <span class="icon icon-check"></span>
              </div>
              <div class="intro-content__enum-item-text">
                Без отделки
                или&nbsp;«под ключ»</div>
            </div>
            <div class="intro-content__enum-item">
              <div class="intro-content__enum-item-check">
                <span class="icon icon-check"></span>
              </div>
              <div class="intro-content__enum-item-text">
                Типовые проекты
                или&nbsp;по Вашему эскизу</div>
            </div>
            <div class="intro-content__enum-item">
              <div class="intro-content__enum-item-check">
                <span class="icon icon-check"></span>
              </div>
              <div class="intro-content__enum-item-text">
                Стоимость не меняется ни после подписания договора, ни в ходе строительства
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="home-primary">
      <div class="container">

        <div class="home-primary__catalog">
          <div class="home-primary__catalog-main">

            <div class="catalog-preview" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
              <div class="catalog-preview__header">
                <div class="catalog-preview__title">
                  Каталог
                </div>
                <a href="<?php the_permalink(CATALOG_PAGE_ID); ?>" class="catalog-preview__more">
                  <span class="catalog-preview__more-text">
                    Смотреть все
                  </span>
                  <span class="icon icon-arrow-right"></span>
                </a>
              </div>
              <div class="catalog-preview__content">
                <div class="catalog-preview__desc">
                  Недорогой загородный дом
                  от&nbsp;компании «СК Поместье» -
                  это&nbsp;современное архитектурное решение, обладающее привлекательным внешним видом, продуманной планировкой
                  и&nbsp;комфортными условиями проживания
                </div>
              </div>
            </div>

          </div>

          <div class="home-primary__catalog-showcase">

            <div class="showcase">
              <div class="showcase-embla" data-showcase-embla>
                <div class="showcase-embla__viewport" data-showcase-embla-viewport>
                  <div class="showcase-embla__container">
                    <?php while ($showcase_projects->have_posts()): ?>
                      <?php $showcase_projects->the_post(); ?>
                      <div class="showcase-embla__slide">
                        <?php get_template_part('partials/showcase-card'); ?>
                      </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                  </div>
                </div>
                <div class="showcase-embla__controls" data-showcase-embla-controls>
                  <button class="showcase-embla__control" type="button" data-showcase-embla-controls-prev>
                    <span class="icon icon-chevron-left"></span>
                  </button>
                  <button class="showcase-embla__control" type="button" data-showcase-embla-controls-next>
                    <span class="icon icon-chevron-right"></span>
                  </button>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="home-primary__equipment">
          <div class="home-primary__equipment-main">

            <div class="equipment-main" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
              <div class="equipment-main__title">
                Мы предлагаем 2 вида комплектации: теплый контур и холодный контур:
              </div>
              <div class="equipment-main__grid">
                <div class="equipment-main__cell">

                  <div class="equipment-card">
                    <div class="equipment-card__header">
                      <div class="equipment-card__icon">
                        <span class="icon icon-snowflake"></span>
                      </div>
                      <div class="equipment-card__title">
                        Тёплый контур
                      </div>
                      <a href="<?php the_permalink(
                        CATALOG_PAGE_ID,
                      ); ?>" class="equipment-card__more">
                        смотреть проекты
                      </a>
                    </div>
                    <div class="equipment-card__desc">
                      Для круглогодичного проживания - Краткое описание типа проектов в 2-3-4 строки
                    </div>
                    <div class="equipment-card__price">
                      <div class="equipment-card__price-lbl">
                        Цена от:
                      </div>
                      <div class="equipment-card__price-val">
                        <span class="equipment-card__price-num">751 000</span>
                        <span class="equipment-card__price-cur">Р</span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="equipment-main__cell">

                  <div class="equipment-card">
                    <div class="equipment-card__header">
                      <div class="equipment-card__icon">
                        <span class="icon icon-sun"></span>
                      </div>
                      <div class="equipment-card__title">
                        Холодный контур
                      </div>
                      <a href="<?php the_permalink(
                        CATALOG_PAGE_ID,
                      ); ?>" class="equipment-card__more">
                        смотреть проекты
                      </a>
                    </div>
                    <div class="equipment-card__desc">
                      Для круглогодичного проживания - Краткое описание типа проектов в 2-3-4 строки
                    </div>
                    <div class="equipment-card__price">
                      <div class="equipment-card__price-lbl">
                        Цена от:
                      </div>
                      <div class="equipment-card__price-val">
                        <span class="equipment-card__price-num">590 000</span>
                        <span class="equipment-card__price-cur">Р</span>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
          <div class="home-primary__equipment-help">
            <div class="home-primary__equipment-help-inner">

              <form
                class="equipment-help"
                action="<?php echo admin_url('admin-ajax.php'); ?>"
                data-feedback-form
                data-feedback-form-goal=""
                data-feedback-form-action="feedback_form"
              >
                <input type="hidden" name="submitted" value="">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(
                  'feedback-nonce',
                ); ?>">
                <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
                <input type="hidden" name="subject" value="Заказать звонок">

                <div class="equipment-help__errors" data-feedback-form-errors></div>

                <div class="equipment-help__title">
                  Не знаете с чего начать?<br>
                  Наши менеджеры дадут подробную бесплатную консультацию
                </div>
                <div class="equipment-help__input phone-control">
                  <span class="phone-control__label">Ваш телефон</span>
                  <input type="text" value="" name="phone" data-maska="+7 (###) ###-##-##" placeholder="+7 (000) 000-00-00" class="phone-control__input" required>
                </div>
                <button type="submit" class="equipment-help__submit">Проконсультироваться</button>

                <div class="equipment-help-success">
                  <div class="equipment-help-success__title">
                    Сообщение успешно отправлено
                  </div>
                  <div class="equipment-help-success__desc">
                    Мы свяжемся с вами в ближайшее время
                  </div>
                  <button type="button" class="equipment-help-success__close" data-feedback-form-reset>Закрыть</button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="home-primary__popular">

          <div class="popular-preview">
            <div class="popular-preview__header" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
              <div class="popular-preview__title">
                Популярное
              </div>
            </div>

            <div class="popular-embla" data-popular-embla>
              <div class="popular-embla__viewport" data-popular-embla-viewport>
                <div class="popular-embla__container">
                  <?php while ($favorite_projects->have_posts()): ?>
                    <?php $favorite_projects->the_post(); ?>
                    <div class="popular-embla__slide">
                      <?php get_template_part('partials/project-card'); ?>
                      <?php get_template_part('partials/project-teaser'); ?>
                    </div>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </div>
              </div>
              <div class="popular-embla__footer">
                <div class="popular-embla__controls">
                  <button class="popular-embla__control" type="button" data-popular-embla-prev>
                    <span class="icon icon-chevron-left"></span>
                  </button>
                  <button class="popular-embla__control" type="button" data-popular-embla-next>
                    <span class="icon icon-chevron-right"></span>
                  </button>
                </div>
                <a href="<?php the_permalink(CATALOG_PAGE_ID); ?>" class="popular-embla__all">
                  Смотреть все
                  <span class="icon icon-arrow-right"></span>
                </a>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="advantages" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0">
      <div class="container">
        <div class="advantages-layout">
          <div class="advantages-layout__calc">
            <form
              class="advantage-calc"
              data-scroll
              data-scroll-css-progress
              data-scroll-position="start, middle"
              data-scroll-offset="0, 40%"
              action="<?php echo admin_url('admin-ajax.php'); ?>"
              data-feedback-form
              data-feedback-form-goal=""
              data-feedback-form-action="feedback_form"
            >
              <input type="hidden" name="submitted" value="">
              <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(
                'feedback-nonce',
              ); ?>">
              <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
              <input type="hidden" name="subject" value="Заказать звонок">

              <div class="advantage-calc__errors" data-feedback-form-errors></div>

              <div class="advantage-calc__title">
                Рассчитаем бесплатно индивидуальный проект
              </div>
              <div class="advantage-calc__form">
                <span class="advantage-calc__form-label">Телефон</span>
                <input type="text" value="" name="phone" data-maska="+7 (###) ###-##-##" placeholder="+7 (000) 000-00-00" class="advantage-calc__form-input" required>
                <button type="submit" class="advantage-calc__form-submit">Отправить заявку</button>
              </div>
              <div class="advantage-calc__rules">
                Нажимая на кнопку, я даю своё <a href="">согласие на взаимодействие и обработку персональных данных</a>
              </div>
              <div class="advantage-calc-success">
                <div class="advantage-calc-success__title">
                  Сообщение успешно отправлено
                </div>
                <div class="advantage-calc-success__desc">
                  Мы свяжемся с вами в ближайшее время
                </div>
                <button type="button" class="advantage-calc-success__close" data-feedback-form-reset>Закрыть</button>
              </div>
            </form>
          </div>
          <div class="advantages-layout__warranty">
            <div class="advantage-warranty" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
              <div class="advantage-warranty__title">
                <div class="advantage-warranty__title-num">
                  3
                </div>
                <div class="advantage-warranty__title-val">
                  года гарантия
                </div>
              </div>
              <div class="advantage-warranty__subtitle">
                Даём расширенную двойную гарантию
              </div>
              <div class="advantage-warranty__desc">
                Официальная и обслуживаемая гарантия по договору 3 года на&nbsp;материалы и 3 года на работы
              </div>
            </div>
          </div>
          <div class="advantages-layout__payment">
            <div class="advantage-payment" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
              <div class="advantage-payment__title">
                Оплата
              </div>
              <div class="advantage-payment__line">
                <div class="advantage-payment__line-step">
                  <div class="advantage-payment__subtitle">
                    в 2 этапа
                  </div>
                </div>
                <div class="advantage-payment__line-step">
                  <div class="advantage-payment__step">
                    <div class="advantage-payment__step-title">
                      1 этап -
                    </div>
                    <div class="advantage-payment__step-desc">
                      завоз материалов на участок
                    </div>
                  </div>
                </div>
                <div class="advantage-payment__line-step">
                  <div class="advantage-payment__step">
                    <div class="advantage-payment__step-title">
                      2 этап -
                    </div>
                    <div class="advantage-payment__step-desc">
                      после подписания
                      передаточного акта
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="portfolio">
      <div class="container">
        <div class="portfolio__header" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
          <div class="portfolio__header-inner">
            <div class="portfolio__title">
              Наши работы
            </div>
          </div>
        </div>
        <div class="portfolio__list">

          <div class="portfolio-embla" data-portfolio-embla>
            <div class="portfolio-embla__viewport" data-portfolio-embla-viewport>
              <div class="portfolio-embla__container">
                <?php while ($cases->have_posts()): ?>
                  <?php $cases->the_post(); ?>
                  <div class="portfolio-embla__slide">
                    <?php get_template_part('partials/portfolio-card'); ?>
                  </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              </div>
            </div>
            <div class="portfolio-embla__footer">
              <div class="portfolio-embla__controls">
                <button class="portfolio-embla__control" type="button" data-portfolio-embla-prev>
                  <span class="icon icon-chevron-left"></span>
                </button>
                <button class="portfolio-embla__control" type="button" data-portfolio-embla-next>
                  <span class="icon icon-chevron-right"></span>
                </button>
              </div>
              <a href="<?php the_permalink(PORTFOLIO_PAGE_ID); ?>" class="portfolio-embla__all">
                <span>Смотреть все <span class="max-md:hidden">построенные объекты</span></span>
                <span class="icon icon-arrow-right"></span>
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>


    <?php if ($content = get_the_content()): ?>
    <section class="home-content">
      <div class="container">
        <div class="content">
          <?php echo $content; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
