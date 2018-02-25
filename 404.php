<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sp-theme
 */

get_header(); ?>

  <div class="container">
    <div class="row">
      <div id="primary" class="content-area col-9">
        <main id="main" class="site-main">

          <section class="error-404 not-found">
            <header class="page-header">
              <h1 class="page-title"><?php esc_html_e( 'Страница не найдена', 'sp-theme' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
              <p><?php esc_html_e( 'Перейдите на другую страницу или воспользуйтесь поиском:', 'sp-theme' ); ?></p>

              <?php get_search_form(); ?>
            </div><!-- .page-content -->
          </section><!-- .error-404 -->

        </main><!-- #main -->
      </div><!-- #primary -->
      <aside class="col-3">
        <?php get_sidebar(); ?>
      </aside>
    </div><!-- .row -->
  </div><!-- .container -->

<?php
get_footer();
