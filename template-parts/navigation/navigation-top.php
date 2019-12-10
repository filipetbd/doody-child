<?php
/**
 * Displays top navigation
 *
 * @package Doody
 */
?>

<nav id="navtop" class="navbar pt-0 pb-0 m-0 navbar-dark text-light bg-transparent navbar-expand-md">
    <div class="m-0 navbar-brand">
        <?php
        the_custom_logo(); ?>
        <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"
           rel="home"><?php bloginfo('name'); ?></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav"
            aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => 'div',
        'container_id' => 'main-nav',
        'container_class' => 'collapse pt-0 pb-0 navbar-collapse justify-content-end',
        'menu_id' => false,
        'menu_class' => 'nav nav-pills text-light',
        'depth' => 3,
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
        'walker' => new wp_bootstrap_navwalker()
    ));
    ?>
</nav><!-- #site-navigation -->
