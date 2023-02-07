@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // $params['status'] = App\Consts::POST_STATUS['active'];
    // $params['is_featured'] = true;
    // $params['is_type'] = App\Consts::POST_TYPE['product'];
    
    // $rows = App\Http\Services\ContentService::getCmsPost($params)
    //     ->limit(12)
    //     ->get();
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)
    ->limit(12)
    ->get();
    $m_taxonomys = $taxonomys->chunk(6)
    
  @endphp

  <!-- START CATEGORY -->
  <div id="category">
    <div class="container">
      <h4>
        <i class="{{ $icon }}"></i> {{ $title }}
      </h4>
      <div class="row p-category">
        @foreach ($taxonomys as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            $alias = $item->alias ?? '';
          @endphp

          <!-- Category item -->
          <a href="{{ $alias }}" class="col-lg-2 col-md-3 col-sm-4 category-item">
            <div class="category-item-img"></div>
            <p>{{ $title }}</p>
          </a>
          <!-- Category item -->
          
        @endforeach
        
      </div>
      <div class="m-category swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="container">
              <div class="row">
                @foreach ($m_taxonomys[0] as $item)
                  @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('H:i d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                    $alias = $item->alias ?? '';
                  @endphp

                  <!-- Category item -->
                  <div class="col-4">
                    <a href="{{ $alias }}" class="category-item">
                      <div class="category-item-img"></div>
                      <p>{{ $title }}</p>
                    </a>
                  </div>
                  
                @endforeach
                
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="container">
              <div class="row">
                @foreach ($m_taxonomys[1] as $item)
                  @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('H:i d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                    $alias = $item->alias ?? '';
                  @endphp

                  <!-- Category item -->
                  <div class="col-4">
                    <a href="{{ $alias }}" class="category-item">
                      <div class="category-item-img"></div>
                      <p>{{ $title }}</p>
                    </a>
                  </div>
                  
                @endforeach
                
              </div>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
  <!-- END CATEGORY -->

@endif
