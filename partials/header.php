<div class="header-before"></div>
<div class="header-anchor" data-sticky-header-anchor></div>
<div class="header" data-sticky-header data-mobile-menu-state="closed">
  <div class="container header-container">
    <button class="header-toggle">
      <span class="icon icon-menu"></span>
    </button>

    <a href="/" class="header-logo">
      <img src="<?php bloginfo('template_url'); ?>/assets/logo.png" alt="" />
    </a>

    <div class="header-nav">
      <button class="header-nav__close">
        <span class="icon icon-close"></span>
      </button>
      <?php wp_nav_menu([
        'theme_location' => 'menu-main',
        'container' => null,
        'menu_class' => 'header-nav__list',
      ]); ?>
    </div>

    <div class="header-phone">
      <a href="tel:<?php echo carbon_get_theme_option('crb_theme_phone_number'); ?>" class="header-phone__number" data-call-button>
        <?php echo carbon_get_theme_option('crb_theme_phone_number'); ?>
      </a>
      <div class="header-phone__time"><?php echo carbon_get_theme_option('crb_theme_phone_schedule'); ?></div>
    </div>

    <button type="button" class="header-callback">
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