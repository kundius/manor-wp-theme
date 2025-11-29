<div class="project-card">
  <div class="project-card__media">
    <div class="project-card__flag project-card__flag--yellow">
      Лучшая цена
    </div>
    <img src="<?php bloginfo('template_url'); ?>/assets/showcase.jpg" alt="" class="project-card__image">
  </div>
  <div class="project-card__title">
    <?php the_title(); ?>
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
    <button type="button" class="project-card__action project-card__action--order">
      Заказать
    </button>
    <a href="<?php the_permalink(); ?>" class="project-card__action project-card__action--show">
      Смотреть проект
    </a>
  </div>
</div>