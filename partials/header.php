<div class="header-before"></div>
<div class="header-anchor" data-sticky-header-anchor></div>
<div class="header" data-sticky-header data-mobile-menu="closed" itemscope itemtype="https://schema.org/LocalBusiness">
  <meta itemprop="name" content="Каркасдома53">
  <link itemprop="logo" href="https://karkasdoma53.ru/wp-content/themes/manor-wp-theme/assets/logo.svg">
  <link itemprop="url" href="https://karkasdoma53.ru/">
  
  <?php if ($addresses = carbon_get_the_post_meta('addresses')): ?>
    <?php foreach ($addresses as $key => $address): ?>
    <meta itemprop="address" content="<?php echo esc_attr($content); ?>">
    <?php endforeach; ?>
  <?php endif; ?>

  <div class="container header-container">
    <button type="button" class="header-toggle" data-mobile-menu-toggle>
      <span class="icon icon-menu"></span>
      <span class="icon icon-close"></span>
    </button>

    <a href="/" class="header-logo">
      <img src="<?php bloginfo('template_url'); ?>/assets/logo.svg" alt="" />
    </a>

    <div class="header-nav">
      <?php wp_nav_menu([
        'theme_location' => 'menu-main',
        'container' => null,
        'menu_class' => 'header-nav__list',
      ]); ?>
    </div>

    <?php if ($phone_number = carbon_get_post_meta(CONTACTS_PAGE_ID, 'phone_number')): ?>
      <a href="tel:<?php echo $phone_number; ?>" class="header-phone" data-call-button>
        <span class="header-phone__number" itemprop="telephone">
          <?php echo $phone_number; ?>
        </span>
        <?php if ($email = carbon_get_post_meta(CONTACTS_PAGE_ID, 'email')): ?>
          <span class="header-phone__time" itemprop="email">
            <?php echo $email; ?>
          </span>
        <?php endif; ?>
      </a>
    <?php endif; ?>

    <button type="button" class="header-callback" data-callback-button>
      <span class="header-callback__text">
        Заказать звонок
      </span>
      <span class="icon icon-arrow-right"></span>
      <span class="icon icon-phone"></span>
      <span class="header-callback__l-l-1"></span>
      <span class="header-callback__l-l-2"></span>
      <span class="header-callback__l-l-3"></span>
      <span class="header-callback__l-c"></span>
      <span class="header-callback__l-r-1"></span>
      <span class="header-callback__l-r-2"></span>
      <span class="header-callback__l-r-3"></span>
    </button>
  </div>
</div>

<div class="float-contacts">
  <?php if ($groups = carbon_get_post_meta(CONTACTS_PAGE_ID, 'groups')): ?>
    <div class="v-social">
      <?php foreach ($groups as $group): ?>
        <a href="<?php echo $group['link']; ?>" class="v-social__item">
          <?php echo $group['icon']; ?>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>