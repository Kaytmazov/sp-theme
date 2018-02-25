<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sp-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
  </header><!-- .entry-header -->
  <hr>

	<?php sp_theme_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sp-theme' ),
				'after'  => '</div>',
			) );
		?>
  </div><!-- .entry-content -->

  <?php $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order' ) );
  if ($mypages) : ?>
    <!-- Внутренние страницы -->
    <section class="sub-pages mb-4">
      <div class="list-group">
        <?php
        foreach( $mypages as $page ) : ?>
          <a class="list-group-item list-group-item-action" href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
        <?php
        endforeach; ?>
      </div>
    </section>
  <?php
  endif;

	if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
      <?php edit_post_link('Редактировать', '', '', $post->ID, 'badge badge-danger'); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
