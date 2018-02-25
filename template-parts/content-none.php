<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sp-theme
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Ничего не найдено', 'sp-theme' ); ?></h1>
  </header><!-- .page-header -->
  <hr>

	<div class="page-content">
		<?php
		if ( is_search() ) : ?>

			<p><?php esc_html_e( 'Извините, по этому запросу ничего не найдено. Пожалуйста, попытайтесь снова с другими ключевыми словами.', 'sp-theme' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'Извините, мы не можем найти то, что вы ищете. Воспользуйтесь поиском:', 'sp-theme' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
