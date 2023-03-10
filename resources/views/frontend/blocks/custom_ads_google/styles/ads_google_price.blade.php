@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp
  <style>
    #price .feature-box {
      height: 100%;
    }

    #price .fbox-content {
      flex: unset;
    }

    #price .feature-box .fbox-content:nth-of-type(4) {
      flex: 1;
    }

    #price .card {
      min-width: 100%;
    }

    #price .fbox-content h3 {
      font-size: 35px;
    }

    #price .fbox-content p {
      color: #000;
    }

    .icon-star3 {
      color: #3293ce;
      margin: 0 2px;
      font-size: 25px;
      display: flex;
      align-items: flex-end;
    }

    .price-money p span {
      font-size: 25px;
      font-weight: bold;
      color: #3293ce;
    }

    .fbox-content li {
      list-style: none;
    }

    .fbox-content li i {
      color: #3293ce;
      margin-top: 2px;
    }

    #price .button {
      background-color: #3293ce;
    }
  </style>
  <div class="section my-0">
    <div class="container" id="price">
      <div class="heading-block border-bottom-0 center mx-auto">
        <h3 class="nott ls0 mb-3">
          {{ $title }}
        </h3>
        <p>
          {{ $brief }}
        </p>
      </div>

      <div class="row col-mb-30 align-content-stretch">
        <div class="col-lg-4 col-md-6 d-flex">
          <div class="card h-shadow h-translate-y-sm all-ts">
            <div class="card-body p-4">
              <div class="feature-box flex-column">
                <div class="d-flex justify-content-center">
                  <i class="icon-star3"></i>
                </div>
                <div class="fbox-content my-3">
                  <h3 class="ls0 text-center border-bottom pb-2 text-uppercase">
                    C?? b???n
                  </h3>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center align-items-center price-money mb-4">
                  <p>D?????i <span>30.000.000</span> VN??</p>
                  <p>Ph?? d???ch v???: <span>150.000</span> VN??/ng??y</p>
                </div>
                <div
                  class="fbox-content d-flex flex-column justify-content-start align-items-center mx-3 pt-4 border-top">
                  <ul>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">??o l?????ng, t???i t??u chi ph??</p>
                    </li>

                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Cam k???t KPIs b???ng ch??? s???</p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">L??n k??? ho???ch ch???y qu???ng c??o</p>
                    </li>
                  </ul>
                </div>

                <a href="tel:{{ $web_information->information->phone ?? '' }}"
                  class="button button-rounded button-fill button-primary button-large ls0 text-uppercase text-center">
                  <span class="text-uppercase">li??n h??? ngay</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex">
          <div class="card h-shadow h-translate-y-sm all-ts">
            <div class="card-body p-4">
              <div class="feature-box flex-column">
                <div class="d-flex justify-content-center">
                  <i class="icon-star3" style="font-size: 23px"></i>
                  <i class="icon-star3"></i>
                  <i class="icon-star3" style="font-size: 23px"></i>
                </div>
                <div class="fbox-content my-3">
                  <h3 class="ls0 text-center border-bottom pb-2 text-uppercase">
                    ti??u chu???n
                  </h3>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center align-items-center price-money mb-4">
                  <p>D?????i <span>80.000.000</span> VN??</p>
                  <p>Ph?? d???ch v???: <span>14%</span> ng??n s??ch</p>
                </div>
                <div
                  class="fbox-content d-flex flex-column justify-content-start align-items-center mx-3 pt-4 border-top">
                  <ul>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">??o l?????ng, t???i t??u chi ph??</p>
                    </li>

                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Cam k???t KPIs b???ng ch??? s???</p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">L??n k??? ho???ch ch???y qu???ng c??o</p>
                    </li>

                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Mi???n ph?? h??? tr??? 5 n???i dung Ads</p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        T???ng Landing Page chu???n ng??nh h??ng
                      </p>
                    </li>
                  </ul>
                </div>

                <a href="tel:{{ $web_information->information->phone ?? '' }}"
                  class="button button-rounded button-fill button-primary button-large ls0 text-uppercase text-center">
                  <span class="text-uppercase">li??n h??? ngay</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex">
          <div class="card h-shadow h-translate-y-sm all-ts">
            <div class="card-body p-4">
              <div class="feature-box flex-column">
                <div class="d-flex justify-content-center">
                  <i class="icon-star3" style="font-size: 18px"></i>
                  <i class="icon-star3" style="font-size: 23px"></i>
                  <i class="icon-star3" style="font-size: 25px"></i>
                  <i class="icon-star3" style="font-size: 23px"></i>
                  <i class="icon-star3" style="font-size: 18px"></i>
                </div>
                <div class="fbox-content my-3">
                  <h3 class="ls0 text-center border-bottom pb-2 text-uppercase">
                    cao c???p
                  </h3>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center align-items-center price-money mb-4">
                  <p>Tr??n <span>150.000.000</span> VN??</p>
                  <p>Ph?? d???ch v???: <span>10%</span> ng??n s??ch</p>
                </div>
                <div
                  class="fbox-content d-flex flex-column justify-content-start align-items-center mx-3 pt-4 border-top">
                  <ul>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">??o l?????ng, t???i ??u chi ph??</p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        Mi???n ph?? thi???t k??? h??nh ???nh & video
                      </p>
                    </li>

                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        Cam k???t KPIs b???ng ch??? s??? ph?? h???p
                      </p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        T???ng g??i x??y d???ng Ads kh??ng gi???i h???n
                      </p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        T???ng Landing Page chu???n ng??nh h??ng
                      </p>
                    </li>
                  </ul>
                </div>

                <a href="tel:{{ $web_information->information->phone ?? '' }}"
                  class="button button-rounded button-fill button-primary button-large ls0 text-uppercase text-center">
                  <span class="text-uppercase">li??n h??? ngay</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- <div class="row col-mb-30 align-content-stretch">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              
              $url_link_sub = $item->url_link != '' ? $item->url_link : '';
              $url_link_title_sub = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              
            @endphp
            <div class="col-lg-4 col-md-6 d-flex">
              <div class="card h-shadow h-translate-y-sm all-ts">
                <div class="card-body p-5">
                  <div class="feature-box flex-column">
                    <div class="fbox-content mb-5">
                      <h3 class="nott ls0 text-larger text-center">
                        {{ $title_sub }}
                      </h3>
                    </div>

                    <div class="fbox-image text-center mb-5">
                      <img height="auto" src="{{ $image_sub }}" alt="{{ $title_sub }}" />
                    </div>
                    @if ($url_link_sub != '')
                      <a href="{{$url_link_sub}}"
                        class="button button-border button-rounded button-fill button-blue button-large ls0 text-uppercase m-0 text-center">
                        <span>{{$url_link_title_sub}}</span>
                      </a>
                    @endif

                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div> --}}
    </div>

  </div>
@endif
