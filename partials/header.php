<div class="header-before"></div>
<div class="header-anchor" data-sticky-header-anchor></div>
<div class="header" data-sticky-header data-mobile-menu-state="closed">
  <div class="container header-container">
    <a href="/" class="header-logo">
      <img src="<?php bloginfo('template_url'); ?>/assets/logo.png" alt="" />
    </a>

    <?php wp_nav_menu([
      'theme_location' => 'menu-main',
      'container' => null,
      'menu_class' => 'header-nav',
    ]); ?>

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
      <span class="header-callback__arrow"></span>
      <span class="header-callback__line-s"></span>
      <span class="header-callback__line-m"></span>
      <span class="header-callback__line-r"></span>
    </button>
  </div>
</div>