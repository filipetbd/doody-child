<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/*
*
* Removi o o customizer original para poder reformular a cover com novas funções
*/

function remove_doody_customizer() {
    remove_action( 'customize_register', 'doody_customize_register' );
}
add_action( 'after_setup_theme', 'remove_doody_customizer', 9 );
// E aqui incluo o meu:
require get_stylesheet_directory() . '/inc/customizer.php';
// Não obstante, uma area de sidebar para cover (apesar de ter alterado o texto para HTML)
add_action( 'widgets_init', 'doddy_child_register_sidebars' );
function doddy_child_register_sidebars() {
    /* Register the 'cover' sidebar. */
    register_sidebar(
        array(
            'id'            => 'cover-sidebar',
            'name'          => __( 'Widget para cover' ),
            'description'   => __( 'Widget para capa da front-page' ),
            'class'         => 'nav',
            'before_widget' => '<div id="%1$s" class="d-inline-flexd %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ));
}
// Resize Custom Logo (além de mudar o tamanho, tira um filtro chato que deixa ele redondo)
function child_custom_logo_setup() {
         $defaults = array(
         'height'      => 60,
         'width'       => 200,
         'flex-height' => false,
         'flex-width'  => true,
         'header-text' => array( 'site-title', 'site-description' ),
         );
         add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'child_custom_logo_setup' , 25 );
// Aqui a alteração da classe
add_filter('get_custom_logo', 'child_custom_logo_class', 20);
function child_custom_logo_class( $class ) {
	$class = str_replace('custom-logo', 'navbar-brand', $class);
	return $class;
}
function child_custom_enqueue_scripts() {
  wp_register_script( 'customizer-js', get_stylesheet_directory_uri() . '/js/customizer.js', array( 'jquery' ) );
	wp_enqueue_script( 'custom-js' );
  wp_register_script( 'mask-js', get_stylesheet_directory_uri() . '/js/massk.js', array( 'jquery' ) );
  wp_enqueue_script( 'mask-js' );
  //wp_register_script( 'scrolling-js', get_stylesheet_directory_uri() . '/js/scrolling-nav.js', array( 'jquery' ) );
  //wp_enqueue_script( 'scrolling-js' );

}
add_action( 'wp_enqueue_scripts', 'child_custom_enqueue_scripts' );
// That's all! O resto foi gerado pelo Child Theme Configurator.


// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'doody-bootstrap-css','doody-hovercss','doody-fontawesome' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ctc-style.css', array( 'chld_thm_cfg_parent','doody-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 30 );

// END ENQUEUE PARENT ACTION
