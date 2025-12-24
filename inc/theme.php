<?php

define('DISALLOW_FILE_EDIT', true);

add_filter('excerpt_length', function () {
  return 15;
});

add_image_size('custom-small', 200, 150, true);
add_image_size('custom-medium', 400, 300, true);
add_image_size('custom-large', 800, 600, true);

// Add the theme support basic elements
add_theme_support('align-wide');
add_theme_support('title-tag');
add_theme_support('responsive-embeds');
add_theme_support('editor-styles');
add_theme_support('wp-block-styles');
add_theme_support('post-thumbnails');
add_theme_support('html5', [
  'comment-list',
  'comment-form',
  'search-form',
  'gallery',
  'caption',
  'script',
  'style',
]);

add_shortcode('partial', function ($atts, $content = null) {
  ob_start();
  get_template_part('partials/' . $atts[0]);
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
});

function is_new_year()
{
  if (date('m') === '12' && date('d') >= '12') {
    return true;
  }
  if (date('m') === '01' && date('d') <= '10') {
    return true;
  }
  return false;
}

// Array
// (
//     [name] => small_garant_2.jpg
//     [full_path] => small_garant_2.jpg
//     [type] => image/jpeg
//     [tmp_name] => /tmp/phpagipea
//     [error] => 0
//     [size] => 317550
// )
function create_attachment_from_upload($upload, $post_id = 0)
{
  require_once ABSPATH . 'wp-admin/includes/media.php';
  require_once ABSPATH . 'wp-admin/includes/file.php';
  require_once ABSPATH . 'wp-admin/includes/image.php';

  $attachment_id = media_handle_sideload($upload, $post_id);

  if (is_wp_error($attachment_id)) {
    @unlink($file_array['tmp_name']);
    return $attachment_id;
  }

  return $attachment_id;
}

function plural($n, $forms)
{
  $n = abs($n) % 100; // Берем остаток от 100
  $arr = $forms; // Массив форм: ['яблоко', 'яблока', 'яблок']
  if ($n % 100 >= 11 && $n % 100 <= 19) {
    return $arr[2]; // 11-19 яблок
  }
  $n = $n % 10;
  if ($n == 1) {
    return $arr[0]; // 1 яблоко
  } elseif ($n >= 2 && $n <= 4) {
    return $arr[1]; // 2-4 яблока
  } else {
    return $arr[2]; // 0, 5-9 яблок
  }
}

function add_query_param_to_current_url($param_name, $param_value)
{
  $url_parts = parse_url($_SERVER['REQUEST_URI']);
  parse_str($url_parts['query'] ?? '', $params);

  if ($param_value === null) {
    unset($params[$param_name]); // Удаляем параметр, если значение null
  } else {
    $params[$param_name] = $param_value; // Добавляем или изменяем
  }

  $new_query = http_build_query($params);
  $new_path = $url_parts['path'];

  if ($new_query) {
    $new_path .= '?' . $new_query;
  }

  return $new_path;
}

function extract_rutube_id($url)
{
  $parsed = parse_url($url);
  if (isset($parsed['host']) && strpos($parsed['host'], 'rutube.ru') !== false) {
    preg_match('/\/video\/([a-f0-9]+)\//', $parsed['path'], $matches);
    return isset($matches[1]) ? $matches[1] : null;
  }
  return null;
}

function get_pagination($query)
{
  $links = paginate_links([
    'prev_text' => '<span class="icon icon-arrow-left"></span>',
    'next_text' => '<span class="icon icon-arrow-right"></span>',
    'total' => $query->max_num_pages,
    'current' => max(1, get_query_var('paged')),
  ]);

  if ($links) {
    return '<div class="pagination">' . $links . '</div>';
  }
}

function getLastDayAndMonth(): array
{
  $now = new DateTime();
  $lastDayOfMonth = clone $now;
  $lastDayOfMonth->modify('last day of this month');

  $day = (int) $lastDayOfMonth->format('j'); // без ведущего нуля

  $monthNum = (int) $lastDayOfMonth->format('n');

  // Названия месяцев в родительном падеже
  $months = [
    1 => 'января',
    2 => 'февраля',
    3 => 'марта',
    4 => 'апреля',
    5 => 'мая',
    6 => 'июня',
    7 => 'июля',
    8 => 'августа',
    9 => 'сентября',
    10 => 'октября',
    11 => 'ноября',
    12 => 'декабря',
  ];

  $monthName = $months[$monthNum] ?? 'неизвестного месяца';

  return [
    'day' => $day,
    'month' => $monthName,
  ];
}
