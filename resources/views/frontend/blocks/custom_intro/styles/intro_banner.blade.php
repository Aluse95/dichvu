@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $image = $block->image != '' ? $block->image : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    
  @endphp

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

  <!-- START BANNE  -->
  <div id="banner">
    <div class="container">
      <h1>{!! $brief !!}</h1>
      <div class="btn-container">
        <a href="/lien-he" class="btn-item">Đăng kí tư vấn</a>
        <a href="{{ $url_link }}" class="btn-item">{{ $url_link_title }}</a>
      </div>
    </div>
    <div class="container-fluid">
      <div class="swiper banner-p">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          @if ($block_childs)
            @foreach ($block_childs as $item)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image != '' ? $item->image : null;
                $image_background = $item->image_background != '' ? $item->image_background : null;

              @endphp

              <!-- Slides -->
              <div class="swiper-slide">
                <img src="{{ $image }}" alt="FHM Image" />
              </div>
            @endforeach
          @endif
        </div>
      </div>
      <div class="swiper banner-m">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          @if ($block_childs)
            @foreach ($block_childs as $item)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image != '' ? $item->image : null;
                $image_background = $item->image_background != '' ? $item->image_background : null;

              @endphp

              <!-- Slides -->
              <div class="swiper-slide">
                <img src="{{ $image }}" alt="FHM Image" />
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- END BANNER  -->

@endif
