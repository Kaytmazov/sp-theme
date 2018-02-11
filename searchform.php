<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ) ?>" >
  <label class="screen-reader-text"><?php echo _x( 'Поиск:', 'label' ) ?></label>
  <div class="input-group">
    <input type="search" class="form-control border border-info" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo esc_attr_x( 'Поиск', 'placeholder' ) ?>" aria-label="Поиск" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-info" type="submit" value="<?php echo esc_attr_x( 'Поиск', 'submit button' ) ?>">Найти</button>
    </div>
  </div>
</form>
