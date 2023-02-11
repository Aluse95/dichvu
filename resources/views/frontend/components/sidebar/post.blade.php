<div class="col-lg-3 col-sm-12">
  @php
    $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['post'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
  @endphp
  @isset($taxonomys)
    <div class="blog-category-list">
      <p class="title">@lang('Post category')</p>
      <ul>
        @foreach ($taxonomys as $item)
          @if ($item->parent_id == 0 || $item->parent_id == null)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id);
              
              $url_current = url()->full();
              $current = $alias_category == $url_current ? 'current-nav-item' : '';
            @endphp

            <li>
              <a href="{{ $alias_category }}">
                <i class="fa-solid fa-angle-right"></i>
                {{ Str::limit($title, 100) }}
              </a>
            </li>
            
            @foreach ($taxonomys as $sub)
              @if ($sub->parent_id == $item->id)
                @php
                  $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                  
                  $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $item->title, $sub->id, null, $sub->alias ?? $title_sub);
                  
                  $current = $alias_category_sub == $url_current ? 'current-nav-item' : '';
                @endphp
                <li>
                  <a href="{{ $alias_category_sub }}" title="{{ $title_sub }}" class="pl-3">
                    - - {{ Str::limit($title_sub, 100) }}
                  </a>
                </li>
              @endif
            @endforeach
          @endif
        @endforeach
        
        
      </ul>
    </div>
  @endisset

  @php
    $params_product['status'] = App\Consts::POST_STATUS['active'];
    $params_product['is_type'] = App\Consts::POST_TYPE['post'];
    $params_product['order_by'] = 'id';
    
    $recents = App\Http\Services\ContentService::getCmsPost($params_product)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  @endphp
  @isset($recents)
    <div class="blog-category-suggest">
      <p class="title">@lang('Latest post')</p>
      @foreach ($recents as $item)
        @php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          $date = date('H:i d/m/Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
        @endphp

        <div class="blog-category-suggest-post">
          <a href="{{ $alias }}">
            <div class="blog-category-suggest-post-img">
              <img src="{{ $image }}" alt="{{ $title }}"/>
            </div>
            <p class="title">{{ Str::limit($title, 50) }}</p>
          </a>
        </div>

      @endforeach
    </div>

  @endisset

  @php
    $params_product['status'] = App\Consts::POST_STATUS['active'];
    $params_product['is_type'] = App\Consts::POST_TYPE['post'];
    $params_product['order_by'] = 'count_visited';
    
    $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  @endphp
  @isset($mostViews)

    <div class="blog-category-suggest">
      <p class="title">@lang('Most viewed post')</p>
      @foreach ($mostViews as $item)
        @php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          $date = date('H:i d/m/Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
        @endphp

        <div class="blog-category-suggest-post">
          <a href="{{ $alias }}">
            <div class="blog-category-suggest-post-img">
              <img src="{{ $image }}" alt="{{ $title }}"/>
            </div>
            <p class="title">{{ Str::limit($title, 50) }}</p>
          </a>
        </div>

      @endforeach
    </div>

  @endisset

</div>
