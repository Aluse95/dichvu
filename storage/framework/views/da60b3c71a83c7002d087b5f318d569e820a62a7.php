<div class="col-lg-3 col-sm-12">
  <?php
    $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['post'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
  ?>
  <?php if(isset($taxonomys)): ?>
    <div class="blog-category-list">
      <p class="title"><?php echo app('translator')->get('Post category'); ?></p>
      <ul>
        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id);
              
              $url_current = url()->full();
              $current = $alias_category == $url_current ? 'current-nav-item' : '';
            ?>

            <li>
              <a href="<?php echo e($alias_category); ?>">
                <i class="fa-solid fa-angle-right"></i>
                <?php echo e(Str::limit($title, 100)); ?>

              </a>
            </li>
            
            <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($sub->parent_id == $item->id): ?>
                <?php
                  $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
                  
                  $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $item->title, $sub->id, null, $sub->alias ?? $title_sub);
                  
                  $current = $alias_category_sub == $url_current ? 'current-nav-item' : '';
                ?>
                <li>
                  <a href="<?php echo e($alias_category_sub); ?>" title="<?php echo e($title_sub); ?>" class="pl-3">
                    - - <?php echo e(Str::limit($title_sub, 100)); ?>

                  </a>
                </li>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
      </ul>
    </div>
  <?php endif; ?>

  <?php
    $params_product['status'] = App\Consts::POST_STATUS['active'];
    $params_product['is_type'] = App\Consts::POST_TYPE['post'];
    $params_product['order_by'] = 'id';
    
    $recents = App\Http\Services\ContentService::getCmsPost($params_product)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  ?>
  <?php if(isset($recents)): ?>
    <div class="blog-category-suggest">
      <p class="title"><?php echo app('translator')->get('Latest post'); ?></p>
      <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          $date = date('H:i d/m/Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
        ?>

        <div class="blog-category-suggest-post">
          <a href="<?php echo e($alias); ?>">
            <div class="blog-category-suggest-post-img">
              <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"/>
            </div>
            <p class="title"><?php echo e(Str::limit($title, 50)); ?></p>
          </a>
        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

  <?php endif; ?>

  <?php
    $params_product['status'] = App\Consts::POST_STATUS['active'];
    $params_product['is_type'] = App\Consts::POST_TYPE['post'];
    $params_product['order_by'] = 'count_visited';
    
    $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
  ?>
  <?php if(isset($mostViews)): ?>

    <div class="blog-category-suggest">
      <p class="title"><?php echo app('translator')->get('Most viewed post'); ?></p>
      <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          $date = date('H:i d/m/Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
        ?>

        <div class="blog-category-suggest-post">
          <a href="<?php echo e($alias); ?>">
            <div class="blog-category-suggest-post-img">
              <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"/>
            </div>
            <p class="title"><?php echo e(Str::limit($title, 50)); ?></p>
          </a>
        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

  <?php endif; ?>

</div>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/components/sidebar/post.blade.php ENDPATH**/ ?>