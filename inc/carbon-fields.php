<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('after_setup_theme', function () {
  \Carbon_Fields\Carbon_Fields::boot();
});

add_action('carbon_fields_register_fields', 'register_carbon_fields_blocks');
function register_carbon_fields_blocks()
{
  Container::make('post_meta', 'SEO')
    ->where('post_type', '=', 'page')
    ->or_where('post_type', '=', 'post')
    ->or_where('post_type', '=', 'case')
    ->or_where('post_type', '=', 'project')
    ->add_fields([

      Field::make('text', 'crb_seo_title', 'Заголовок'),
      Field::make('text', 'crb_seo_keywords', 'Ключевые слова'),
      Field::make('textarea', 'crb_seo_description', 'Описание'),

    ]);

  // Поля шаблона Отзывы
  Container::make('post_meta', 'Отзывы')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'templates/reviews.php')
    ->add_fields([Field::make('rich_text', 'description', 'Описание')]);

  Container::make('post_meta', 'Отзывы')
    ->where('post_type', '=', 'review')
    ->add_fields([Field::make('textarea', 'video', 'Ссылка на видео')->set_rows(2)]);

  // Поля шаблона Портфолио
  Container::make('post_meta', 'Портфолио')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'templates/portfolio.php')
    ->add_fields([Field::make('rich_text', 'description', 'Описание')]);

  Container::make('post_meta', 'Портфолио')
    ->where('post_type', '=', 'case')
    ->add_fields([
      Field::make('text', 'dimensions', 'Размер'),
      Field::make('text', 'duration', 'Сроки'),
      Field::make('textarea', 'address', 'Адрес')->set_rows(2),
      Field::make('complex', 'specifications', 'Технические характеристики')->add_fields([
        Field::make('text', 'name', 'Название')->set_width(50),
        Field::make('text', 'content', 'Значение')->set_width(50),
      ]),
      Field::make('textarea', 'description', 'Описание')->set_rows(4),
      Field::make('media_gallery', 'gallery', 'Галерея'),
      Field::make('checkbox', 'at_home', 'На главную'),
    ]);

  Container::make('post_meta', 'Проект')
    ->where('post_type', '=', 'project')
    ->add_fields([
      Field::make('select', 'type', 'Тип дома')->set_options([
        'frame' => 'Каркасный дом',
      ]),
      Field::make('checkbox', 'at_home', 'На главную'),
      Field::make('checkbox', 'favorite', 'Популярное'),
      Field::make('text', 'material', 'Материал'),
      Field::make('text', 'dimensions', 'Размер'),
      Field::make('text', 'total_area', 'Общая площадь'),
      Field::make('text', 'footprint_area', 'Площадь застройки'),
      Field::make('text', 'room_count', 'Количество комнат'),
      Field::make('text', 'floor_count', 'Количество этажей'),
      Field::make('checkbox', 'with_attic', 'С мансардой'),
      Field::make('text', 'duration', 'Сроки'),
      Field::make('text', 'price', 'Цена'),
      Field::make('text', 'sticker_text', 'Текст стикера'),
      Field::make('select', 'sticker_color', 'Цвет стикера')->set_options([
        'orange' => 'Оранжевый',
        'green' => 'Зеленый',
        'yellow' => 'Желтый',
      ]),
      Field::make('media_gallery', 'gallery', 'Галерея'),
    ]);

  $packages_query = new WP_Query();

  // Комплектации проекта
  $packages = $packages_query->query([
    'post_type' => 'package',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
  ]);
  $packages_container = Container::make('post_meta', 'Комплектации')->where(
    'post_type',
    '=',
    'project',
  );
  foreach ($packages as $package) {
    $packages_container->add_tab($package->post_title, [
      Field::make(
        'checkbox',
        'package_' . $package->ID . '_is_active',
        'Использовать комплектацию',
      ),
      Field::make('text', 'package_' . $package->ID . '_price', 'Цена'),
    ]);
  }

  // Встраиваемые в контент блоки
  Block::make('feedback_form', 'Обратная связь')
    ->add_fields([
      Field::make('html', 'crb_feedback_form_info')->set_html(
        '<div style="font-size: 32px;text-align: center;padding: 24px;background: aliceblue;border: 4px solid cadetblue;">Форма обратной связи</div>',
      ),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('blocks/feedback-form', null, [
        'fields' => $fields,
      ]);
    });
  Block::make('sitemap', 'Карта сайта')
    ->add_fields([
      Field::make('html', 'crb_sitemap_info')->set_html(
        '<div style="font-size: 32px;text-align: center;padding: 24px;background: aliceblue;border: 4px solid cadetblue;">Карта сайта</div>',
      ),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('blocks/sitemap', null, [
        'fields' => $fields,
      ]);
    });

  // Страницы параметров
  Container::make('theme_options', 'Параметры')
    ->add_tab('Общее', [
      Field::make('textarea', 'crb_counters', 'Копирайт')->set_rows(2),
      Field::make('textarea', 'crb_form_rules', 'Согласие в форме')->set_rows(4)
    ])
    ->add_tab('Подвал', [
      Field::make('textarea', 'crb_footer_copyright', 'Копирайт')->set_rows(2),
      Field::make('textarea', 'crb_footer_no_oferta', 'Не оферта')->set_rows(2),
    ]);

  // Поля шаблона контакты
  Container::make('post_meta', 'Контакты')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'templates/contacts.php')
    ->add_fields([
      Field::make('text', 'email', 'E-mail'),
      Field::make('text', 'phone_number', 'Телефон / Номер'),
      Field::make('text', 'phone_caption', 'Телефон / Подпись'),
      Field::make('text', 'phone_desc', 'Телефон / Описание'),
      Field::make('text', 'whatsapp_number', 'WhatsApp / Номер'),
      Field::make('text', 'whatsapp_caption', 'WhatsApp / Подпись'),
      Field::make('text', 'whatsapp_desc', 'WhatsApp / Описание'),
      Field::make('rich_text', 'legal_details', 'Реквизиты'),
      Field::make('complex', 'groups', 'Соцсети')->add_fields([
        Field::make('text', 'link', 'Ссылка'),
        Field::make('textarea', 'icon', 'Код иконки')->set_rows(2),
      ]),
      Field::make('complex', 'addresses', 'Адреса')->add_fields([
        Field::make('text', 'title', 'Название'),
        Field::make('rich_text', 'content', 'Описание'),
        Field::make('textarea', 'map', 'Код карты')->set_rows(2),
      ]),
    ]);

  Container::make('post_meta', 'Комплектация')
    ->where('post_type', '=', 'package')
    ->add_fields([Field::make('text', 'display_name', 'Название')]);

  // Пример встраиваемой в контент секции
  // create_block('intro', 'Интро', [
  //   Field::make('textarea', 'big_title', 'Большой заголовок')->set_rows(2),
  //   Field::make('textarea', 'small_title', 'Малый заголовок')->set_rows(2),
  //   Field::make('textarea', 'desc', 'Описание')->set_rows(2),
  //   Field::make('text', 'action_text', 'Кнопка / Текст'),
  //   Field::make('text', 'action_link', 'Кнопка / Ссылка'),
  //   Field::make('image', 'background', 'Фон'),
  //   Field::make('image', 'background', 'Вертикальная надпись'),
  //   Field::make('complex', 'enum_list', 'Перечисление')->add_fields([
  //     Field::make('text', 'text', 'Текст')
  //   ])
  // ]);
}
