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
$alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);

$seo_title = $detail->json_params->seo_title ?? $title;
$seo_keyword = $detail->json_params->seo_keyword ?? null;
$seo_description = $detail->json_params->seo_description ?? $brief;
$seo_image = $image ?? ($image_thumb ?? null);

@endphp

@push('style')
  <style>
    #content-detail {
      font-family: 'Asap', sans-serif;
      text-align: justify;
    }

    #content-detail h2 {
      font-size: 30px;
    }

    #content-detail h3 {
      font-size: 24px;
    }

    #content-detail h4 {
      font-size: 18px;
    }

    #content-detail h5,
    #content-detail h6 {
      font-size: 16px;
    }

    #content-detail p {
      margin-top: 0;
      margin-bottom: 0;
    }

    #content-detail h1,
    #content-detail h2,
    #content-detail h3,
    #content-detail h4,
    #content-detail h5,
    #content-detail h6 {
      margin-top: 0;
      margin-bottom: .5rem;
    }

    #content-detail p+h2,
    #content-detail p+.h2 {
      margin-top: 1rem;
    }

    #content-detail h2+p,
    #content-detail .h2+p {
      margin-top: 1rem;
    }

    #content-detail p+h3,
    #content-detail p+.h3 {
      margin-top: 0.5rem;
    }

    #content-detail h3+p,
    #content-detail .h3+p {
      margin-top: 0.5rem;
    }

    #content-detail ul,
    #content-detail ol {
      list-style: inherit;
      padding: 0 0 0 50px;

    }

    #content-detail ul li,
    #content-detail ol li {
      display: list-item;
      list-style: initial;
    }

    .posts-sm .entry-image {
      width: 75px;
    }

    img {
      max-width: 100%;
      width: auto !important;
    }
  </style>
@endpush

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}

  <section class="page-title" id="page-title" style="background: url('{{ $image_background }}') center center no-repeat;">
    <div class="container">
      <div class="content">
        <h2 class="text-uppercase">{{ $title }}</h2>
      </div>
    </div>
  </section>

  <section class="blog bg-light" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-single">
            <div class="post">
              <!-- Post Content -->
              <div class="post-content">
                <div class="post-text px-5 text-justify" id="content-detail">
                  {!! $content ?? '' !!}
                </div>

              </div>

              <div class="contact p-5">
                <h3 class="mb-3">ĐĂNG KÝ TƯ VẤN KHÓA HỌC</h3>
                <form class="contact-form " method="post" action="{{ route('frontend.order.store.service') }}" id="form-booking">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" required value=""
                      autocomplete="off" onkeyup="this.setAttribute('value', this.value);" />
                    <label for="name">@lang('Fullname') *</label>
                    <span class="input-border"></span>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" value=""
                      autocomplete="off" onkeyup="this.setAttribute('value', this.value);" />
                    <label for="email">Email</label>
                    <span class="input-border"></span>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" required value=""
                      autocomplete="off" onkeyup="this.setAttribute('value', this.value);" />
                    <label for="subject">@lang('Phone') *</label>
                    <span class="input-border"></span>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" id="customer_note" name="customer_note" required data-value="" autocomplete="off"
                      onkeyup="this.setAttribute('data-value', this.value);"></textarea>
                    <label for="message">@lang('Content') *</label>
                    <span class="input-border"></span>
                  </div>
                  <!-- Button Send Message  -->
                  <input type="hidden" name="item_id" value="{{ $detail->id }}">
                  <button class="contact-btn main-btn" type="submit" name="send">
                    <span>@lang('Submit booking')</span>
                  </button>
                  <!-- Form Message  -->
                  <div class="form-message text-center"><span></span></div>
                </form>
              </div>

            </div>
          </div>



        </div>


      </div>
    </div>
  </section>

  {{-- End content --}}
@endsection
