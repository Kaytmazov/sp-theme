<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sp-theme
 */

get_header(); ?>

  <div class="container">
    <div class="row">
      <section id="primary" class="content-area col-9">
        <main id="main" class="site-main">

        <?php
        if ( have_posts() ) : ?>

          <header class="entry-header">
            <h1 class="entry-title"><?php
              /* translators: %s: search query. */
              printf( esc_html__( 'Результат поиска для: %s', 'sp-theme' ), '<span>' . get_search_query() . '</span>' );
            ?></h1>
          </header><!-- .page-header -->
          <hr>

          <?php
          /* Start the Loop */
          while ( have_posts() ) : the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part( 'template-parts/content', 'search' );

          endwhile;

          the_posts_navigation();

        else :

          get_template_part( 'template-parts/content', 'none' );

        endif; ?>

        </main><!-- #main -->
      </section><!-- #primary -->
      <aside class="col-3">
        <?php get_sidebar(); ?>
      </aside>
    </div><!-- .row -->
  </div><!-- .container -->

<?php
get_footer();
