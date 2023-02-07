<?php

namespace App;

use Illuminate\Support\Str;

class Helpers
{
  public static function generateRoute($route, $title, $id, $is_type = null, $taxonomy_title = null)
  {
    // $alias = Str::slug($title) . '-' . $id . '.html';
    if ($is_type) {
      if (isset(Consts::ROUTE_POST[$route])) {
        $alias = Str::slug($title);// . '.html';
        // $taxonomy_title = Str::slug($taxonomy_title);
        // $route = route(Consts::ROUTE_POST[$route], ['alias' => $alias, 'alias_category' => $taxonomy_title]);
        $route = route(Consts::ROUTE_POST[$route], ['alias_category' => $alias]);
      }
    } else {
      if (isset(Consts::ROUTE_TAXONOMY[$route])) {
        $alias = Str::slug($title);
        $alias_arr = ['alias_category' => $alias];
        if ($taxonomy_title != null) {
          $alias_arr['alias'] = Str::slug($taxonomy_title);
        }

        $route = route(Consts::ROUTE_TAXONOMY[$route], $alias_arr);
      }
    }
    return $route;
  }

  public static function getIdFromAlias($slug)
  {
    $id = null;

    if (Str::contains($slug, '.html')) {
      $slug = Str::afterLast(Str::before($slug, '.html'), '-');

      $id = Str::afterLast($slug, '-');
    } else {
      $id = Str::afterLast($slug, '-');
    }

    return $id;
  }
}
