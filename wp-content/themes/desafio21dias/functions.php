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

add_theme_support('post-thumbnails');
add_post_type_support('produto', 'thumbnail');

function products_custom_post_type()
{
  register_post_type(
    'produtos',
    array(
      'labels'      => array(
        'name'          => __('Produtos', 'textdomain'),
        'singular_name' => __('Produto', 'textdomain'),
      ),
      'menu_icon' => 'dashicons-store',
      'taxonomies'            => array('category', 'post_tag'),
      'public'      => true,
      'has_archive' => true,
    )
  );
}
add_action('init', 'products_custom_post_type');

//[resultado_validacao_cpf]
function resultado_validacao_cpf_func( $atts ){
  $cpf = $_GET["cpf"];
  if(!isset($cpf)){
    return "";
  }
  $response = file_get_contents("https://validar-cpf-spring-boot.herokuapp.com/validacpf?cpf=$cpf");
  $response = json_decode($response);
  if($response->status == "valido"){
    return "<h2>CPF válido</h2>";
  }
  else{
    return "<h2 class='invalido'>CPF inválido</h2>";
  }
}
add_shortcode( 'resultado_validacao_cpf', 'resultado_validacao_cpf_func' );

//[resultado_validacao_cpf]
add_action('register_shortcode_ui','register_shortcode_ui_resultado_cpf');
function register_shortcode_ui_resultado_cpf(){
  shortcode_ui_register_for_shortcode('resultado_validacao_cpf',array(
    'label'=>'Validador CPF Resultado',
    'listItemImage'=>'dashicons-list-view'
  ));
}

//[form_validacao_cpf]
function form_validacao_cpf_func( $atts ){
  return "
    <form action=''>
      <label>
        CPF:
        <input type='text' name='cpf' placeholder='Digite o seu CPF'>
      </label>

      <button type='submit'>Validar</button>
    </form>
  ";
}
add_shortcode( 'form_validacao_cpf', 'form_validacao_cpf_func' );

//[form_validacao_cpf]
add_action('register_shortcode_ui','register_shortcode_ui_form_cpf');
function register_shortcode_ui_form_cpf(){
  shortcode_ui_register_for_shortcode('form_validacao_cpf',array(
    'label'=>'Validador CPF Form',
    'listItemImage'=>'dashicons-list-view'
  ));
}