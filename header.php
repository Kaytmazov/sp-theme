<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sp-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sp-theme' ); ?></a>

	<header id="masthead" class="site-header">
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="site-branding col-md-8">
            <?php the_custom_logo(); ?>
            <a class="site-title-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
              <?php
              endif;

              if ( is_front_page() ) : ?>
                <h1 class="site-title">&laquo;<?php bloginfo( 'name' ); ?>&raquo;</h1>
              <?php else : ?>
                <h2 class="site-title">&laquo;<?php bloginfo( 'name' ); ?>&raquo;</h2>
              <?php
              endif; ?>
            </a>
          </div><!-- .site-branding -->

          <div class="col-md-4">
            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ) ?>" >
              <label class="screen-reader-text"><?php echo _x( 'Поиск:', 'label' ) ?></label>
              <div class="input-group">
                <input type="search" class="form-control border border-white" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo esc_attr_x( 'Поиск', 'placeholder' ) ?>" aria-label="Поиск" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-light" type="submit" value="<?php echo esc_attr_x( 'Поиск', 'submit button' ) ?>">Найти</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

		<nav id="site-navigation" class="main-navigation">
      <div class="container">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'sp-theme' ); ?></button>
        <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'menu_class'     => 'clearfix'
          ) );
        ?>
      </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
