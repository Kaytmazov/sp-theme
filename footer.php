<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sp-theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
    <nav class="footer-nav main-navigation">
      <div class="container">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Footer Menu', 'sp-theme' ); ?></button>
        <?php
          wp_nav_menu( array(
            'theme_location' => 'footer_menu',
            'menu_id'        => 'footer-menu',
            'menu_class'     => 'clearfix nav-menu'
          ) );
        ?>
      </div>
    </nav>
    <div class="container">
      <p class="footer-copyright">© <?php echo date('Y'); ?> г. Все права защищены. Создание сайта: <a href="http://kaytmazov.com" target="_blank">Kaytmazov.com</a></p>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
