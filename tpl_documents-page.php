<?php
/*
Template Name: Шаблон для страниц с документами
*/

get_header(); ?>

  <div class="container">
    <div class="row">
      <div id="primary" class="content-area col-lg-9">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>

        <main id="main" class="site-main">

          <?php
          while ( have_posts() ) : the_post(); ?>

            <header class="page-header">
              <h1 class="page-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->
            <hr>
          <?php endwhile; ?>

          <!-- Documents -->
          <div class="documents">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Дата</th>
                  <th scope="col" style="min-width: 200px;">Документ</th>
                  <th scope="col">Заголовок</th>
                  <th scope="col">Скачать</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $documents = get_field('документы');
                if ( $documents ) :
                  foreach( $documents as $document ): ?>
                    <tr>
                      <th scope="row"><?php echo $document['дата']; ?></th>
                      <td>
                        <?php
                        $file = $document['файл'];
                        $filesize = filesize( get_attached_file( $file['id'] ) );
                        $filesize = size_format($filesize, 2); ?>
                        <a href="<?php echo $file['url']; ?>" target="_blank">
                          <?php echo $document['название']; ?></td>
                        </a>
                      <td><?php echo $document['заголовок']; ?></td>
                      <td class="text-center">
                        <a href="<?php echo $file['url']; ?>" target="_blank">
                          <img src="<?php echo $file['icon']; ?>" alt="">
                          <span class="d-block mt-1 text-nowrap"><?php echo $filesize; ?></span>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach;
                endif; ?>
              </tbody>
            </table>
          </div><!-- /.documents -->

          <footer class="entry-footer">
            <?php edit_post_link('Редактировать', '', '', $post->ID, 'badge badge-danger'); ?>
          </footer><!-- .entry-footer -->

        </main><!-- #main -->
      </div><!-- #primary -->
      <aside class="col-lg-3">
        <?php get_sidebar(); ?>
      </aside>
    </div><!-- .row -->
  </div><!-- .container -->

<?php
get_footer();
