<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sp-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">
    <div class="col-4 pr-0">
      <?php sp_theme_post_thumbnail(); ?>
    </div>
    <div class="col-8">
      <?php the_title( '<h2 class="list-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

      if ( 'post' === get_post_type() ) : ?>
        <div class="list-entry-badges">
          <span class="badge badge-secondary"><?php echo get_the_date(); ?></span>
          <?php edit_post_link('Редактировать', '', '', $post->ID, 'badge badge-danger'); ?>
        </div><!-- .list-entry-badges -->
      <?php
      endif; ?>
      <div class="list-entry-content">
        <?php the_excerpt(); ?>
      </div><!-- .entry-content -->
    </div>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
<hr>
