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
  <div class="section mt-0 pt-0 bg-transparent">
    <div class="container">
      <div class="heading-block border-bottom-0 center">
        <h3 class="nott ls0">
          {!! $title !!}
        </h3>
      </div>
      <div class="row col-mb-30 align-content-stretch justify-content-center">
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
            <div class="col-lg-6 col-md-6 d-flex">
              <div class="card">
                <div class="card-body p-5">
                  <div class="feature-box flex-column fbox-center">
                    <div class="fbox-icon mb-3 ">
                      <a href="{{ $url_link_sub }}">
                        <img src="{{ $image_sub }}" alt="{{ $title_sub }}" class="bg-transparent rounded-0" />
                      </a>
                    </div>
                    <div class="fbox-content">
                      <a href="{{ $url_link_sub }}">
                        <h3 class="nott ls0 text-larger">
                          {{ $title_sub }}
                        </h3>
                      </a>
                      <p class="text-smaller">
                        {{ $brief_sub }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>

@endif
