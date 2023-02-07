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
  <div class="section bg-transparent m-0 caution-section">
    <div class="container">
      <div class="row align-items-end justify-content-between mb-5">
        <div class="col-lg-12 offset-lg-0">
          <div>
            <h3 class="fw-bolder h1 mb-4">
              {!! $title !!}
            </h3>
            <p class="mb-0 col-lg-8 offset-lg-4">
              {!! nl2br($brief) !!}
            </p>
          </div>
        </div>
      </div>

      <div class="row justify-content-center col-mb-50">

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
            <div class="col-lg-6 h-translatey-3 tf-ts">
              <a href="{{ $url_link_sub }}" class="portfolio-item">
                <div class="portfolio-image" style="border-radius: 5px; border: solid 1px #cdcdcd;">
                  <img src="{{ $image_sub }}" alt="{{ $title_sub }}" />
                  <div class="bg-overlay">
                    <div class="bg-overlay-content align-items-start justify-content-start flex-column px-5 py-4">
                      <h4 class="mb-3 mt-1">
                        {{ $title_sub }}
                      </h4>
                      <h5>
                        {{ $brief_sub }}
                      </h5>
                    </div>
                    <div class="bg-overlay-content align-items-start justify-content-end p-4">
                      <div class="overlay-trigger-icon bg-dark text-white animated fadeOutUpSmall"
                        data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                        data-hover-speed="350" style="animation-duration: 350ms">
                        <i class="icon-line-link"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>

@endif
