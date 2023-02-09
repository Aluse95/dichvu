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
        $childs = $block_childs->chunk(1)
    @endphp

    <div id="people">
        <div class="container">
            <h4>{{ $title }}</h4>
            <p>
                {{ $brief }}
            </p>
            
            <div class="people-leader">
                @if ($childs[0])
                    @foreach ($childs[0] as $item)
                    @php
                        $title_child = $item->json_params->title->{$locale} ?? $item->title;
                        $sub = $item->sub;
                        $block_sub = $blocks->filter(function ($val, $key) use ($item) {
                            return $val->parent_id == $item->id;
                        });
                    @endphp
                    <div class="badge">
                        <p>{{ $title_child }}</p>
                    </div>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @if ($block_sub)
                                @foreach ($block_sub as $item)
                                @php
                                    $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $image_sub = $item->image != '' ? $item->image : null;
                                @endphp

                                <div class="swiper-slide">
                                    <div class="people-leader-img">
                                        <img src="{{ $image_sub }}" alt="{{ $brief_sub }}" />
                                        <div class="people-leader-img-text">
                                        <p class="name">{{ $title_sub }}</p>
                                        <p class="duty">-{{ $brief_sub }}-</p>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                    @endforeach
                @endif
                
            </div>
            <div class="people-employee">
                @if ($childs[1])
                    @foreach ($childs[1] as $item)
                    @php
                        $title_child_2 = $item->json_params->title->{$locale} ?? $item->title;
                        $sub = $item->sub;
                        $block_sub_2 = $blocks->filter(function ($val, $key) use ($item) {
                            return $val->parent_id == $item->id;
                        });

                    @endphp

                    <div class="badge">
                        <h5>{{ $title_child_2 }}</h5>
                    </div>
                    <div class="row">
                        @if ($block_sub_2)
                            @foreach ($block_sub_2 as $item)
                            @php
                                $title_sub_2 = $item->json_params->brief->{$locale} ?? $item->brief;
                                $image_sub_2 = $item->image != '' ? $item->image : null;
                            @endphp

                            <div class="col-lg-3 col-sm-6">
                                <div class="people-employee-img">
                                <img src="{{ $image_sub_2 }}" alt="{{ $title_child_2 }}" />
                                </div>
                            </div>

                            @endforeach
                        @endif
                    </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

@endif
