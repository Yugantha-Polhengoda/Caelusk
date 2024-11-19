<?php
/*
 * Template Name: About
 */
get_header('v1'); ?>

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post();       
  the_content(); // displays whatever you wrote in the WordPress editor
  endwhile; endif; //ends the loop
 ?>
 
<?php get_footer(); ?>
