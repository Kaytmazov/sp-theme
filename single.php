<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sp-theme
 */

get_header(); ?>
  <div class="container">
    <div class="row">

      <div id="primary" class="content-area col-9">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>

        <main id="main" class="site-main">

        <?php
        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', get_post_type() );

          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;

        endwhile; // End of the loop.
        ?>

        </main><!-- #main -->
      </div><!-- #primary -->
      <aside class="col-3">
        <?php get_sidebar(); ?>
      </aside>
    </div><!-- .row -->
  </div><!-- .container -->

<?php
get_footer();
