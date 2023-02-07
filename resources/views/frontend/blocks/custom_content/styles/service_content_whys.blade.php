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
  <style>
    .reason-container {
      background-image: none;/*url('{{ $image_background }}');*/
      background-position: bottom;
      background-size: cover;
      padding: 0 8vw;
      height: auto;
      position: relative;
      z-index: 1;
      margin-top: 5vw;
    }

    .reason-container p i {
      font-size: 1.5vw;
      margin-top: 0;
      margin-bottom: 0;
      margin-right: 5px;
    }

    .reason-image-container {
      display: flex;
      justify-content: center;
    }

    .reason-image {
      width: 70%;
    }

    .separate-image-container {
      margin-bottom: 0;
      margin-top: -27vw !important;
      position: relative;
      z-index: 0;
    }
  </style>
  <div class="container-fluid reason-container">
    <div class="heading-block border-bottom-0 center">
      <h2 class="nott ls0 mb-3">
        {{ $title }}
      </h2>
      <p class="reason-description">
        {!! nl2br($brief) !!}
      </p>
    </div>
    <div class="clear"></div>
    <div class="container">
      <div class="row align-items-end content-row">
        <div class="col-lg-6">
          @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
            @endphp
            <p>
              {!!$icon_sub!!}
              {{ $title_sub }}
            </p>
          @endforeach
      @endif
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0 reason-image-container d-none d-md-block">
          <img class="reason-image" src="{{$image}}" alt="{{ $title }}" />
        </div>
      </div>
    </div>

  </div>
  <div class="section lazy mt-5 p-0 min-vh-75 entered lazy-loaded separate-image-container d-none"
    data-bg="https://images.unsplash.com/photo-1566228015668-4c45dbc4e2f5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80"
    style=" background-position: center center; background-repeat: no-repeat; background-size: cover; background-color: #fe9603;"
    data-ll-status="loaded">
    <div class="shape-divider" data-shape="rounded-4" data-height="150" id="shape-divider-487">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 140" preserveAspectRatio="none" class="op-ts op-1">
        <path class="shape-divider-fill" d="M0 0s573.08 140 1280 140V0z"></path>
      </svg>
    </div>
    <div class="shape-divider" data-shape="wave-2" data-position="bottom" data-height="150" id="shape-divider-8155">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 140" preserveAspectRatio="none" class="op-ts op-1">
        <path class="shape-divider-fill" d="M0 0s573.08 140 1280 140V0z"></path>
      </svg>
    </div>
  </div>
@endif
