<footer id="footer" class="dark" style="background-color: #0B50A1;">
  <div class="container">

    <!-- Footer Widgets
    ============================================= -->
    <div class="footer-widgets-wrap">

      <div class="row col-mb-50">

        <div class="col-md-6 col-lg-4">

          <div class="widget clearfix">

            <img src="<?php echo e($web_information->image->logo_footer ?? ''); ?>"
              alt="<?php echo e($web_information->information->site_name ?? ''); ?>" class="footer-logo" width="400"
              height="300" style="border: 1px solid #fff; border-radius: 10px;">
            
          </div>

        </div>
        <div class="col-md-6 col-lg-8">
          <div class="row">
            <div class="col-md-6 col-lg-5">

              <div class="widget clearfix">
                <p class="text-white text-uppercase text-bold ">Thông tin liên hệ</p>

                <div class="text-white">
                  <address>
                    <strong><?php echo app('translator')->get('address'); ?>:</strong><br>
                    <?php echo e($web_information->information->address ?? ''); ?><br>
                  </address>
                  <abbr title="Phone Number"><strong><?php echo app('translator')->get('phone'); ?>:</strong></abbr>
                  <?php echo e($web_information->information->phone ?? ''); ?><br>
                  <abbr title="Email Address"><strong>Email:</strong></abbr>
                  <?php echo e($web_information->information->email ?? ''); ?>

                </div>
                <a href="//www.dmca.com/Protection/Status.aspx?ID=1785f4d4-d14d-473c-8816-1761c5fd8db3" target="_blank"
                  title="DMCA.com Protection Status" class="dmca-badge"> <img
                    src="https://images.dmca.com/Badges/dmca_protected_sml_120m.png?ID=1785f4d4-d14d-473c-8816-1761c5fd8db3"
                    alt="DMCA.com Protection Status" /></a>
                <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
              </div>
            </div>
            <div class="col-md-6 col-lg-7">
              <div class="row">
                <?php if(isset($menu)): ?>
                  <?php
                    $footer_menu = $menu->filter(function ($item, $key) {
                        return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                    });
                    
                    $content = '';
                    foreach ($footer_menu as $main_menu) {
                        $url = $title = '';
                        $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                        $content .= '<div class="col-md-6 col-lg-6"><div class="widget widget_links clearfix">';
                        $content .= '<p class="text-white text-uppercase text-bold ">' . $title . '</p>';
                        $content .= '<ul>';
                        foreach ($menu as $item) {
                            if ($item->parent_id == $main_menu->id) {
                                $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                $url = $item->url_link;
                    
                                $active = $url == url()->current() ? 'active' : '';
                    
                                $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                                $content .= '</li>';
                            }
                        }
                        $content .= '</ul>';
                        $content .= '</div></div>';
                    }
                    echo $content;
                  ?>
                <?php endif; ?>
              </div>

            </div>

          </div>
        </div>


      </div>

    </div>

  </div>

</footer>
<?php /**PATH /home/fhm/domains/f4web.vn/public_html/resources/views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>