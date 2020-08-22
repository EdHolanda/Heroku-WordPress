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

?>
<h2>Resultados da busca por: <?php the_search_query(); ?></h2>

<?php
if (have_posts()) {  ?>
<div class="container" style="text-align: center; margin-top: 150px;">
  <h2>Resultados da busca por: <?php the_search_query(); ?></h2>
  <br>
  <table class="table" id="tabPesquisa">
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
</div>
<?php
} //
else { ?>
<div class="container" style="text-align: center; margin-top: 150px;">
  <p>Nenhum post encontrado!</p>
</div>
<?php
} //end if
?>
<div class="text-center mt-4">
  <a class="btn btn-xl btn-primary" href="<?php home_url('/'); ?>"><i class="fa fa-arrow-left mr-2"></i>
    Voltar
  </a>
</div>
</div>
</div>
</section>

<?php get_footer(); ?>