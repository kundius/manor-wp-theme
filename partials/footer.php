<section class="footer">
  <div class="container">
    <div class="footer-primary">
      <div class="footer-primary__logo">
        <a href="/" class="footer__logo" target="_blank">
          <img src="<?php bloginfo('template_url'); ?>/assets/logo-footer.png" alt="" width="163" height="60" />
        </a>
      </div>
      <div class="footer-primary__phone">
        <div class="footer-contacts">
          <div class="footer-contacts__item">
            <div class="footer-contacts__item-icon">
              <div class="icon icon-phone-circle"></div>
            </div>
            <div class="footer-contacts__item-body">
              <div class="footer-contacts__item-val">
                8 (800) 707-73-53
              </div>
              <div class="footer-contacts__item-desc">
                звонок по России бесплатный
              </div>
            </div>
          </div>
          <div class="footer-contacts__item">
            <div class="footer-contacts__item-icon">
              <div class="icon icon-whatsapp"></div>
            </div>
            <div class="footer-contacts__item-body">
              <div class="footer-contacts__item-val">
                8-960-209-79-33
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-primary__contacts">
        <div class="footer__contacts">
          ИНН / КПП 5313003320 / 531301001<br>
          ОГРН 1155321006367<br>
          Расчетный счёт 40702810301090000240<br>
          БИК 044959746<br>
          К/с 30101810900000000746<br>
          в ПАО УКБ «Новобанк»
        </div>
      </div>
      <div class="footer-primary__nav">
        <ul class="footer__nav">
          <li><a href="#">Каркасные дома</a></li>
          <li><a href="#">Акции</a></li>
          <li><a href="#">Отзывы</a></li>
          <li><a href="#">Наши работы</a></li>
          <li><a href="#">Гарантии</a></li>
          <li><a href="#">Доставка и оплата</a></li>
          <li><a href="#">Договор</a></li>
          <li><a href="#">Кредит</a></li>
          <li><a href="#">Материнский капитал</a></li>
          <li><a href="#">Статьи</a></li>
          <li><a href="#">Контакты</a></li>
        </ul>
      </div>
      <div class="footer-primary__links">
        <div class="footer__links">
          <a href="<?php the_permalink(3) ?>">Политика конфиденциальности</a>
          <a href="#">Пользовательское соглашение</a>
        </div>
        <div class="footer__notice">
          Вся информация на сайте носит <span>исключительно</span> информационный характер и ни при каких условиях не является публичной офертой, опредеяемой положениями Статьи 437 ГК РФ.
        </div>
      </div>
      <div class="footer-primary__social">
        <div class="v-social v-social--light">
          <a href="#" class="v-social__item">
            <span class="icon icon-vk"></span>
          </a>
          <a href="#" class="v-social__item">
            <span class="icon icon-max"></span>
          </a>
          <a href="#" class="v-social__item">
            <span class="icon icon-rutube"></span>
          </a>
          <a href="#" class="v-social__item">
            <span class="icon icon-ok"></span>
          </a>
        </div>
      </div>
    </div>
    <div class="footer-secondary">
      <div class="footer-secondary__copyright">
        <div class="footer__copyright">
          © СК «Поместье» 2015 - 2025
        </div>
      </div>
      <div class="footer-secondary__sitemap">
        <a href="#" class="footer__sitemap">
          Карта сайта
        </a>
      </div>
      <div class="footer-secondary__vendor">
        <a href="https://domenart-studio.ru/" class="footer__creator" target="_blank">
          <img src="<?php bloginfo('template_url'); ?>/assets/creator.png" alt="creator" width="138" height="30" />
        </a>
      </div>
    </div>
  </div>
</section>

<svg width="0" height="0" aria-hidden="true">
  <filter id="fade" color-interpolation-filters="sRGB" primitiveUnits="objectBoundingBox" x="0" y="0" width="1" height="1">
    <feComponentTransfer result="mid">
      <feFuncA type="table" tableValues="0 0 1"></feFuncA>
    </feComponentTransfer>
    <feGaussianBlur stdDeviation=".02 0" edgeMode="duplicate"></feGaussianBlur>
    <feComponentTransfer>
      <feFuncA type="table" tableValues="-1 1"></feFuncA>
    </feComponentTransfer>
    <feComponentTransfer>
      <feFuncA type="gamma" exponent="2"></feFuncA>
    </feComponentTransfer>
    <feComposite in="mid" operator="in"></feComposite>
  </filter>
</svg>

<?php get_template_part('partials/modals'); ?>

<?php wp_footer(); ?>