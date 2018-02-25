<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sp-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
  if ( is_singular() ) : ?>
    <header class="entry-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-hesader -->

    <?php sp_theme_post_thumbnail(); ?>

    <div class="entry-content">
      <?php
        the_content( sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Читать далее<span class="screen-reader-text"> "%s"</span>', 'sp-theme' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        ) );

        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sp-theme' ),
          'after'  => '</div>',
        ) );
      ?>
    </div><!-- .entry-content -->
    <div class="entry-footer">
      <?php
      if ( 'post' === get_post_type() ) : ?>
        <div class="alert alert-secondary" role="alert">
          <small>Опубликовано: <b><?php sp_theme_posted_on(); ?></b></small> |
          <small>Просмотров: <b><?php echo get_post_meta ($post->ID,'views',true); ?></b></small>
          <?php edit_post_link('Редактировать', '| ', '', $post->ID, 'badge badge-danger'); ?>
        </div>
      <?php
      endif; ?>
    </div>

  <?php
  else : ?>
    <div class="row">
      <div class="col-4 pr-0">
        <?php sp_theme_post_thumbnail(); ?>
      </div>
      <div class="col-8">
        <?php the_title( '<h2 class="list-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

        if ( 'post' === get_post_type() ) : ?>
          <div class="list-entry-meta">
            <span class="badge badge-secondary"><?php echo get_the_date(); ?></span>
            <?php edit_post_link('Редактировать', '', '', $post->ID, 'badge badge-danger'); ?>
          </div><!-- .entry-meta -->
        <?php
        endif; ?>
        <div class="list-entry-content">
          <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
      </div>
    </div>
  <?php
  endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
<hr>
