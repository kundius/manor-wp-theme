<?php
/*
Template Name: Контакты
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

    <section class="page-section">
      <div class="page-bg-sharp page-bg-sharp--contacts" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0"></div>

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

        <div class="contacts-layout">
          <div class="contacts-layout__info">
            <div class="contacts-info">
              <div class="contacts-info__title">
                Контактная информация
              </div>
              <div class="contacts-info__phones">
                <?php if ($phone_number = carbon_get_the_post_meta('phone_number')): ?>
                  <div class="contacts-info__phone">
                    <div class="contacts-info__phone-icon">
                      <div class="icon icon-phone-circle"></div>
                    </div>
                    <div class="contacts-info__phone-body">
                      <div class="contacts-info__phone-value">
                        <?php echo $phone_number; ?>
                      </div>
                      <?php if ($phone_caption = carbon_get_the_post_meta('phone_caption')): ?>
                        <div class="contacts-info__phone-caption">
                          <?php echo $phone_caption; ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($phone_desc = carbon_get_the_post_meta('phone_desc')): ?>
                        <div class="contacts-info__phone-desc">
                          <?php echo $phone_desc; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if ($whatsapp_number = carbon_get_the_post_meta('whatsapp_number')): ?>
                  <div class="contacts-info__phone">
                    <div class="contacts-info__phone-icon">
                      <div class="icon icon-whatsapp"></div>
                    </div>
                    <div class="contacts-info__phone-body">
                      <div class="contacts-info__phone-value">
                        <?php echo $whatsapp_number; ?>
                      </div>
                      <?php if (
                        $whatsapp_caption = carbon_get_the_post_meta('whatsapp_caption')
                      ): ?>
                        <div class="contacts-info__phone-caption">
                          <?php echo $whatsapp_caption; ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($whatsapp_desc = carbon_get_the_post_meta('whatsapp_desc')): ?>
                        <div class="contacts-info__phone-desc">
                          <?php echo $whatsapp_desc; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              <div class="contacts-info__others">
                <?php if ($email = carbon_get_the_post_meta('email')): ?>
                  <div class="contacts-info__email">
                    <div class="contacts-info__email-icon">
                      <div class="icon icon-mail-circle"></div>
                    </div>
                    <div class="contacts-info__email-body">
                      <div class="contacts-info__email-value">
                        <?php echo $email; ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if ($groups = carbon_get_the_post_meta('groups')): ?>
                  <div class="contacts-info__groups">
                    <?php foreach ($groups as $group): ?>
                      <a href="<?php echo $group['link']; ?>" class="contacts-info__groups-item">
                        <?php echo $group['icon']; ?>
                      </a>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="contacts-layout__legal">
            <div class="contacts-legal">
              <div class="contacts-legal__title">
                Реквизиты
              </div>
              <div class="contacts-legal__body">
                <div class="contacts-legal__icon">
                  <span class="icon icon-legal-circle"></span>
                </div>
                <div class="contacts-legal__value">
                  <?php echo nl2br(carbon_get_the_post_meta('legal_details')); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="contacts-layout__addresses">
            <?php if ($addresses = carbon_get_the_post_meta('addresses')): ?>
              <div class="contacts-addresses">
                <div class="contacts-addresses__title" data-scroll data-scroll-css-progress data-scroll-position="start, middle" data-scroll-offset="0, 40%">
                  <div class="contacts-addresses__title-inner">
                    Наши адреса
                  </div>
                </div>
                <div class="contacts-addresses__list">
                  <?php foreach ($addresses as $key => $address): ?>
                    <div class="contacts-addresses__item">
                      <div class="contacts-addresses__item-header">
                        <div class="contacts-addresses__item-key">
                          <?php echo str_pad($key + 1, 2, '0', STR_PAD_LEFT); ?>
                        </div>
                        <div class="contacts-addresses__item-title">
                          <?php echo $address['title']; ?>
                        </div>
                      </div>
                      <?php if ($content = $address['content']): ?>
                        <div class="contacts-addresses__item-content">
                          <?php echo nl2br($content); ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($map = $address['map']): ?>
                        <div class="contacts-addresses__item-map">
                          <?php echo $map; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <?php if ($content = get_the_content()): ?>
          <div class="page-section__content">
            <div class="content" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0">
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
