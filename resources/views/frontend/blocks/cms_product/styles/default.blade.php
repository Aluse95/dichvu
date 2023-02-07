@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
      ->limit(6)
      ->get();
    $m_rows = App\Http\Services\ContentService::getCmsPost($params)
      ->limit(3)
      ->get();
    // $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    // $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    // $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)
    // ->limit(12)
    // ->get();
    
  @endphp

  <style>
    #project {
      margin-top: 80px;
      background-image: url("{{ $background }}");
      background-size: 50%;
      background-position: center;
      background-repeat: no-repeat;
    }
  </style>

  <div id="project">
    <div class="container">
      <h4>
        <i class="{{ $icon }}"></i> {{ $title }}
      </h4>
      <div class="row p-project">
        @foreach ($rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            // $image = $block->image != '' ? $block->image : '';

            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            // $alias = $item->alias ?? '';
          @endphp

          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-item-img">
              <img src="{{ $image }}" alt="{{ $title }}" />
              <a href="#" class="demo-btn">Xem Demo</a>
              <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
            </div>
            <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
          </div>
        
        @endforeach
          
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="{{ $url_link }}" class="button"
            >{{ $url_link_title }} <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
      <div class="row m-project">
        @foreach ($m_rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            // $image = $block->image != '' ? $block->image : '';

            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            // $alias = $item->alias ?? '';
          @endphp

          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-item-img">
              <img src="{{ $image }}" alt="{{ $title }}" />
              <a href="#" class="demo-btn">Xem Demo</a>
              <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
            </div>
            <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
          </div>
        
        @endforeach
          
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="{{ $url_link }}" class="button"
            >{{ $url_link_title }} <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

@endif
