<?php
global $aixor_options; 
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aixor
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- ===== Meta ===== -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Stylesheet ===== -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ===== Pre Loader Start ===== -->
<?php   if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    global $aixor_options; 
    if($aixor_options['aixor_preloader_switcher_options'] == 1) : ?>
<div class="preloader-wrap">
    <video src="<?php echo esc_url($aixor_options['preloader_video']['url']); ?>" loop muted autoplay="" playsinline=""></video>
    <img src="<?php echo esc_url($aixor_options['preloader_img']['url']); ?>" alt="Logo">
</div>
<?php endif; } ?>
<!-- ===== Pre Loader End ===== -->

<!-- ===== Magic Cursor Start ===== -->
<?php if ($aixor_options['cursor_on_off'] == 1) { 
    ?>
<div id="magic-cursor">
    <div id="ball"></div>
</div>
 <?php } ?>
<!-- ===== Magic Cursor End ===== -->

<!-- ===== Main Start ===== -->
<main class="aixor-main">
    <!-- ===== Header Sidebar Start ===== -->
   
    <!-- ===== Header Sidebar End ===== -->

    <!-- ===== Menu Start ===== -->
  
    <!-- ===== Menu End ===== -->

    <!-- ===== Smooth Scroll Start ===== -->
    <!--        <div id="smooth-wrapper">-->
    <!--            <div id="smooth-content">-->

