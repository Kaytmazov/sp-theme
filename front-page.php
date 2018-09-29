<?php
get_header(); ?>
  <div class="container">
    <div class="row">
      <div id="primary" class="content-area col-lg-9">
        <main id="main" class="site-main">

          <div id="newsCarousel" class="carousel slide mb-5" data-ride="carousel">
            <?php
            $category_id = get_cat_ID( 'Новости' );
            $args = array(
              'cat' => $category_id,
              'posts_per_page' => 3,
            );
            $slider_news = new WP_Query($args);
            if ($slider_news->have_posts()) : ?>
              <ol class="carousel-indicators">
                <?php
                $i = 0;
                while($slider_news->have_posts()) : $slider_news->the_post(); ?>
                  <li data-target="#newsCarousel" data-slide-to="<?php echo $i ?>" class="<?php if($i == 0) { ?>active<?php } ?>"></li>
                <?php
                $i++;
                endwhile; ?>
              </ol>
              <div class="carousel-inner">
                <?php
                $i = 0;
                while($slider_news->have_posts()) : $slider_news->the_post(); ?>
                  <div class="carousel-item <?php if($i == 0) { ?>active<?php } ?>">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('slider-photo', 'class=d-block w-100'); ?>
                      <div class="carousel-caption">
                        <h5><?php the_title(); ?></h5>
                      </div>
                    </a>
                  </div>
                <?php
                $i++;
                endwhile; ?>
              </div>
              <?php
              wp_reset_postdata();
              endif;?>
            <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Предыдущий</span>
            </a>
            <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Следующий</span>
            </a>
          </div>

          <!-- Список последних новостей -->
          <div class="posts-list mb-5">
            <div class="card-deck mb-5">
            <?php $args = array(
              'cat' => $category_id,
              'posts_per_page' => 8,
            );
            $hot_news = new WP_Query($args);
            $i = 0;
            if ($hot_news->have_posts()) :
              while($hot_news->have_posts()) : $hot_news->the_post();
                if($i < 2) : ?>
                  <div class="card">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('large', 'card-img-top'); ?>
                    </a>
                    <div class="card-body">
                      <h6 class="card-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h6>
                      <p class="card-text">
                        <?php the_excerpt(); ?>
                        <?php edit_post_link('Редактировать', '<br>', '', $post->ID, 'badge badge-danger'); ?>
                      </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted"><?php echo get_the_date(); ?></small>
                    </div>
                  </div>
                <?php elseif($i == 2) : ?>
                </div>
                <article class="mb-4">
                  <div class="row">
                    <div class="col-4 pr-0">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                      </a>
                    </div>
                    <div class="col-8">
                      <h2 class="list-entry-title">
                        <a class="hotnews-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h2>
                      <div class="list-entry-meta">
                        <span class="badge badge-secondary"><?php echo get_the_date(); ?></span>
                        <?php edit_post_link('Редактировать', '', '', $post->ID, 'badge badge-danger'); ?>
                      </div>
                      <p class="list-entry-content">
                        <?php the_excerpt(); ?>
                      </p><!-- .entry-content -->
                    </div>
                  </div>
                </article>
                <hr>
                <!-- /.card-deck -->
                <?php else : ?>
                  <article class="mb-4">
                    <div class="row">
                      <div class="col-4 pr-0">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('medium'); ?>
                        </a>
                      </div>
                      <div class="col-8">
                        <h2 class="list-entry-title">
                          <a class="hotnews-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="list-entry-meta">
                          <span class="badge badge-secondary"><?php echo get_the_date(); ?></span>
                          <?php edit_post_link('Редактировать', '', '', $post->ID, 'badge badge-danger'); ?>
                        </div>
                        <p class="list-entry-content">
                          <?php the_excerpt(); ?>
                        </p><!-- .entry-content -->
                      </div>
                    </div>
                  </article>
                  <hr>
                <?php endif; $i++; ?>
              <?php endwhile;
              wp_reset_postdata();?>
            <?php endif;?>
            <a href="<?php echo get_category_link( $category_id ); ?>" class="btn btn-info btn-lg btn-block">Все новости</a>
          </div><!-- .news-list -->
        </main><!-- #main -->
      </div><!-- #primary -->
      <aside class="col-lg-3">
        <?php get_sidebar(); ?>
      </aside>
    </div><!-- .row -->
  </div><!-- .container -->

<?php
get_footer();
