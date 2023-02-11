@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
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

  <div id="blog-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-sm-12">
          <div class="row">
            @foreach ($posts as $item)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                // $date = date('H:i d/m/Y', strtotime($item->created_at));
                $date = date('d', strtotime($item->created_at));
                $month = date('M', strtotime($item->created_at));
                $year = date('Y', strtotime($item->created_at));
                // Viet ham xu ly lay slug
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id, null, $item->taxonomy_alias ?? $item->taxonomy_title);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
              @endphp

              <div class="col-lg-6 col-sm-12">
                <div class="blog-post-container">
                  <div class="blog-post-img">
                    <a href="{{ $alias }}"><img src="{{ $image }}" alt="{{ $title }}"></a>
                  </div>
                  <div class="blog-post-text">
                    <a href="{{ $alias }}" class="title">{{ $title }}</a>
                    <p class="date">
                      <i class="fa-solid fa-calendar"></i>{{ $date }}/{{ $month }}/{{ $year }}
                    </p>
                  </div>
                </div>
              </div>

            @endforeach
            {{ $posts->withQueryString()->links('frontend.pagination.default') }}
            
          </div>
          @if (isset($taxonomy->json_params->content->{$locale}) && $taxonomy->json_params->content->{$locale} != '')
            <div class="row">
              <div class="col-12 mb-5" id="content-detail">
                {!! $taxonomy->json_params->content->{$locale} ?? '' !!}
              </div>

              <div class="col-md-3">
                <button class="button button-border button-rounded button-fill button-blue m-0 ls0 text-uppercase" id="btn-show">
                  <span id="show-more">Xem thêm</span>
                </button>
              </div>
            </div>
          @endif

        </div>
        @include('frontend.components.sidebar.post')
      </div>
    </div>
  </div>

  {{-- End content --}}
@endsection
@push('script')
  <script>
    $(document).on('click', '#btn-show', function() {
      let _html = $("#show-more");
      let _text = _html.html();
      let _target = $("#content-detail");

      console.log(_text);
      if (_text === 'Xem thêm') {
        _target.css('height', 'auto');
        document.getElementById("show-more").innerHTML = "Ẩn bớt";
      } else {
        _target.css('height', '300px');
        document.getElementById("show-more").innerHTML = "Xem thêm";
      }

    });
  </script>
@endpush
