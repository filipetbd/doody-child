<?php
/**
 * Doody Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Doody
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function doody_child_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {

        // Site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title',
            'render_callback' => 'doody_customize_partial_blogname',
        ));
    }


    // Banner title
    $wp_customize->add_setting( 'header_banner_title_setting', array(
        'default' => __('Doody', 'doody'),
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_banner_title_setting', array(
        'label' => __('Banner Title', 'doody'),
        'section'    => 'header_image',
        'settings'   => 'header_banner_title_setting',
        'type' => 'text'
    ) ) );

    $wp_customize->add_setting( 'header_banner_text_setting', array(
        'default' => __( 'To customize the contents of this header banner and other elements of your site go to Dashboard - Appearance - Customize','wp-bootstrap-starter' ),
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_kses_post',
    ) );
		$wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'header_banner_text_setting',
			 array(
					'label' => __( 'Banner Tagline', 'doody' ),
				//	'description' => __( 'This is a TinyMCE Editor Custom Control' ),
					'section' => 'header_image',
					'settings'   => 'header_banner_text_setting',
					'type' => 'textarea',
					'input_attrs' => array(
						 'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
						 'toolbar2' => 'formatselect outdent indent | blockquote charmap',
						 'mediaButtons' => true,
					)
			 )
		) );
    $wp_customize->add_setting( 'banner_tagline_style', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'banner_tagline_style', array(
        'label' => __( 'Estilo de capa', 'doody-child' ),
        'section'    => 'header_image',
        'settings'   => 'banner_tagline_style',
        'type'    => 'select',
        'choices' => array(
            '' => 'Padrão',
            '1' => 'Caixa a esquerda',
            '2' => 'Caixa a direita',
        )
    ) ) );
    //$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_banner_description_setting', array(
    //    'label' => __('Banner description', 'doody'),
    //    'section' => 'header_image',
    //    'settings' => 'header_banner_description_setting',
    //    'type' => 'text'
  //  )
  //));

    // Footer
    $wp_customize->add_section('site_footer_section', array(
        'title' => esc_html__('Footer', 'doody'),
        'capability' => 'edit_theme_options',
    ));


    $wp_customize->add_setting('footer_text_setting', array(
        'type' => 'option', // or 'option'
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text_setting', array(
        'label' => __('Replace the footer text', 'doody'),
        'section' => 'site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
    $wp_customize->add_setting( 'header_color_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_color_setting', array(
        'label' => __( 'Esquema de cores da capa', 'doody-child' ),
        'section'    => 'colors',
        'settings'   => 'header_color_setting',
        'type'    => 'select',
        'choices' => array(
            '' => 'Padrão',
            'background-image: linear-gradient(45deg, rgbA(100,100,100,1), rgba(255, 255, 255, 0.68));' => 'Claro',
            'background-image: linear-gradient(45deg, rgba(226, 106, 106, 1), rgba(246, 136, 156, 0.48));' => 'Vermelho',
            'background-image: linear-gradient(45deg, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.48));' => 'Escuro',
        )
    ) ) );
}

add_action('customize_register', 'doody_child_customize_register' , 30);

//Custom
if (class_exists('WP_Customize_Control')) {
	class Text_Editor_Custom_Control extends WP_Customize_Control
	{
	    public $type = 'textarea';
	    /**
	    ** Render the content on the theme customizer page
	    */
	    public function render_content() { ?>
	        <label>
	          <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	          <?php
	            $settings = array(
	              'media_buttons' => false,
	              'quicktags' => false
	              );
	            $this->filter_editor_setting_link();
	            wp_editor($this->value(), $this->id, $settings );
	          ?>
	        </label>
	    <?php
	        do_action('admin_footer');
	        do_action('admin_print_footer_scripts');
	    }
	    private function filter_editor_setting_link() {
	        add_filter( 'the_editor', function( $output ) { return preg_replace( '/<textarea/', '<textarea ' . $this->get_link(), $output, 1 ); } );
	    }
	}
}
function editor_customizer_script() {
    wp_enqueue_script( 'wp-editor-customizer', get_stylesheet_directory_uri() . '/js/customizer.js', array( 'jquery' ), rand(), true );
}
add_action( 'customize_controls_enqueue_scripts', 'editor_customizer_script' );
