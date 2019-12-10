<?php
/**
* Template Name: Only Cover (Developer)
 */

get_header(); ?>

<?php if (is_home() && is_front_page() || is_front_page() ) {

	  get_template_part('template-parts/header/site', 'branding');

	}?>



<?php
get_footer();
