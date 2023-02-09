@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $first_child = $block_childs->first();
    if(count($block_childs) > 2) {
        $childs = $block_childs->chunk(2);
    }

  @endphp

    <div id="vision">
        <div class="container">
            <h4>{{ $title }}</h4>
            @if ($childs[0])
                @foreach ($childs[0] as $item)
                @php
                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                    $image_child = $item->image != '' ? $item->image : null;
                    $row = $item->id == $first_child->id ? '' : 'flex-row-reverse';
                @endphp

                <div class="row {{ $row }}">
                    <div class="col-lg-6 col-sm-12">
                        <div class="vision-content">
                            <h5>{{ $title_child }}</h5>
                            <p>
                                {{ $brief_child }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="vision-content-img">
                            <img
                            src="{{ $image_child }}"
                            alt="{{ $title_child }}"
                            />
                        </div>
                    </div>
                </div>

                @endforeach
            @endif

            <div class="row">
                @if ($childs[1])
                    @foreach ($childs[1] as $item)
                        @php
                            $title_child = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                            $sub = $item->sub;
                            $block_sub = $blocks->filter(function ($val, $key) use ($item) {
                                return $val->parent_id == $item->id;
                            });
                        @endphp

                        <div class="col-lg-6 col-sm-12 d-flex align-items-center">
                            <div class="vision-content">
                                <h5>{{ $title_child }}</h5>
                                <p>
                                    {{ $brief_child }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @if ($block_sub)
                                    @foreach ($block_sub as $item)
                                    @php
                                        $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                        $image_sub = $item->image != '' ? $item->image : null;
                                    @endphp

                                    <div class="swiper-slide">
                                        <div class="vision-content-img">
                                        <img
                                            src="{{ $image_sub }}"
                                            alt="{{ $title_sub }}"
                                        />
                                        </div>
                                    </div>

                                    @endforeach
                                @endif

                            </div>
                            <div class="swiper-pagination"></div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        </div>

                    @endforeach
                @endif
                
            </div>
        </div>
    </div>

@endif
