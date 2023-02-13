@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $page_content = $taxonomy->json_params->content->{$locale} ?? ($page->content ?? null);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
  $datas = $taxonomys->chunk(6);
@endphp

@section('content')
  <style>
    #banner {
      background-image: url("{{ $image_background }}");
      background-position: center top;
      background-repeat: no-repeat;
      background-size: 100%;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      padding: 250px 0 0;
    }
  </style>

  <div id="banner">
    <div class="container">
      <h1>{{ $page_title }}</h1>
    </div>
  </div>

  <div id="category">
    <div class="container">
      <h4>
        <span> Giao diện website theo lĩnh vực </span>
      </h4>
      <div class="p-category row">
        @isset($taxonomys)
              @foreach ($taxonomys as $item)
                @php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->json_params->image ?? '';
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
                @endphp

                <a href="{{ $alias_category }}" class="col-lg-2 col-md-3 col-sm-4 category-item">
                  <div class="category-item-img">
                    <img class="img-fluid w-100 h-100" src="{{ $image }}" alt="{{ $title }}">
                  </div>
                  <p>{{ $title }}</p>
                </a>
              @endforeach
            @endisset
      </div>
      <div class="m-category swiper">
        <div class="swiper-wrapper">
          @foreach ($datas as $data)
            <div class="swiper-slide">
              <div class="container">
                <div class="row">
                  @foreach ($data as $item)
                    @php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image = $item->json_params->image ?? '';
                      $date = date('H:i d/m/Y', strtotime($item->created_at));
                      // Viet ham xu ly lay slug
                      // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                      $alias = $item->alias ?? '';
                      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
                    @endphp
                    
                    <div class="col-4">
                      <a href="{{ $alias_category }}" class="category-item">
                        <div class="category-item-img">
                          <img class="img-fluid w-100 h-100" src="{{ $image }}" alt="{{ $title }}">
                        </div>
                        <p>{{ $title }}</p>
                      </a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>

  <div id="project">
    <div class="container">
      <h4>
        <span>{{ $page_title }}</span>
      </h4>
      <div class="p-project row">
        @foreach ($posts as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $item->taxonomy_title, $item->taxonomy_id);
            // $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
            // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
          @endphp
          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-item-img">
              <img src="{{ $image }}" alt="{{ $title }}" />
              <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
            </div>
            <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
          </div>
        @endforeach
      </div>

      <div class="p-project mt-3">
        <div class="d-flex justify-content-center w-100">
          {{ $posts->withQueryString()->links('frontend.pagination.default') }}
        </div>
      </div>

      <div class="m-project row">
        @foreach ($posts as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $item->taxonomy_title, $item->taxonomy_id);
            // $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
            // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
          @endphp
          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-item-img">
              <img src="{{ $image }}" alt="{{ $title }}" />
              <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
            </div>
            <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
          </div>
        @endforeach

      </div>
      <div class="m-project mt-3">
        {{ $posts->withQueryString()->links('frontend.pagination.default') }}
      </div>
    </div>
  </div>

  {{-- End content --}}
@endsection


