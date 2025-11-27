<?php
add_action('init', 'register_post_types');

function register_post_types()
{
  register_post_type('project', [
    'label' => null,
    'labels' => [
      'name' => 'Проекты',
      'singular_name' => 'Проект',
      'add_new' => 'Добавить проект',
      'add_new_item' => 'Добавить проект',
      'edit_item' => 'Редактировать проект',
      'new_item' => 'Новый проект',
      'view_item' => 'Смотреть проект',
      'search_items' => 'Искать проекты',
      'not_found' => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon' => '',
      'menu_name' => 'Проекты',
    ],
    'description' => '',
    'public' => true,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title', 'thumbnail'],
    'taxonomies' => ['post_tag'],
    'hierarchical' => false,
    'has_archive' => false,
    'rewrite' => true,
    'query_var' => true,
    'show_ui' => true,
  ]);
}
