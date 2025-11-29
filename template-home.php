<?php
/*
Template Name: Главная
*/
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

    <section class="intro-section" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0">
      <div class="container">
        <div class="intro-content">
          <div class="intro-content__vertical-text" data-scroll data-scroll-speed="-0.2"></div>
          <div class="intro-content__title">Каркасные дома</div>
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
            <a href="#" class="intro-content__action">
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
                <a href="#" class="catalog-preview__more">
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
                    <div class="showcase-embla__slide">
                      <div class="showcase-card">
                        <div class="showcase-card__media">
                          <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="showcase-card__image">
                          <a href="#" class="showcase-card__more">смотреть проект подробнее</a>
                        </div>
                        <div class="showcase-card__footer">
                          <div class="showcase-card__controls" data-showcase-embla-controls>
                            <button class="showcase-card__control" type="button" data-showcase-embla-controls-prev>
                              <span class="icon icon-chevron-left"></span>
                            </button>
                            <button class="showcase-card__control" type="button" data-showcase-embla-controls-next>
                              <span class="icon icon-chevron-right"></span>
                            </button>
                          </div>
                          <div class="showcase-card__title">КД 9 х 9.5 «Марк»</div>
                          <div class="showcase-card__price">
                            <div class="showcase-card__price-num">
                              2 115 000
                            </div>
                            <div class="showcase-card__price-cur">
                              Р
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="showcase-embla__slide">
                      <div class="showcase-card">
                        <div class="showcase-card__media">
                          <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="showcase-card__image" style="filter: hue-rotate(180deg);">
                          <a href="#" class="showcase-card__more">смотреть проект подробнее</a>
                        </div>
                        <div class="showcase-card__footer">
                          <div class="showcase-card__controls" data-showcase-embla-controls>
                            <button class="showcase-card__control" type="button" data-showcase-embla-controls-prev>
                              <span class="icon icon-chevron-left"></span>
                            </button>
                            <button class="showcase-card__control" type="button" data-showcase-embla-controls-next>
                              <span class="icon icon-chevron-right"></span>
                            </button>
                          </div>
                          <div class="showcase-card__title">КД 19 х 19.5 «Марк 2»</div>
                          <div class="showcase-card__price">
                            <div class="showcase-card__price-num">
                              2 115 000
                            </div>
                            <div class="showcase-card__price-cur">
                              Р
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                      <a href="#" class="equipment-card__more">
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
                      <a href="#" class="equipment-card__more">
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

              <form class="equipment-help">
                <div class="equipment-help__title">
                  Не знаете с чего начать?<br>
                  Наши менеджеры дадут подробную бесплатную консультацию
                </div>
                <div class="equipment-help__input phone-control">
                  <span class="phone-control__label">Ваш телефон</span>
                  <input type="text" value="" name="phone" data-maska="+7 (###) ###-##-##" placeholder="+7 (000) 000-00-00" class="phone-control__input">
                </div>
                <button type="submit" class="equipment-help__submit">Проконсультироваться</button>
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
                  <div class="popular-embla__slide">
                    <div class="project-teaser">
                      <div class="project-teaser__media">
                        <div class="project-teaser__flag project-teaser__flag--orange">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-teaser__image">
                        <div class="project-teaser__bar">
                          <div class="project-teaser__title">
                            КД 4 х 4 «Леонид»
                          </div>
                          <div class="project-teaser__params">
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-area"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                16 м<sup>2</sup>
                              </div>
                            </div>
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-calendar"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                10 дней
                              </div>
                            </div>
                          </div>
                          <div class="project-teaser__price">
                            <div class="project-teaser__price-lbl">
                              от
                            </div>
                            <div class="project-teaser__price-val">
                              590 000
                            </div>
                            <div class="project-teaser__price-cur">
                              Р
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="project-teaser__actions">
                        <button class="project-teaser__action project-teaser__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-teaser__action project-teaser__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                    <div class="project-card">
                      <div class="project-card__media">
                        <div class="project-card__flag project-card__flag--yellow">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-card__image">
                      </div>
                      <div class="project-card__title">
                        КД 4 х 4 «Леонид»
                      </div>
                      <div class="project-card__data">
                        <div class="project-card__params">
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-area"></span>
                            </div>
                            <div class="project-card__param-val">
                              16 м<sup>2</sup>
                            </div>
                          </div>
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-calendar"></span>
                            </div>
                            <div class="project-card__param-val">
                              10 дней
                            </div>
                          </div>
                        </div>
                        <div class="project-card__price">
                          <div class="project-card__price-lbl">
                            от
                          </div>
                          <div class="project-card__price-val">
                            590 000
                          </div>
                          <div class="project-card__price-cur">
                            Р
                          </div>
                        </div>
                      </div>
                      <div class="project-card__actions">
                        <button class="project-card__action project-card__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-card__action project-card__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="popular-embla__slide">
                    <div class="project-teaser">
                      <div class="project-teaser__media">
                        <div class="project-teaser__flag project-teaser__flag--orange">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-teaser__image">
                        <div class="project-teaser__bar">
                          <div class="project-teaser__title">
                            КД 4 х 4 «Леонид 2»
                          </div>
                          <div class="project-teaser__params">
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-area"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                16 м<sup>2</sup>
                              </div>
                            </div>
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-calendar"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                10 дней
                              </div>
                            </div>
                          </div>
                          <div class="project-teaser__price">
                            <div class="project-teaser__price-lbl">
                              от
                            </div>
                            <div class="project-teaser__price-val">
                              590 000
                            </div>
                            <div class="project-teaser__price-cur">
                              Р
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="project-teaser__actions">
                        <button class="project-teaser__action project-teaser__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-teaser__action project-teaser__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                    <div class="project-card">
                      <div class="project-card__media">
                        <div class="project-card__flag project-card__flag--yellow">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-card__image">
                      </div>
                      <div class="project-card__title">
                        КД 4 х 4 «Леонид 2»
                      </div>
                      <div class="project-card__data">
                        <div class="project-card__params">
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-area"></span>
                            </div>
                            <div class="project-card__param-val">
                              16 м<sup>2</sup>
                            </div>
                          </div>
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-calendar"></span>
                            </div>
                            <div class="project-card__param-val">
                              10 дней
                            </div>
                          </div>
                        </div>
                        <div class="project-card__price">
                          <div class="project-card__price-lbl">
                            от
                          </div>
                          <div class="project-card__price-val">
                            590 000
                          </div>
                          <div class="project-card__price-cur">
                            Р
                          </div>
                        </div>
                      </div>
                      <div class="project-card__actions">
                        <button class="project-card__action project-card__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-card__action project-card__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="popular-embla__slide">
                    <div class="project-teaser">
                      <div class="project-teaser__media">
                        <div class="project-teaser__flag project-teaser__flag--orange">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-teaser__image">
                        <div class="project-teaser__bar">
                          <div class="project-teaser__title">
                            КД 4 х 4 «Леонид 3»
                          </div>
                          <div class="project-teaser__params">
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-area"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                16 м<sup>2</sup>
                              </div>
                            </div>
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-calendar"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                10 дней
                              </div>
                            </div>
                          </div>
                          <div class="project-teaser__price">
                            <div class="project-teaser__price-lbl">
                              от
                            </div>
                            <div class="project-teaser__price-val">
                              590 000
                            </div>
                            <div class="project-teaser__price-cur">
                              Р
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="project-teaser__actions">
                        <button class="project-teaser__action project-teaser__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-teaser__action project-teaser__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                    <div class="project-card">
                      <div class="project-card__media">
                        <div class="project-card__flag project-card__flag--yellow">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-card__image">
                      </div>
                      <div class="project-card__title">
                        КД 4 х 4 «Леонид 3»
                      </div>
                      <div class="project-card__data">
                        <div class="project-card__params">
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-area"></span>
                            </div>
                            <div class="project-card__param-val">
                              16 м<sup>2</sup>
                            </div>
                          </div>
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-calendar"></span>
                            </div>
                            <div class="project-card__param-val">
                              10 дней
                            </div>
                          </div>
                        </div>
                        <div class="project-card__price">
                          <div class="project-card__price-lbl">
                            от
                          </div>
                          <div class="project-card__price-val">
                            590 000
                          </div>
                          <div class="project-card__price-cur">
                            Р
                          </div>
                        </div>
                      </div>
                      <div class="project-card__actions">
                        <button class="project-card__action project-card__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-card__action project-card__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="popular-embla__slide">
                    <div class="project-teaser">
                      <div class="project-teaser__media">
                        <div class="project-teaser__flag project-teaser__flag--orange">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-teaser__image">
                        <div class="project-teaser__bar">
                          <div class="project-teaser__title">
                            КД 4 х 4 «Леонид 4»
                          </div>
                          <div class="project-teaser__params">
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-area"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                16 м<sup>2</sup>
                              </div>
                            </div>
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-calendar"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                10 дней
                              </div>
                            </div>
                          </div>
                          <div class="project-teaser__price">
                            <div class="project-teaser__price-lbl">
                              от
                            </div>
                            <div class="project-teaser__price-val">
                              590 000
                            </div>
                            <div class="project-teaser__price-cur">
                              Р
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="project-teaser__actions">
                        <button class="project-teaser__action project-teaser__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-teaser__action project-teaser__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                    <div class="project-card">
                      <div class="project-card__media">
                        <div class="project-card__flag project-card__flag--yellow">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-card__image">
                      </div>
                      <div class="project-card__title">
                        КД 4 х 4 «Леонид 4»
                      </div>
                      <div class="project-card__data">
                        <div class="project-card__params">
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-area"></span>
                            </div>
                            <div class="project-card__param-val">
                              16 м<sup>2</sup>
                            </div>
                          </div>
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-calendar"></span>
                            </div>
                            <div class="project-card__param-val">
                              10 дней
                            </div>
                          </div>
                        </div>
                        <div class="project-card__price">
                          <div class="project-card__price-lbl">
                            от
                          </div>
                          <div class="project-card__price-val">
                            590 000
                          </div>
                          <div class="project-card__price-cur">
                            Р
                          </div>
                        </div>
                      </div>
                      <div class="project-card__actions">
                        <button class="project-card__action project-card__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-card__action project-card__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="popular-embla__slide">
                    <div class="project-teaser">
                      <div class="project-teaser__media">
                        <div class="project-teaser__flag project-teaser__flag--orange">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-teaser__image">
                        <div class="project-teaser__bar">
                          <div class="project-teaser__title">
                            КД 4 х 4 «Леонид 5»
                          </div>
                          <div class="project-teaser__params">
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-area"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                16 м<sup>2</sup>
                              </div>
                            </div>
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-calendar"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                10 дней
                              </div>
                            </div>
                          </div>
                          <div class="project-teaser__price">
                            <div class="project-teaser__price-lbl">
                              от
                            </div>
                            <div class="project-teaser__price-val">
                              590 000
                            </div>
                            <div class="project-teaser__price-cur">
                              Р
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="project-teaser__actions">
                        <button class="project-teaser__action project-teaser__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-teaser__action project-teaser__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                    <div class="project-card">
                      <div class="project-card__media">
                        <div class="project-card__flag project-card__flag--yellow">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-card__image">
                      </div>
                      <div class="project-card__title">
                        КД 4 х 4 «Леонид 5»
                      </div>
                      <div class="project-card__data">
                        <div class="project-card__params">
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-area"></span>
                            </div>
                            <div class="project-card__param-val">
                              16 м<sup>2</sup>
                            </div>
                          </div>
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-calendar"></span>
                            </div>
                            <div class="project-card__param-val">
                              10 дней
                            </div>
                          </div>
                        </div>
                        <div class="project-card__price">
                          <div class="project-card__price-lbl">
                            от
                          </div>
                          <div class="project-card__price-val">
                            590 000
                          </div>
                          <div class="project-card__price-cur">
                            Р
                          </div>
                        </div>
                      </div>
                      <div class="project-card__actions">
                        <button class="project-card__action project-card__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-card__action project-card__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="popular-embla__slide">
                    <div class="project-teaser">
                      <div class="project-teaser__media">
                        <div class="project-teaser__flag project-teaser__flag--orange">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-teaser__image">
                        <div class="project-teaser__bar">
                          <div class="project-teaser__title">
                            КД 4 х 4 «Леонид 6»
                          </div>
                          <div class="project-teaser__params">
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-area"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                16 м<sup>2</sup>
                              </div>
                            </div>
                            <div class="project-teaser__param">
                              <div class="project-teaser__param-ico">
                                <span class="icon icon-calendar"></span>
                              </div>
                              <div class="project-teaser__param-val">
                                10 дней
                              </div>
                            </div>
                          </div>
                          <div class="project-teaser__price">
                            <div class="project-teaser__price-lbl">
                              от
                            </div>
                            <div class="project-teaser__price-val">
                              590 000
                            </div>
                            <div class="project-teaser__price-cur">
                              Р
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="project-teaser__actions">
                        <button class="project-teaser__action project-teaser__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-teaser__action project-teaser__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                    <div class="project-card">
                      <div class="project-card__media">
                        <div class="project-card__flag project-card__flag--yellow">
                          Лучшая цена
                        </div>
                        <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-card__image">
                      </div>
                      <div class="project-card__title">
                        КД 4 х 4 «Леонид 6»
                      </div>
                      <div class="project-card__data">
                        <div class="project-card__params">
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-area"></span>
                            </div>
                            <div class="project-card__param-val">
                              16 м<sup>2</sup>
                            </div>
                          </div>
                          <div class="project-card__param">
                            <div class="project-card__param-ico">
                              <span class="icon icon-calendar"></span>
                            </div>
                            <div class="project-card__param-val">
                              10 дней
                            </div>
                          </div>
                        </div>
                        <div class="project-card__price">
                          <div class="project-card__price-lbl">
                            от
                          </div>
                          <div class="project-card__price-val">
                            590 000
                          </div>
                          <div class="project-card__price-cur">
                            Р
                          </div>
                        </div>
                      </div>
                      <div class="project-card__actions">
                        <button class="project-card__action project-card__action--order">
                          Заказать
                        </button>
                        <a href="#" class="project-card__action project-card__action--show">
                          Смотреть проект
                        </a>
                      </div>
                    </div>
                  </div>
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
                <a href="#" class="popular-embla__all">
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
            <div class="advantage-calc" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
              <div class="advantage-calc__title">
                Рассчитаем бесплатно индивидуальный проект
              </div>
              <form action="" class="advantage-calc__form">
                <span class="advantage-calc__form-label">Телефон</span>
                <input type="text" value="" name="phone" data-maska="+7 (###) ###-##-##" placeholder="+7 (000) 000-00-00" class="advantage-calc__form-input">
                <button type="submit" class="advantage-calc__form-submit">Отправить заявку</button>
              </form>
              <div class="advantage-calc__rules">
                Нажимая на кнопку, я даю своё <a href="">согласие на взаимодействие и обработку персональных данных</a>
              </div>
            </div>
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
                <div class="portfolio-embla__slide">
                  <div class="portfolio-card">
                    <div class="portfolio-card__media">
                      <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="portfolio-card__image">
                      <?php
                      $json1 = wp_json_encode([
                        'images' => [
                          get_bloginfo('template_url') . '/assets/showcase.jpg',
                          get_bloginfo('template_url') . '/assets/showcase.jpg'
                        ],
                        'year' => '2025',
                        'title' => 'Название объекта',
                        'desc' => 'Краткое описание выполненного проекта, перечень работ, задачи, решения и реализация'
                      ]);
                      ?>
                      <button type="button" class="portfolio-card__zoom" data-portfolio-modal="<?php echo esc_attr($json1) ?>">
                        <span class="portfolio-card__zoom-icon">
                          <div class="icon icon-fullscreen"></div>
                        </span>
                      </button>
                    </div>

                    <div class="portfolio-card__content">
                      <div class="portfolio-card__header">
                        <div class="portfolio-card__year">
                          2025
                        </div>
                        <div class="portfolio-card__title">
                          Название объекта
                        </div>
                      </div>
                      <div class="portfolio-card__desc">
                        Краткое описание выполненного проекта, перечень работ, задачи, решения и реализация
                      </div>
                    </div>
                  </div>
                </div>
                <div class="portfolio-embla__slide">
                  <div class="portfolio-card">
                    <div class="portfolio-card__media">
                      <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="portfolio-card__image" style="filter: hue-rotate(180deg);">
                      <?php
                      $json2 = wp_json_encode([
                        'images' => [
                          get_bloginfo('template_url') . '/assets/showcase.jpg',
                          get_bloginfo('template_url') . '/assets/showcase.jpg'
                        ],
                        'year' => '2025',
                        'title' => 'Название объекта 2',
                        'desc' => 'Краткое описание выполненного проекта, перечень работ, задачи, решения и реализация'
                      ]);
                      ?>
                      <button type="button" class="portfolio-card__zoom" data-portfolio-modal="<?php echo esc_attr($json2) ?>">
                        <span class="portfolio-card__zoom-icon">
                          <div class="icon icon-fullscreen"></div>
                        </span>
                      </button>
                    </div>

                    <div class="portfolio-card__content">
                      <div class="portfolio-card__header">
                        <div class="portfolio-card__year">
                          2025
                        </div>
                        <div class="portfolio-card__title">
                          Название объекта
                        </div>
                      </div>
                      <div class="portfolio-card__desc">
                        Краткое описание выполненного проекта, перечень работ, задачи, решения и реализация
                      </div>
                    </div>
                  </div>
                </div>
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
              <a href="#" class="portfolio-embla__all">
                <span>Смотреть все <span class="max-md:hidden">построенные объекты</span></span>
                <span class="icon icon-arrow-right"></span>
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="features" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0">
      <div class="container">
        <div class="features__title" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
          <h2 class="features__title-inner">
            Каркасные дома<br>
            СК Поместье
          </h2>
        </div>

        <div class="features__core">
          <div class="features__core-intro">
            Строительная компания «Поместье» - производитель и застройщик быстровозводимого жилья для сезонного (дачного) и круглогодичного проживания во многих регионах России.
          </div>

          <div class="features__item features__item--1">
            <h3 class="features__item-title">
              Почему стоит заказать проект загородного дома в СК «Поместье»
            </h3>
            <div class="features__item-desc">
              <p>Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, </p>
              <ul>
                <li>
                  Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский YНабор слов,
                </li>
                <li>
                  но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э.,
                </li>
                <li>
                  то есть более двух тысячелетий назад. Ричард МакКлинток,
                </li>
                <li>
                  профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, "consectetur"
                </li>
              </ul>
            </div>
          </div>

          <div class="features__item features__item--2">
            <h3 class="features__item-title">
              Готовые загородные дома:<br>
              проекты и цены
            </h3>
            <div class="features__item-desc">
              <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов</p>
            </div>
          </div>

          <div class="features__item features__item--3">
            <h3 class="features__item-title">
              Энергоэффективность<br>
              экономия на отоплении до 50%
            </h3>
          </div>

          <div
            class="features__core-figure">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="631px"
              height="540px">
              <path fill-rule="evenodd" fill="rgb(225, 229, 238)"
                d="M630.1000,156.1000 L432.1000,-0.000 L55.958,180.371 L-0.000,414.999 L577.1000,539.1000 L630.1000,156.1000 Z" />
            </svg>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>