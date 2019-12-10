<?php
/**
 * Displays header site branding
 *
 * @package Doody
 */
?>

<div class="custom-header container-fluid" >
	<?php if ( has_header_image() ) { ?>
        <img class="vh-100" src=<?php header_image(); ?>>
	<?php } ?>
    <div class="bg-gradient" style="<?php if ( get_theme_mod( 'header_color_setting') ) {
		 echo get_theme_mod( 'header_color_setting');
	 					}
		 ?>">
		 		<div class="row allVH <?php if ( get_theme_mod( 'banner_tagline_style' ) === '' ) :

						echo 'justify-content-center';

					elseif ( get_theme_mod( 'banner_tagline_style' ) === '1' ) :

						echo 'justify-content-start';

					elseif ( get_theme_mod( 'banner_tagline_style' ) === '2' ) :

						echo 'justify-content-end';

					else :

						echo 'justify-content-center';

					endif;

				?>">
				<div class="col-sm-8 align-self-center justify-content-center">

				<div class=" ">
            <h1>
                <?php
                if (get_theme_mod('header_banner_title_setting')) {
                    echo get_theme_mod('header_banner_title_setting');
                } else {
                    echo 'Doody';
                }
                ?>
            </h1>
            <div class="">
						<?php
            if ( get_theme_mod( 'header_banner_text_setting' ) ) {

							echo get_theme_mod( 'header_banner_text_setting' );

            } else {
                echo esc_html__('My first theme maked with WordPress', 'doody');
            }
            ?>
						<?php if ( is_active_sidebar( 'cover-sidebar' ) ) : ?>
						<?php	 dynamic_sidebar( 'cover-sidebar' ) ?>
					<?php elseif ( !is_active_sidebar( 'cover-sidebar' ) && is_super_admin() ) : ?>
								<span class="alert alert-secondary"> Widget area </span>

							<?php endif; ?>

					</div>
        </div><!-- .site-branding -->

					</div>

				</div>
				<a href="#content" class="page-scroller"><i class="fa fa-2x fa-fw fa-angle-down"></i></a>
    </div>
</div>
<!-- .custom-header -->
