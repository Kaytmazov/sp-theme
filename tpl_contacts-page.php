<?php
/*
Template Name: Шаблон для страницы Контакты
*/

get_header(); ?>

  <div class="container">
    <div class="row">
      <div id="primary" class="content-area col-9">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>

        <main id="main" class="site-main">

          <?php
          while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
              </header><!-- .entry-header -->
              <hr>
              <div class="entry-content">
                <h5>Адрес</h5>
                <p><?php the_field('адрес'); ?></p>

                <h5 class="mt-4">Телефоны</h5>
                <?php
                $phones = get_field('телефоны');
                foreach( $phones as $phone ): ?>
                  <a href="tel:<?php echo $phone['телефон']; ?>"><?php echo $phone['телефон']; ?></a><br>
                <?php
                endforeach;

                $email = get_field('email');
                if ( $email ) : ?>
                  <h5 class="mt-4">Электронная почта</h5>
                  <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                <?php
                endif;

                $networks = get_field('социальные_сети');
                if ( $networks ) : ?>
                  <h5 class="mt-4">Соц.сети</h5>
                  <?php
                  foreach( $networks as $network ): ?>
                    <a class="icon icon-<?php echo $network['соцсеть']; ?>" href="<?php echo $network['ссылка']; ?>" target="_blank">
                      <svg>
                        <use xlink:href="<?php echo bloginfo('template_url'); ?>/img/sprite.svg#<?php echo $network['соцсеть']; ?>"></use>
                      </svg>
                    </a>
                  <?php
                  endforeach;
                endif; ?>
              </div>
              <footer class="entry-footer">
                <?php edit_post_link('Редактировать', '', '', $post->ID, 'badge badge-danger'); ?>
              </footer><!-- .entry-footer -->
            </article>
          <?php endwhile; ?>

        </main><!-- #main -->
      </div><!-- #primary -->
      <aside class="col-3">
        <?php get_sidebar(); ?>
      </aside>
    </div><!-- .row -->
  </div><!-- .container -->

<?php
get_footer();
