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

<div id="secondary" class="widget-area">
  <?php
  $current_page_ID = $post->ID;

  $parent_id = $post->post_parent;
  if (!$parent_id == 0) : ?>
    <!-- Боковое меню -->
    <section class="subnav-items mb-4">
      <div class="list-group">
        <?php $mypages = get_pages( array( 'parent' => $parent_id, 'sort_column' => 'menu_order' ) );
        foreach( $mypages as $page ) : ?>
          <a class="list-group-item list-group-item-action <?php if ( ($page->ID) == $current_page_ID ) echo 'active' ?>" href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
        <?php
        endforeach; ?>
      </div>
    </section>
  <?php
  endif; ?>
  <!-- Глава -->
  <section class="mb-4">
    <div class="card">
      <div class="card-header">Глава администрации</div>
      <img class="card-img-top" src="/wp-content/uploads/2018/02/glava.jpg" alt="Card image cap">
      <div class="card-body p-3">
        <h6 class="card-title text-center">Магомедов Магомед Алиевич</h6>
        <p class="card-text">Приветствую вас на официальном сайте муниципального образования сельского поселения "село Цада"</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="#">Биография</a></li>
        <li class="list-group-item"><a href="#">График приёма</a></li>
      </ul>
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
</div><!-- #secondary -->
