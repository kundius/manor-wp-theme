<section class="footer">
  <div class="container">
    <div class="footer-primary">
      <div class="footer-primary__logo">
        <a href="/" class="footer__logo" target="_blank">
          <img src="<?php bloginfo(
            'template_url',
          ); ?>/assets/logo-footer.png" alt="" width="163" height="60" />
        </a>
      </div>
      <div class="footer-primary__phone">
        <div class="footer-contacts">
          <?php if ($phone_number = carbon_get_post_meta(CONTACTS_PAGE_ID, 'phone_number')): ?>
          <div class="footer-contacts__item">
            <div class="footer-contacts__item-icon">
              <div class="icon icon-phone-circle"></div>
            </div>
            <div class="footer-contacts__item-body">
              <div class="footer-contacts__item-val">
                <?php echo $phone_number; ?>
              </div>
              <?php if (
                $phone_caption = carbon_get_post_meta(CONTACTS_PAGE_ID, 'phone_caption')
              ): ?>
              <div class="footer-contacts__item-desc">
                <?php echo $phone_caption; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if (
            $whatsapp_number = carbon_get_post_meta(CONTACTS_PAGE_ID, 'whatsapp_number')
          ): ?>
          <div class="footer-contacts__item">
            <div class="footer-contacts__item-icon">
              <div class="icon icon-whatsapp"></div>
            </div>
            <div class="footer-contacts__item-body">
              <div class="footer-contacts__item-val">
                <?php echo $whatsapp_number; ?>
              </div>
              <?php if (
                $whatsapp_caption = carbon_get_post_meta(CONTACTS_PAGE_ID, 'whatsapp_caption')
              ): ?>
              <div class="footer-contacts__item-desc">
                <?php echo $whatsapp_caption; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="footer-primary__contacts">
        <div class="footer__contacts">
          <?php echo nl2br(carbon_get_post_meta(CONTACTS_PAGE_ID, 'legal_details')); ?>
        </div>
      </div>
      <div class="footer-primary__nav">
        <?php wp_nav_menu([
          'theme_location' => 'menu-footer',
          'container' => null,
          'menu_class' => 'footer__nav',
        ]); ?>
      </div>
      <div class="footer-primary__links">
        <?php wp_nav_menu([
          'theme_location' => 'menu-rules',
          'container' => null,
          'menu_class' => 'footer__links',
        ]); ?>
        <div class="footer__notice">
          <?php echo nl2br(carbon_get_theme_option('crb_footer_no_oferta')); ?>
        </div>
      </div>
      <div class="footer-primary__social">
        <?php if ($groups = carbon_get_post_meta(CONTACTS_PAGE_ID, 'groups')): ?>
        <div class="v-social v-social--light">
          <?php foreach ($groups as $group): ?>
          <a href="<?php echo $group['link']; ?>" class="v-social__item">
            <?php echo $group['icon']; ?>
          </a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="footer-secondary">
      <div class="footer-secondary__copyright">
        <div class="footer__copyright">
          <?php echo nl2br(carbon_get_theme_option('crb_footer_copyright')); ?>
        </div>
      </div>
      <div class="footer-secondary__sitemap">
        <a href="<?php the_permalink(SITEMAP_PAGE_ID); ?>" class="footer__sitemap">
          Карта сайта
        </a>
      </div>
      <div class="footer-secondary__vendor">
        <a href="https://domenart-studio.ru/" class="footer__creator" target="_blank">
          <img src="<?php bloginfo(
            'template_url',
          ); ?>/assets/creator.png" alt="creator" width="138" height="30" />
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('partials/modals'); ?>

<?php wp_footer(); ?>
