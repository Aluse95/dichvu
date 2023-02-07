<?php if($block): ?>
  <?php
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
  ?>
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
          <?php echo e($title); ?>

        </h3>
        <p>
          <?php echo e($brief); ?>

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
                    Cơ bản
                  </h3>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center align-items-center price-money mb-4">
                  <p>Dưới <span>30.000.000</span> VNĐ</p>
                  <p>Phí dịch vụ: <span>150.000</span> VNĐ/ngày</p>
                </div>
                <div
                  class="fbox-content d-flex flex-column justify-content-start align-items-center mx-3 pt-4 border-top">
                  <ul>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Đo lường, tối tưu chi phí</p>
                    </li>

                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Cam kết KPIs bằng chỉ số</p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Lên kế hoạch chạy quảng cáo</p>
                    </li>
                  </ul>
                </div>

                <a href="tel:<?php echo e($web_information->information->phone ?? ''); ?>"
                  class="button button-rounded button-fill button-primary button-large ls0 text-uppercase text-center">
                  <span class="text-uppercase">liên hệ ngay</span>
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
                    tiêu chuẩn
                  </h3>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center align-items-center price-money mb-4">
                  <p>Dưới <span>80.000.000</span> VNĐ</p>
                  <p>Phí dịch vụ: <span>14%</span> ngân sách</p>
                </div>
                <div
                  class="fbox-content d-flex flex-column justify-content-start align-items-center mx-3 pt-4 border-top">
                  <ul>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Đo lường, tối tưu chi phí</p>
                    </li>

                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Cam kết KPIs bằng chỉ số</p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Lên kế hoạch chạy quảng cáo</p>
                    </li>

                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Miễn phí hỗ trợ 5 nội dung Ads</p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        Tặng Landing Page chuẩn ngành hàng
                      </p>
                    </li>
                  </ul>
                </div>

                <a href="tel:<?php echo e($web_information->information->phone ?? ''); ?>"
                  class="button button-rounded button-fill button-primary button-large ls0 text-uppercase text-center">
                  <span class="text-uppercase">liên hệ ngay</span>
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
                    cao cấp
                  </h3>
                </div>
                <div class="fbox-content d-flex flex-column justify-content-center align-items-center price-money mb-4">
                  <p>Trên <span>150.000.000</span> VNĐ</p>
                  <p>Phí dịch vụ: <span>10%</span> ngân sách</p>
                </div>
                <div
                  class="fbox-content d-flex flex-column justify-content-start align-items-center mx-3 pt-4 border-top">
                  <ul>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">Đo lường, tối ưu chi phí</p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        Miễn phí thiết kế hình ảnh & video
                      </p>
                    </li>

                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        Cam kết KPIs bằng chỉ số phù hợp
                      </p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        Tặng gói xây dựng Ads không giới hạn
                      </p>
                    </li>
                    <li class="d-flex">
                      <i class="icon-check me-2"></i>
                      <p class="mt-0">
                        Tặng Landing Page chuẩn ngành hàng
                      </p>
                    </li>
                  </ul>
                </div>

                <a href="tel:<?php echo e($web_information->information->phone ?? ''); ?>"
                  class="button button-rounded button-fill button-primary button-large ls0 text-uppercase text-center">
                  <span class="text-uppercase">liên hệ ngay</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>

  </div>
<?php endif; ?>
<?php /**PATH /home/fhm/domains/fhmvietnam.vn/public_html/resources/views/frontend/blocks/custom_ads_google/styles/ads_google_price.blade.php ENDPATH**/ ?>