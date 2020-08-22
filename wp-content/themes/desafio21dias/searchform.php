  
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <div>
    <label for="s">O que voce produra:</label>
    <br>
    <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
    <input type="submit" id="searchsubmit" value="Pesquisar" />
  </div>
</form>