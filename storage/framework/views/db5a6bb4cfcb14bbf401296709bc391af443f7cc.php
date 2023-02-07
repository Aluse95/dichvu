
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

  <?php
    $routes = [];
    foreach (App\Consts::ROUTE_NAME as $item) {
        $routes[$item['name']] = $item['title'];
    
        $routes['show_route'][$item['name']] = isset($item['show_route']) && $item['show_route'] ? $item['show_route'] : false;
        $routes['has_alias'][$item['name']] = isset($item['has_alias']) && $item['has_alias'] ? $item['has_alias'] : false;
    }
  ?>

  <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($routes['show_route'][$page->route_name]) && $routes['show_route'][$page->route_name]): ?>
      <?php if($routes['has_alias'][$page->route_name]): ?>
        <url>
          <loc><?php echo e(route($page->route_name, ['alias' => $page->alias])); ?></loc>
          <lastmod><?php echo e($page->created_at->tz('UTC')->toAtomString()); ?></lastmod>
          <changefreq>weekly</changefreq>
          <priority>0.8</priority>
        </url>
      <?php else: ?>
        <url>
          <loc><?php echo e(route($page->route_name)); ?></loc>
          <lastmod><?php echo e($page->created_at->tz('UTC')->toAtomString()); ?></lastmod>
          <changefreq>weekly</changefreq>
          <priority>0.8</priority>
        </url>
      <?php endif; ?>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $url_mapping = App\Helpers::generateRoute($item->taxonomy, $item->title, $item->id);
    ?>
    <url>
      <loc><?php echo e($url_mapping); ?></loc>
      <lastmod><?php echo e($item->created_at->tz('UTC')->toAtomString()); ?></lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
    </url>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset(App\Consts::TAXONOMY[$post->is_type])): ?>
      <?php
        $url_mapping = App\Helpers::generateRoute(App\Consts::TAXONOMY[$post->is_type], $post->alias ?? $post->title, $post->id, 'detail', $post->taxonomy_title);
      ?>
      <url>
        <loc><?php echo e($url_mapping); ?></loc>
        <lastmod><?php echo e($post->created_at->tz('UTC')->toAtomString()); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
      </url>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</urlset>
<?php /**PATH /home/fhm/domains/f4web.vn/public_html/resources/views/frontend/sitemap/index.blade.php ENDPATH**/ ?>