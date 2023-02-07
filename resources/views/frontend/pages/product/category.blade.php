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
  
@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title" class="page-title-parallax page-title-center page-title-dark include-header"
    style="background-image: linear-gradient(to top, rgba(254,150,3,0.5), #39384D), url('{{ $image_background }}'); background-size: cover; padding: 120px 0;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      {{-- <div class="badge rounded-pill border border-light text-light">{{ $page_title }}</div> --}}
      {{-- <h1>{{ $page_title }}</h1> --}}
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('frontend.cms.product') }}">{{ $page->name ?? '' }}</a></li>
      </ol>
      <h1>{{ $page_title }}</h1>
    </div>
  </section>

  <section id="content">

    <div class="content-wrap">
      <div class="container mb-3">

        <div class="row mb-5">
          <div class="col-12">

            @isset($taxonomys)
              @php
                $color = ['aqua', 'blue', 'amber', 'red'];
              @endphp
              @foreach ($taxonomys as $item)
                @php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
                  
                @endphp
                <a href="{{ $alias_category }}"
                  class="button button-border button-rounded button-fill button-{{ $color[$loop->index % 4] }} ms-0">
                  <span>{{ $title }}</span>
                </a>
              @endforeach
            @endisset
          </div>
        </div>

        <div class="row">
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
            <article class="portfolio-item col-12 col-sm-6 col-md-3 pf-media pf-icons text-center mb-5">
              <div class="grid-inner" style="box-shadow: 0 0 10px 0 rgb(0 0 0 / 30%); border-radius: 10px">
                <div class="portfolio-image" style="max-height: 350px; overflow: hidden; ">
                  <img src="{{ $image }}" alt="{{ $title }}" style="height: 100%">
                  <div class="bg-overlay">
                    <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="500">
                      <a href="{{ $alias }}" class="overlay-trigger-icon bg-light text-dark"
                        data-hover-animate="fadeIn" data-hover-speed="500"><i class="icon-line-ellipsis"></i></a>
                    </div>
                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="500"></div>
                  </div>
                </div>
                <div class="portfolio-desc">
                  <h3><a href="{{ $alias }}">{{ $title }}</a></h3>
                  <span>{{ $brief }}</span>
                </div>
              </div>
            </article>
          @endforeach

        </div>

        {{ $posts->withQueryString()->links('frontend.pagination.default') }}

        @if ($page_content != '')
          <div class="row mt-3">
            <div class="col-md-12">
              {!! $page_content ?? '' !!}
            </div>
          </div>
        @endif
      </div>
    </div>



  </section>
  {{-- End content --}}
@endsection
