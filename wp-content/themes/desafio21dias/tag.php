<?php

/**
 * Tema construido no Desafio21Dias
 *
 * @link http://torneseumprogramador.com.br
 *
 * @package WordPress
 * @subpackage Desafio21Dias
 * @since Desafio21Dias
 */

get_header();
$url = get_stylesheet_directory_uri();

if (have_posts()) {  ?>
<div class="container" style="text-align: center; margin-top: 150px;">
  <h2>Tags </h2>
  <br>
  <table class="table" id="tabCategorias">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Imagem</th>
        <th scope="col">Título</th>
        <th scope="col">Conteúdo</th>
      </tr>
    </thead>
    <tbody>

      <?php
        while (have_posts()) {
          the_post();
        ?>
      <tr>
        <th scope="row"><?php the_id(); ?></th>
        <td>
          <a href="<?php echo get_permalink(); ?>">
            <div style="width:128px; height: 128px; overflow: hidden;">
              <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'style' => 'width:100%')); ?>
            </div>
          </a>
        </td>
        <td><a href="<?php echo get_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </td>
        <td>
          <a href="<?php echo get_permalink(); ?>">
            <?php the_content(); ?>
          </a>
        </td>
      </tr>
      <?php

        } // end while
        ?>

    </tbody>
  </table>
  <div class="pagination">
    <?php
      echo paginate_links();
      ?>
  </div>

</div>
<?php
} //
else { ?>
<div class="text-center mt-4 alert alert-danger" role="alert">
  <p>Nenhum post encontrado!</p>
</div>
<?php
} //end if
?>
<div class="text-center mt-4">
    <a class="btn btn-primary" href="javascript:window.history.go(-1);" >                
        <i class="fa fa-arrow-left mr-2"></i>
        Voltar!
    </a>
  <a href="/wordpress-desafio21" class="btn btn-primary" style="width:150;text-align:center">Home</a>
</div>

</div>
</div>

</section>

<?php get_footer(); ?>