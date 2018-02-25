<?php
/*
Template Name: Шаблон для страницы Структура
*/

get_header(); ?>

  <div class="container">
    <div class="row">
      <div id="primary" class="content-area col-9">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>

        <main id="main" class="site-main">

          <?php
          while ( have_posts() ) : the_post(); ?>

            <header class="page-header">
              <h1 class="page-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->
            <hr>

          <?php endwhile; ?>

          <!-- struktura -->
          <div class="struktura">
            <?php
            $structures = get_field('структура_администрации');
            foreach( $structures as $structura ): ?>
              <div class="row mb-4">
                <div class="col-4 pr-0">
                  <?php
                  if($structura['фото']) : ?>
                    <img class="rounded" src="<?php echo $structura['фото']; ?>" alt="Фото сотрудника">
                  <?php else : ?>
                    <img class="border rounded" src="<?php echo bloginfo('template_url'); ?>/img/no-photo.png" alt="Нет фото">
                  <?php
                  endif; ?>
                </div>

                <div class="col-8">
                  <h5 class="mb-4"><?php echo $structura['фио']; ?></h5>
                  <p><b>Должность:</b> <?php echo $structura['должность']; ?></p>

                  <?php
                  if($structura['телефон']) : ?>
                    <p><b>Телефон:</b> <a href="tel:<?php echo $structura['телефон']; ?>"><?php echo $structura['телефон']; ?></a></p>
                  <?php endif;

                  if($structura['email']) : ?>
                    <p><b>E-mail:</b> <a href="mailto:<?php echo $structura['email']; ?>"><?php echo $structura['email']; ?></a></p>
                  <?php endif; ?>
                </div>
              </div>
              <hr>
            <?php endforeach; ?>
          </div><!-- /.struktura -->

          <footer class="entry-footer">
            <?php edit_post_link('Редактировать', '', '', $post->ID, 'badge badge-danger'); ?>
          </footer><!-- .entry-footer -->

        </main><!-- #main -->
      </div><!-- #primary -->
      <aside class="col-3">
        <?php get_sidebar(); ?>
      </aside>
    </div><!-- .row -->
  </div><!-- .container -->

<?php
get_footer();
