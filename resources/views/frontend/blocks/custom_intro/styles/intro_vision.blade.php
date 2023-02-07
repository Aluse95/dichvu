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

    <div id="vision">
        <div class="container">
        <div class="vision-content">
            <h4>Tầm nhìn</h4>
            <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas,
            a?
            </p>
        </div>
        <div class="vision-content">
            <h4>Sứ mệnh</h4>
            <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Repellendus perspiciatis eos quas maiores aut, ut blanditiis ad
            ex nam rem!
            </p>
        </div>
        <div class="vision-content">
            <h4>Giá trị cốt lõi</h4>
            <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Recusandae nostrum velit iure veniam odio? Amet deserunt omnis
            laboriosam facilis a officiis quae asperiores id reiciendis
            ratione. Perspiciatis sed expedita ducimus.
            </p>
        </div>
        <div class="vision-content-img">
            <img
            src="{{ $image }}"
            alt="{{ $title }}"
            />
        </div>
        </div>
    </div>

@endif
