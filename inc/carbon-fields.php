<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

$theme_options_container = null;

add_action('after_setup_theme', function () {
  \Carbon_Fields\Carbon_Fields::boot();
});

add_action('admin_head', function () {
  echo '<style>
    .cf-radio__list {
      margin: 0;
      padding: 0;
    }

    [data-type^="carbon-fields/block"] {
      position: relative;
      z-index: 1;
    }

    [data-type^="carbon-fields/block"].is-hovered {
      z-index: 2;
    }

    [data-type^="carbon-fields/block"]::before {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      border: .125em solid #6b6d89;
      background: #f0f0f0;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields {
      position: relative;
      padding: 16px 24px;
      z-index: 2;
    }

    .cf-block__fields__title {
      margin: 0;
      font-size: 20px;
      font-weight: 500;
      color: #000;
      line-height: 32px;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2) {
      position: absolute;
      right: 24px;
      top: 16px;
      z-index: 20;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2) .cf-field__head label {
      display: block;
      margin: 0;
      background: var(--wp-components-color-accent, var(--wp-admin-theme-color, #3858e9));
      color: var(--wp-components-color-accent-inverted, #fff);
      outline: 1px solid #0000;
      text-decoration: none;
      text-shadow: none;
      white-space: nowrap;
      height: 32px;
      line-height: 32px;
      padding: 0 12px;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2) .cf-field__body {
      display: none;
      position: absolute;
      right: 8px;
      top: 100%;
      background: #fff;
      border-radius: 4px;
      box-shadow: 0 0 0 1px #ccc, 0 2px 3px #0000000d, 0 4px 5px #0000000a, 0 12px 12px #00000008, 0 16px 16px #00000005;
      box-sizing: border-box;
      width: min-content;
      white-space: nowrap;
      padding: 8px 12px;
      min-width: 160px;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2):hover .cf-field__body {
      display: block;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2) .cf-field__body .cf-set__list {
      padding: 0;
    }
  </style>';
});

function create_block($key, $name, $fields)
{
  global $theme_options_container;

  foreach ($fields as $field) {
    // добавить к простым названиям название блока, чтобы в опциях они были уникальны
    $field->set_base_name($key . '_' . $field->get_base_name());
    // добавить условную логику
    $field->set_conditional_logic([
      [
        'field' => $key . '_block_fields',
        'value' => $field->get_base_name(),
        'compare' => 'INCLUDES',
      ],
    ]);
  }

  // список полей для переключателя
  $edit_fields = [];
  foreach ($fields as $field) {
    $edit_fields[$field->get_base_name()] = $field->get_label();
  }

  $block_fields = array_merge(
    [
      Field::make('html', $key . '_block_name')->set_html(
        '<div class="cf-block__fields__title">' . $name . '</div>',
      ),
      Field::make('set', $key . '_block_fields', 'Редактировать')->set_options($edit_fields),
    ],
    $fields,
  );
  $theme_options_fields = array_merge(
    [
      // условная логика в опциях применяется тоже, поэтому необходимо список полей добавить и туда
      Field::make('set', $key . '_block_fields', 'Редактировать')
        ->set_options($edit_fields)
        ->set_default_value(array_keys($edit_fields)),
      // ->set_conditional_logic([[ 'field' => $key . '_block_fields' ]])
    ],
    $fields,
  );

  Container::make('theme_options', $name)
    ->set_page_parent($theme_options_container)
    ->add_fields($theme_options_fields);

  Block::make('block_' . $key, $name)
    ->add_fields($block_fields)
    ->set_category('layout')
    ->set_mode('edit')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) use ($key) {
      $block_name = $fields[$key . '_block_name'];
      $block_fields = $fields[$key . '_block_fields'];

      unset($fields[$key . '_block_name']);
      unset($fields[$key . '_block_fields']);

      $args_fields = [];

      foreach ($fields as $field_key => $field_value) {
        $short_key = str_replace($key . '_', '', $field_key);
        if (in_array($field_key, $block_fields)) {
          $args_fields[$short_key] = $field_value;
        } else {
          $args_fields[$short_key] = carbon_get_theme_option($field_key);
        }
      }

      get_template_part('blocks/' . $key, null, [
        'fields' => $args_fields,
      ]);
    });
}

add_action('carbon_fields_register_fields', 'register_carbon_fields_blocks');
function register_carbon_fields_blocks()
{
  global $theme_options_container;

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
      Field::make('date', 'date', 'Дата'),
      Field::make('text', 'dimensions', 'Размер'),
      Field::make('text', 'duration', 'Сроки'),
      Field::make('textarea', 'address', 'Адрес')->set_rows(2),
      Field::make('complex', 'specifications', 'Технические характеристики')->add_fields([
        Field::make('text', 'name', 'Название')->set_width(50),
        Field::make('text', 'content', 'Значение')->set_width(50),
      ]),
      Field::make('textarea', 'description', 'Описание')->set_rows(4),
      Field::make('media_gallery', 'gallery', 'Галерея'),
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
      Field::make('html', 'crb_information_text')->set_html(
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

  // Страницы параметров
  $theme_options_container = Container::make('theme_options', 'Параметры')
    ->add_tab('Общее', [
      Field::make('text', 'crb_theme_phone_number', 'Телефон')->set_help_text(
        'Шорткод: {crb_theme_phone_number}',
      ),
      Field::make('text', 'crb_theme_phone_schedule', 'Телефон')->set_help_text(
        'Шорткод: {crb_theme_phone_schedule}',
      ),
    ])
    ->add_tab('Подвал', [Field::make('textarea', 'crb_footer_copyright', 'Копирайт')->set_rows(2)]);

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
