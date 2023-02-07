<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    
    $items = [];
    $i = 0;
    foreach ($block_childs as $item) {
        $items[$i] = $item;
        $i++;
    }
    
  ?>

  <section class="gallery bg-main-pink py-5" id="gallery">
    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-6 col-md-12 col-sm-12 text-center">
          <div class="main-title">
            <span class="separator">
              <i class="flaticon-chakra"></i>
            </span>
            <h2 class="text-white"><?php echo $items[0]->title ?? ''; ?> </h2>
          </div>

          <?php echo $items[0]->content ?? ''; ?>

        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 text-center">
          <div class="main-title">
            <span class="separator">
              <i class="flaticon-chakra"></i>
            </span>
            <h2 class="text-white"><?php echo $items[1]->title ?? ''; ?> </h2>
          </div>
          <div class="row">
            <?php if($items[1]->sub > 0): ?>
              <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item_sub->parent_id == $items[1]->id): ?>
                  <?php
                    $title = $item_sub->json_params->title->{$locale} ?? $item_sub->title;
                    $brief = $item_sub->json_params->brief->{$locale} ?? $item_sub->brief;
                    $image = $item_sub->image != '' ? $item_sub->image : '';
                    
                    $icon = $item_sub->icon != '' ? $item_sub->icon : '';
                    $style = $item_sub->json_params->style ?? '';
                  ?>
                  <div class="col-lg-6 col-md-12 col-12 mb-3">
                    <img style="width: 100%" src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
                  </div>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php endif; ?>
<?php /**PATH D:\project\fhmvn\resources\views/frontend/blocks/cms_resource/styles/default.blade.php ENDPATH**/ ?>