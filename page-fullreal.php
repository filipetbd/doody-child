<?php
/**
* Template Name: Full Real
 */

get_header();

if ( is_front_page() ) :

      get_template_part('template-parts/header/site', 'branding');

    endif; ?>
  <div id="content" class=" site-content">
			<div class="container-fluid">
					<div class="row">
						<section id="primary" class="content-area card m-0 p-0 shadow col-sm-12">
        		<main id="" class="site-main p-0 m-0">

			<?php
			while ( have_posts() ) : the_post();

//				get_template_part( 'template-parts/content', 'page' );
/*				Aqui entra o conteúdo que seria puxado pelo get_template_part
*
*/ ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            the_content();

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'doody'),
                'after' => '</div>',
            ));
            ?>

           <?php if (get_edit_post_link()) : ?>
            <footer class="entry-footer">
                <?php
                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'doody'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->












			<?php
			// Aqui faria parte da tag anterior.
			// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
