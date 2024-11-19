<?php
global $aixor_options;
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package aixor
 */

get_header('v5');
?>

<!-- Start 404
============================================= -->

<!-- ===== Hero Start ===== -->
<div class="hero-sec error-hero-sec">
    <div class="custom-container">
        <div class="hero-inner">
            <!-- Shape Section -->
            <?php if ($aixor_options['bgimg_on_off'] == 1) { 
            ?>
            <img class="hero-shape" src="<?php echo esc_url($aixor_options['bg_img']['url']); ?>" alt="shape">
            <?php } ?>
            <!-- Hero Bottom Section -->
            <div class="hero-bottom error-box">
                <div class="left">
                    <h2><?php echo ($aixor_options['banner_text']); ?></h2>
                </div>
                <p>
                    <?php echo ($aixor_options['banner_content']); ?>
                </p>
                <!-- Button Section -->
                <?php if(!empty($aixor_options['button_text'] )): ?>
                <?php
                    if ($aixor_options['buttonlink_newtab'] == 1) {
                        ?>
                <a target="_blank" href="<?php echo esc_html($aixor_options['button_link']); ?>" class="theme-btn">
                    <?php echo esc_html($aixor_options['button_text']); ?>
                    <img src="<?php echo esc_url($aixor_options['button_img']['url']); ?>" alt="icon">
                </a>
                <?php
                } else {
                    ?>
                <a href="<?php echo esc_html($aixor_options['button_link']); ?>" class="theme-btn">
                    <?php echo esc_html($aixor_options['button_text']); ?>
                    <img src="<?php echo esc_url($aixor_options['button_img']['url']); ?>" alt="icon">
                </a>
                <?php
                }
                ?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
        <!-- ===== Hero End ===== -->
<!-- End 404 -->
<?php
get_footer();
