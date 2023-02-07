@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <div class="container">

    <div class="heading-block border-bottom-0 center mx-auto">
      <h2 class="nott ls0 mb-3">{{ $title }}</h2>
    </div>

    <div id="portfolio" class="portfolio row grid-container gutter-30" data-layout="fitRows">
      <div class="col-sm-12 col-lg-6 col-md-12">
        <div class="heading-block border-bottom-0 center mx-auto">
          <p class="text-justify">
            {!! nl2br($brief) !!}
          </p>
        </div>

        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              
              $url_link_sub = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
              $url_link_title_sub = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              
            @endphp
            @if ($loop->index < 2)
              <article class="service-item-container portfolio-item col-sm-12 col-12 pf-media pf-icons">
                <div class="grid-inner">
                  <div class="portfolio-image">
                    <a href="{{ $url_link_sub }}">
                      <img src="{{ $image_sub }}" alt="Open Imagination" />
                    </a>
                    <div class="bg-overlay">
                      <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                        <a href="{{ $url_link_sub }}" class="overlay-trigger-icon bg-light text-dark"
                          data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                          data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                      </div>
                      <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                  </div>
                  <div class="portfolio-desc">
                    <h3>
                      <a href="{{ $url_link_sub }}">{{ $title_sub }}</a>
                    </h3>
                    <span>{{ $brief_sub }}</span>
                  </div>
                </div>
              </article>
            @endif
          @endforeach
        @endif
      </div>
      <div class="col-sm-12 col-lg-6 col-md-12">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              
              $url_link_sub = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
              $url_link_title_sub = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              
            @endphp
            @if ($loop->index > 1)
              <article class="service-item-container portfolio-item col-sm-12 col-12 pf-media pf-icons">
                <div class="grid-inner">
                  <div class="portfolio-image">
                    <a href="{{ $url_link_sub }}">
                      <img src="{{ $image_sub }}" alt="Open Imagination" />
                    </a>
                    <div class="bg-overlay">
                      <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                        <a href="{{ $url_link_sub }}" class="overlay-trigger-icon bg-light text-dark"
                          data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                          data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                      </div>
                      <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                  </div>
                  <div class="portfolio-desc">
                    <h3>
                      <a href="{{ $url_link_sub }}">{{ $title_sub }}</a>
                    </h3>
                    <span>{{ $brief_sub }}</span>
                  </div>
                </div>
              </article>
            @endif
          @endforeach
        @endif
      </div>
    </div>
  </div>

@endif
