@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $index = 1;
    $id = $block_childs->first()->id;
  @endphp

  <div id="faq">
    <div class="container">
      <h4><i class="{{ $icon }}"></i> {{ $title }}</h4>
      <div class="row">
        <div class="col-lg-5 col-sm-12">
          <div class="faq-img">
            <img src="{{ $image }}" alt="{{ $title }}" />
          </div>
        </div>
        <div class="col-lg-7 col-sm-12">
          <div class="faq-content-container">
            @if ($block_childs)
              @foreach ($block_childs as $item)
                @php
                  $title_child = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_child = $item->json_params->content->{$locale} ?? $item->content;
                  $image_child = $item->image != '' ? $item->image : null;
                  $url_link = $item->url_link != '' ? $item->url_link : '';
                  $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                  $icon = $item->icon != '' ? $item->icon : '';
                  $style = $item->json_params->style ?? '';
                  $active = $item->id == $id ? 'active' : '';
                @endphp
                
                <div class="faq-content-item {{ $active }}">
                  <div class="faq-question">
                    <p>
                      {!! $index++ . '. ' . $brief_child !!}
                    </p>
                    <i class="fa-solid fa-plus"></i>
                  </div>
    
                  <p class="faq-answer">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reiciendis nobis hic repellat minima doloremque, quidem
                    labore? Aperiam et corporis minima!
                  </p>
                </div>

              @endforeach
            @endif
            
          </div>
        </div>
      </div>
    </div>
  </div>

@endif
