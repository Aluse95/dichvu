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
@push('style')
  <style>
    #content-detail {
      height: 300px;
      overflow: hidden;
    }
  </style>
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title" class="page-title-parallax page-title-center page-title-dark include-header"
    style="background-image: linear-gradient(to top, rgba(254,150,3,0.5), #39384D), url('{{ $image_background }}'); background-size: cover; padding: 120px 0;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      {{-- <div class="badge rounded-pill border border-light text-light">{{ $page_title }}</div> --}}
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
        @if ($taxonomy->parent_title != '')
          @php
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy->parent_alias ?? $taxonomy->parent_title, $taxonomy->parent_id);
          @endphp
          <li class="breadcrumb-item"><a href="{{ $alias_category }}">{{ $taxonomy->parent_title ?? '' }}</a></li>
        @endif
      </ol>
      <h1>{{ $page_title }}</h1>
    </div>
  </section>

  <section id="content">

    <div class="content-wrap">
      <div class="container mb-3">

        <div class="row mb-5 clearfix">
          <div class="postcontent col-lg-9">
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
                <div class="col-md-6">
                  <article class="entry">
                    <div class="entry-image mb-3">
                      <a href="{{ $alias }}"><img src="{{ $image }}" alt="{{ $title }}"></a>
                      <div class="bg-overlay">
                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="500">
                          <a href="{{ $alias }}" class="overlay-trigger-icon bg-light text-dark"
                            data-hover-animate="fadeIn" data-hover-speed="500"><i class="icon-line-ellipsis"></i></a>
                        </div>
                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="500"></div>
                      </div>
                    </div>
                    <div class="entry-title">
                      <h3><a href="{{ $alias }}">{{ $title }}</a></h3>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        {{-- <li><i class="icon-line2-folder"></i><a href="{{ $alias_category }}">
                            {{ $item->taxonomy_title }}</a>
                        </li> --}}
                        <li><i class="icon-calendar-times1"></i> {{ $date }} {{ $month }}
                          {{ $year }}
                        </li>
                      </ul>
                    </div>
                    <div class="entry-content clearfix">
                      <p>{{ Str::limit($brief, 100) }}</p>
                    </div>
                  </article>
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
  </section>
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
