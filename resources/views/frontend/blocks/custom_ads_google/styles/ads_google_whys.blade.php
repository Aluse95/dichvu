@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp
  <div class="section bg-transparent mb-0">
    <div class="container">
      <div class="row align-items-start flex-row-reverse">

        <div class="col-lg-6">
          <h2 class="fw-bold">
            {{ $title }}
          </h2>
          <img src="{{ $image }}" alt="{{ $title }}" />
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <p>
            {!! nl2br($brief) !!}
          </p>
        </div>

      </div>
    </div>
  </div>
@endif
