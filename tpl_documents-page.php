<?php
/*
Template Name: Шаблон для страниц с документами
*/

get_header(); ?>

  <div class="container">
    <div class="row">
      <div id="primary" class="content-area col-9">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>

        <main id="main" class="site-main">

          <?php
          while ( have_posts() ) : the_post(); ?>

            <header class="entry-header">
              <h1 class="entry-title mb-4"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->

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
                foreach( $documents as $document ): ?>
                  <tr>
                    <th scope="row"><?php echo $document['дата']; ?></th>
                    <td>
                      <a href="<?php echo $file['url']; ?>">
                        <?php echo $document['название']; ?></td>
                      </a>
                    <td><?php echo $document['заголовок']; ?></td>
                    <td class="text-center">
                      <?php
                      $file = $document['файл'];
                      $filesize = filesize( get_attached_file( $file['id'] ) );
                      $filesize = size_format($filesize, 2);

                      if( $file ): ?>
                        <a href="<?php echo $file['url']; ?>">
                          <img src="<?php echo $file['icon']; ?>" alt="">
                          <span class="d-block mt-1 text-nowrap"><?php echo $filesize; ?></span>
                        </a>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </main><!-- #main -->
      </div><!-- #primary -->
      <?php
      get_sidebar(); ?>
    </div><!-- .row -->
  </div><!-- .container -->

<?php
get_footer();