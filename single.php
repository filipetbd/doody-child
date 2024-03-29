<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Doody
 */

get_header();
?>

<?php while (have_posts()) :
                            the_post();



              if (is_single() && has_post_thumbnail() ): 



              get_template_part('template-parts/header/featured-image', 'header');


              endif; ?>


              <div id="content" class="site-content">
                  <div class="container">
                      <div class="row">


    <div id="primary" class="content-area col-sm-12 <?php echo is_active_sidebar('sidebar-1') ? "col-lg-8" : "col-lg-12"; ?>">

        <main id="main" class="site-main card shadow-sm module-border-wrap mb-4">
            <div class="card-body">
                 <?php



                    get_template_part('template-parts/content', 'single'); ?>

                    <div class="card-body">

                        <?php
                        if (!is_singular('attachment')):
                            the_post_navigation();
                        endif;
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif; ?>
                    </div>


                <?php endwhile; // End of the loop.
                ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
