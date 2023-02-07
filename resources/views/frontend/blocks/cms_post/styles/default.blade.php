@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(3)
        ->get();
  @endphp
  <div class="container py-4" id="blog">
    <div class="heading-block border-bottom-0 center">
      <div class="badge rounded-pill badge-default">{!! $title !!}</div>
      <h2 class="nott ls0">{!! $brief !!}</h2>
    </div>

    <div class="row mt-5 clearfix">
      @foreach ($rows as $item)
        @php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          // $date = date('H:i d/m/Y', strtotime($item->created_at));
          $date = date('d', strtotime($item->created_at));
          $month = date('M', strtotime($item->created_at));
          $year = date('Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
        @endphp
        <div class="col-md-4">
          <article class="entry">
            <div class="entry-image mb-3">
              <a href="{{ $alias }}"><img src="{{ $image }}" alt="{{ $title }}" width="400" height="400"></a>
              <div class="bg-overlay">
                <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="500">
                  <a href="{{ $alias }}" class="overlay-trigger-icon bg-light text-dark"
                    data-hover-animate="fadeIn" data-hover-speed="500" title="{{ $title }}"><i class="icon-line-ellipsis"></i></a>
                </div>
                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="500"></div>
              </div>
            </div>
            <div class="entry-title">
              <h4><a href="{{ $alias }}">{{ $title }}</a></h4>
            </div>
            <div class="entry-meta">
              <ul>
                <li><i class="icon-line2-folder"></i><a href="{{ $alias_category }}"> {{ $item->taxonomy_title }}</a>
                </li>
                <li><i class="icon-calendar-times1"></i> {{ $date }} {{ $month }} {{ $year }}
                </li>
              </ul>
            </div>
            <div class="entry-content clearfix">
              <p>{{ Str::limit($brief, 100) }}</p>
            </div>
          </article>
        </div>
      @endforeach
    </div>
  </div>
@endif