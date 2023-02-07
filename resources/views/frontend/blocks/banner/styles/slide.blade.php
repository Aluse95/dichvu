@if ($block)
  @php
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <section class="home" id="banner">
    <div class="owl-carousel owl-theme">

      @if ($block_childs)
        @foreach ($block_childs as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image != '' ? $item->image : null;
            $image_background = $item->image_background != '' ? $item->image_background : null;
            $video = $item->json_params->video ?? null;
            $video_background = $item->json_params->video_background ?? null;
            $url_link = $item->url_link != '' ? $item->url_link : '';
            $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
            $icon = $item->icon != '' ? $item->icon : '';
            $style = isset($item->json_params->style) && $item->json_params->style == 'slider-caption-right' ? 'd-none' : '';
            
            $image_for_screen = null;
            if ($agent->isDesktop() && $image_background != null) {
                $image_for_screen = $image_background;
            } else {
                $image_for_screen = $image;
            }
            
          @endphp

          <div class="owl-item bg-cover" style="background-image: url({{ $image_for_screen ?? '' }})">
            <div class="overlay">
              <div class="container">
                <div class="display-table">
                  <div class="home-content display-table-cell">

                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </section>
@endif
