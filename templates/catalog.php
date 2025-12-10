<?php
/*
Template Name: Каталог
*/
$filters = [
  'area' => [
    'title' => 'Площадь:',
    'options' => [
      'to50' => [
        'title' => 'до 50 м<sup>2</sup>',
        'count' => 0,
        'params' => [
          [
            'key' => 'total_area',
            'compare' => '<=',
            'type' => 'NUMERIC',
            'value' => 50,
          ],
        ],
      ],
      'from50to100' => [
        'title' => 'от 50 м<sup>2</sup> до 100 м<sup>2</sup>',
        'count' => 0,
        'params' => [
          'relation' => 'AND',
          [
            'key' => 'total_area',
            'compare' => '>',
            'type' => 'NUMERIC',
            'value' => 50,
          ],
          [
            'key' => 'total_area',
            'compare' => '<=',
            'type' => 'NUMERIC',
            'value' => 100,
          ],
        ],
      ],
      'from100' => [
        'title' => 'от 100 м<sup>2</sup>',
        'count' => 0,
        'params' => [
          [
            'key' => 'total_area',
            'compare' => '>',
            'type' => 'NUMERIC',
            'value' => 100,
          ],
        ],
      ],
    ],
  ],
  'floor' => [
    'title' => 'Этажность:',
    'options' => [
      'one' => [
        'title' => '1-этажные',
        'count' => 0,
        'params' => [
          [
            'key' => 'floor_count',
            'compare_key' => '=',
            'value' => '1',
          ],
        ],
      ],
      'one_and_half' => [
        'title' => '1.5-этажные',
        'count' => 0,
        'params' => [
          [
            'key' => 'floor_count',
            'compare_key' => '=',
            'value' => '1.5',
          ],
        ],
      ],
      'two' => [
        'title' => '2х-этажные',
        'count' => 0,
        'params' => [
          [
            'key' => 'floor_count',
            'compare_key' => '=',
            'value' => '2',
          ],
        ],
      ],
      'with_attic' => [
        'title' => 'С мансардой',
        'count' => 0,
        'params' => [
          [
            'key' => 'with_attic',
            'compare_key' => '=',
            'value' => 'yes',
          ],
        ],
      ],
    ],
  ],
  // 'packages' => [
  //   'title' => 'Этажность:',
  //   'options' => [
  //     '1' => [
  //       'title' => 'Холодный контур',
  //       'count' => 0,
  //       'params' => []
  //     ],
  //   ]
  // ]
];

$query_args = [
  'post_type' => 'project',
  'paged' => get_query_var('paged') ?: 1,
  'meta_query' => [],
];

// задать фильтры запроса из адресной строки
foreach ($filters as $filter_name => $filter) {
  $group_meta_query = [];
  if (!empty($_GET[$filter_name])) {
    $array = explode(',', $_GET[$filter_name]);
    foreach ($filter['options'] as $option_name => $option) {
      if (in_array($option_name, $array)) {
        if (count($option['params']) > 1) {
          $group_meta_query[] = $option['params'];
        } else {
          $group_meta_query = array_merge($group_meta_query, $option['params']);
        }
      }
    }
  }
  if (count($group_meta_query) > 0) {
    $query_args['meta_query'][$filter_name] = array_merge(['relation' => 'OR'], $group_meta_query);
  }
}

// посчитать количество проектов для каждого параметра фильтра
foreach ($filters as $filter_name => $filter) {
  foreach ($filter['options'] as $option_name => $option) {
    $query = new WP_Query([
      'post_type' => 'project',
      'meta_query' => array_merge($query_args['meta_query'], [
        $filter_name => $option['params'],
      ]),
    ]);
    $filters[$filter_name]['options'][$option_name]['count'] = $query->found_posts;
  }
}

// добавить сортировку из адресной строки
if (!empty($_GET['sort'])) {
  switch ($_GET['sort']) {
    // case 'cheaper':
    //   $query_args['meta_key'] = 'price';
    //   $query_args['orderby'] = 'meta_value_num';
    //   $query_args['order'] = 'ASC';
    //   $query_args['meta_type'] = 'NUMBER';
    //   break;
    // case 'expensive':
    //   $query_args['meta_key'] = 'price';
    //   $query_args['orderby'] = 'meta_value_num';
    //   $query_args['order'] = 'DESC';
    //   $query_args['meta_type'] = 'NUMBER';
    //   break;
    default:
      $query_args['orderby'] = [
        'menu_order' => 'ASC',
      ];
  }
}

$projects = new WP_Query($query_args);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

    <section class="page-section">
      <div class="page-bg-sharp" data-scroll data-scroll-css-progress data-scroll-position="start, end" data-scroll-offset="0, 0"></div>

      <div class="container">
        <div class="page-section__breadcrumbs breadcrumbs">
          <ol class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList" aria-label="Хлебные крошки">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a class="breadcrumbs__item" itemprop="item" href="/">
                <span itemprop="name">Главная</span>
              </a>
              <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span class="breadcrumbs__item" itemprop="item" aria-current="page">
                <span itemprop="name"><?php the_title(); ?></span>
              </span>
              <meta itemprop="position" content="2" />
            </li>
          </ol>
        </div>

        <?php if ($title = get_the_title()): ?>
        <h1 class="page-section__title<?php if (
          mb_strlen($title) > 20
        ): ?> page-section__title--small<?php endif; ?>">
            <?php echo $title; ?>
        </h1>
        <?php endif; ?>

        <div class="catalog-filter" data-catalog-filter>
          <?php foreach ($filters as $filter_name => $filter): ?>
            <div class="catalog-filter__group">
              <div class="catalog-filter__title"><?php echo $filter['title']; ?></div>
              <div class="catalog-filter__list">
                <?php foreach ($filter['options'] as $option_name => $option): ?>
                  <button
                    type="button"
                    class="catalog-filter__toggle <?php if (
                      !empty($_GET[$filter_name]) &&
                      in_array($option_name, explode(',', $_GET[$filter_name]))
                    ): ?>active<?php endif; ?>"
                    data-catalog-filter-toggle="<?php echo $filter_name; ?>:<?php echo $option_name; ?>"
                    <?php if ($option['count'] === 0): ?> disabled<?php endif; ?>>
                    <?php echo $option['title']; ?>
                    <span class="catalog-filter__count">
                      <?php echo $option['count']; ?>
                    </span>
                  </button>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="catalog-filter__group">
            <div class="catalog-filter__title">Сортировать:</div>
            <div class="catalog-filter__list">
              <select class="catalog-filter__select" data-catalog-filter-sort>
                <option value="" <?php if (
                  empty($_GET['sort'])
                ): ?>selected<?php endif; ?>>По популярности</option>
                <option value="cheaper" <?php if (
                  !empty($_GET['sort']) &&
                  $_GET['sort'] == 'cheaper'
                ): ?>selected<?php endif; ?>>Сначала дешевле</option>
                <option value="expensive" <?php if (
                  !empty($_GET['sort']) &&
                  $_GET['sort'] == 'expensive'
                ): ?>selected<?php endif; ?>>Сначала дороже</option>
              </select>
              <button type="button" class="catalog-filter__reset" data-catalog-filter-reset>
                Сбросить
              </button>
            </div>
          </div>
        </div>

        <div class="catalog-list">
          <?php
          while ($projects->have_posts()) {
            $projects->the_post();
            get_template_part('partials/project-card');
          }
          wp_reset_postdata();
          ?>
        </div>

        <?php echo get_pagination($projects); ?>

        <div class="page-section__content">
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
