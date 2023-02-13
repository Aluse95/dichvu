@extends('frontend.layouts.default')

@php
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? null;
  $content = $detail->json_params->content->{$locale} ?? null;
  $image = $detail->image != '' ? $detail->image : null;
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
  $taxonomy_alias = Str::slug($taxonomy_title);
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $taxonomy_alias, $detail->taxonomy_id);
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
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

  <div id="banner">
    <div class="container">
      <h1>{{ $title }}</h1>
    </div>
  </div>

  <div id="template-detail">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-12">
          <div class="template-detail-img">
            <img src="{{ $image }}" alt="{{ $title }}" />
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" class="template-detail-button">
            <span>Mua ngay</span>
          </div>
          @if (isset($relatedPosts) && count($relatedPosts) > 0)
            <h4 class="template-detail-relate-title">@lang('Related Products')</h4>
            <div class="p-template-detail row">
              @foreach ($relatedPosts as $item)
                @php
                  $title_item = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  $date = date('d/m/Y', strtotime($item->created_at));
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                @endphp
                <div class="col-lg-6 col-sm-12 template-detail-item">
                  <div class="template-detail-item-img">
                    <img src="{{ $image }}" alt="{{ $title_item }}" />
                    <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
                  </div>
                  <a href="{{ $alias }}" class="template-detail-item-title">{{ $title_item }}</a>
                </div>
              @endforeach
            </div>
            <div class="m-template-detail row">
              @foreach ($relatedPosts as $item)
                @php
                  $title_item = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  $date = date('d/m/Y', strtotime($item->created_at));
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title_item, $item->id, 'detail', $item->taxonomy_title);
                @endphp
                <div class="col-lg-6 col-sm-12 template-detail-item">
                  <div class="template-detail-item-img">
                    <img src="{{ $image }}" alt="{{ $title_item }}" />
                    <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
                  </div>
                  <a href="{{ $alias }}" class="template-detail-item-title">{{ $title_item }}</a>
                </div>
              @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>

  {{-- Form order --}}
  <div class="modal fade bs-example-modal-lg" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-color">
          <h4 class="modal-title text-white mx-auto" id="myModalLabel">Đặt mua mẫu {{ $title }}</h4>
          <button type="button" class="btn-close btn-sm btn-light" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <div class="form-result"></div>
          <form class="row mb-0" id="form-booking" action="{{ route('frontend.order.store.service') }}" method="post">
            @csrf
            <div class="col-md-6 form-group mb-3">
              <label for="name">@lang('Fullname') *</label>
              <input type="text" id="name" name="name" class="form-control input-sm required" value=""
                required>
            </div>
            <div class="col-md-6 form-group mb-3">
              <label for="phone">@lang('phone') *</label>
              <input type="text" id="phone" name="phone" class="form-control input-sm required"
                value="" required>
            </div>
            <div class="col-12 form-group mb-3">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control input-sm" value="">
            </div>
            <div class="col-12 form-group mb-4">
              <label for="address">@lang('address')</label>
              <textarea type="text" id="address" name="address" class="form-control input-sm"></textarea>
            </div>
            <div class="col-12 form-group mb-4">
              <label for="customer_note">@lang('Content note')</label>
              <textarea type="text" id="customer_note" name="customer_note" class="form-control input-sm"></textarea>
            </div>

            <div class="col-12 form-group mb-0">
              <button class="button button-border button-rounded button-fill button-blue w-100 m-0 ls0 text-uppercase"
                type="submit" id="submit" name="submit" value="submit">
                <span>Gửi đăng ký</span>
              </button>
            </div>
            <input type="hidden" name="item_id" value="{{ $detail->id }}">
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- End content --}}
@endsection
