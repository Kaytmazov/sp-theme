<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sp-theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-3">
  <!-- Глава -->
  <section class="mb-4">
    <div class="card">
      <div class="card-header">Глава администрации</div>
      <img class="card-img-top" src="/wp-content/uploads/2018/02/glava.jpg" alt="Card image cap">
      <div class="card-body">
        <h6 class="card-title">Магомедов Магомед Алиевич</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
  </section>

  <!-- Важная информация -->
  <section>
    <div class="important-info card text-white bg-danger mb-3">
      <div class="card-header">Важная информация</div>
      <div class="list-group">
        <?php
        $category_id = get_cat_ID( 'Важная информация' );
        $args = array(
          'cat' => $category_id,
          'posts_per_page' => 2,
        );

        $important_info = new WP_Query($args);
        if ($important_info->have_posts()) :
          while($important_info->have_posts()) : $important_info->the_post();?>
            <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
              <h6 class="important-info-title text-danger"><?php the_title(); ?></h6>
              <p class="mb-1 small"><?php the_excerpt(); ?></p>
              <div class="list-entry-meta">
                <span class="badge badge-secondary"><?php echo get_the_date(); ?></span>
              </div>
            </a>
          <?php endwhile;
          wp_reset_postdata();?>
        <?php endif;?>
        <a href="<?php echo get_category_link( $category_id ); ?>" class="list-group-item text-center">Показать все</a>
      </div>

    </div>
  </section>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
