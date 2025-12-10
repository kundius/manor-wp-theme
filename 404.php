<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

    <div class="grow">
      <div class="page-404-section">
        <div class="page-404-media">
          <div class="page-404-headline">
            <div class="page-404-headline__title">404</div>
            <div class="page-404-headline__desc">Страница не&nbsp;найдена</div>
          </div>
          <div class="page-404-image"></div>
          <div class="page-404-figure">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            width="362px" height="310px">
            <path fill-rule="evenodd"  fill="rgb(225, 229, 238)"
            d="M361.894,90.501 L248.522,0.518 L32.633,103.896 L0.592,238.371 L331.547,310.014 L361.894,90.501 Z"/>
            </svg>
          </div>
        </div>
        <div class="page-404-content">
          <div class="page-404-content__desc">
            Возможно, она была перемещена или удалена.<br>
            Вы можете вернуться назад или&nbsp;перейти в каталог
          </div>
          <a href="<?php the_permalink(11); ?>" class="page-404-content__action">
            <span>Каталог проектов</span>
            <span class="icon icon-arrow-right"></span>
          </a>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
