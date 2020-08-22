<?php
  /**
   * Tema construído no Desafio 21 Dias
   *
   * @link https://www.torneseumprogramador.com.br
   *
   * @package WordPress
   * @subpackage Desafio21Dias
   * @since Desafio 21 Dias 1.0
   */
  get_header();
  //$url = get_stylesheet_directory_uri();
  ?>
  <?php
    $args = array(
      'posts_per_page'=> 3,
      'paged' => get_query_var("paged"),
      'post_type'=> 'post'
    );
    $the_query_post = new WP_Query($args);
    if($the_query_post->have_posts()){  ?>
      <div style="padding:50px">
      <h2 style="margin-top: 80px; text-align: center">HABILIDADES</h2>
      <div class="container" style="margin-top: 50px;">
        <table class="table" style="margin-top: 50px">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Imagem</th>
              <th scope="col">Titulo</th>
              <th scope="col">Conteúdo</th>
            </tr>
          </thead>
          <tbody>
    <?php      
      while ($the_query_post->have_posts()) {
        $the_query_post->the_post();
    ?>
          <tr>
                <th scope="row"><?php the_id();?></th>
                <td>
                    <a href="<?php echo get_permalink();?>">
                        <div style="width:128px; height: 128px; overflow: hidden;">
                            <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'style'=>'width:100%'));?>
                        </div>
                    </a>
                </td>
                <td><a href="<?php echo get_permalink();?>">
                        <?php the_title();?>
                    </a>
                </td>
                <td>
                    <a href="<?php echo get_permalink();?>">
                        <?php the_content();?>
                    </a>
                </td>
            </tr>
    <?php           
     
        }// end while
    ?>
          </tbody>
          <caption>
            <?php
              global $wp_query; 
              $wp_query = $the_query_post;
              echo paginate_links(array(
                  'prev_text' => __('<i class="fa fa-reply-all" aria-hidden="true"></i>'),
                  'next_text' => __('<i class="fa fa-share" aria-hidden="true"></i>'),
                  'before_page_number' => ' [ ',       
                  'after_page_number'  => ' ] ',
              ));
          ?>
        </caption>
        </table>
       
      </div>
    <?php
    }//
    else{ ?>
      <div class="text-center mt-4 alert alert-danger" role="alert">
          <p >Nenhum post encontrado!</p>
      </div>
      <?php           
    }//end if
  ?>
  <a href="<?php echo home_url('/'); ?>" class="btn btn-primary" style="width:150;text-align:center">Home</a>
  </div>
</div>
</section>
<script>
$(document).ready(function(){
  $("#txtbusca").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabHabilidades tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php
get_footer();
?>
