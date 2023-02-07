@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $icon = $block->icon ?? '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
      return $item->parent_id == $block->id;
    });
    $id = $block_childs->first()->id;
  @endphp

  <!-- START SERVICE -->
  <div id="service">
    <img src="{{ $image_background }}" alt="service-bg" />
    <h4><i class="{{ $icon }}"></i> {{ $title }}</h4>
    <div class="container g-0">
      <div class="service-container">
        <div class="service-tag-container">
          <div class="service-tag-item-smooth-container">
            <div class="service-tag-item-smooth-left"></div>
            <div class="service-tag-item-smooth-right"></div>
          </div>
          @if (isset($block_childs))
            @foreach ($block_childs as $item)
              @php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $active = $item->id == $id ? 'active' : '';
              @endphp
              
              <div class="service-tag-item {{ $active }}">
                <p>{{ $title_sub }}</p>
              </div>

            @endforeach
          @endif
        </div>
        <div class="service-card-container">
          @if (isset($block_childs))
            @foreach ($block_childs as $item)
              @php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
                $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              @endphp

              <div class="service-card-item">
                <div class="service-card-item-img">
                  <img src="{{ $image_sub }}" alt="{{ $title_sub }}"/>
                </div>
                <div class="service-card-item-content">
                  <h4>{{ $title_sub }}</h4>
                  <ul>
                    {!! $content_sub !!}
                  </ul>
                  <a href="{{ $url_link }}" class="button"
                    >{{ $url_link_title }} <i class="fa-solid fa-arrow-right"></i
                  ></a>
                </div>
              </div>

            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile Service -->
  <div id="m-service">
    <img src="{{ $image_background }}" alt="service-bg" />
    <h4>
      <i class="{{ $icon }}"></i> {{ $title }}
    </h4>
    <div class="container">
      <div class="service-container">
        <div class="service-tag-container">
          <div class="row">
            @if (isset($block_childs))

              @foreach ($block_childs as $item)
                @php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $active = $item->id == $id ? 'active' : '';
                  $col = $item->iorder == 3 ? 'col-12' : 'col-6'
                  
                @endphp
                
                <div class="{{ $col }} service-tag-item d-flex justify-content-center {{ $active }}">
                  <p>{{ $title_sub }}</p>
                </div>

              @endforeach
            @endif
          </div>
        </div>
        <div class="service-card-container">
          @if (isset($block_childs))
            @foreach ($block_childs as $item)
              @php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
                $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                $active = $item->id == $id ? 'active' : '';
              @endphp

              <div class="service-card-item {{ $active }}">
                <div class="service-card-item-img">
                  <img src="{{ $image_sub }}" alt="{{ $title_sub }}"/>
                </div>
                <div class="service-card-item-content">
                  <h4>{{ $title_sub }}</h4>
                  <ul>
                    {!! $content_sub !!}
                  </ul>
                  <a href="{{ $url_link }}" class="button"
                    >{{ $url_link_title }} <i class="fa-solid fa-arrow-right"></i
                  ></a>
                </div>
              </div>

            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile Service -->
  <!-- END SERVICE -->

@endif
