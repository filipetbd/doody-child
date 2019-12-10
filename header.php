<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doody
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <script>
jQuery(document).ready(function($) {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'doody'); ?></a>

        <header id="masthead" class="site-header fixed-top shadow-lg navbar-dark bg-dark">
            <div class="container-fluid p-0">
                <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
            </div>
        </header><!-- #masthead -->



  
