<?php
global $aixor_options;
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aixor
 */

get_header('v1');
?>


    <!-- Start Breadcrumb
    ============================================= -->
    <div class="hero-sec about-hero-sec" id="hero">
        <div class="custom-container">
            <div class="hero-inner">
                <!-- Shape Section -->
                <?php if ($aixor_options['blogbgimg_on_off'] == 1) { 
                ?>
                <img class="hero-shape" src="<?php echo esc_url($aixor_options['blogbg_img']['url']); ?>" alt="shape">
                <?php } ?>
                <!-- Hero Top Section -->
                <div class="hero-top">
                    <!-- Hero Description -->
                    <div class="hero-top-desc">
                        <p><?php echo esc_html($aixor_options['blogbanner_text']); ?></p>
                    </div>
                    <!-- Author Information -->
                    <div class="author-info">
                        <h4><?php echo esc_html($aixor_options['author_name']); ?></h4>
                        <span><?php echo esc_html($aixor_options['author_designation']); ?></span>
                    </div>
                </div>
                <!-- Hero Bottom Section -->
                <div class="hero-bottom">
                    <div class="left">
                        <h2><?php esc_html_e( 'Author', 'aixor' )?></h2>
                        <h2><?php esc_html_e(' All Posts By ' , 'aixor' ); echo get_the_author(); ?></h2>
                    </div>
                    <!-- Button Section -->
                    <?php if(!empty($aixor_options['blogbutton_text'] )): ?>
                    <?php
                        if ($aixor_options['blogbuttonlink_newtab'] == 1) {
                            ?>
                    <a target="_blank" href="<?php echo esc_html($aixor_options['blogbutton_link']); ?>" class="theme-btn">
                        <?php echo esc_html($aixor_options['blogbutton_text']); ?>
                        <img src="<?php echo esc_url($aixor_options['blogbutton_img']['url']); ?>" alt="icon">
                    </a>
                    <?php
                    } else {
                        ?>
                    <a href="<?php echo esc_html($aixor_options['blogbutton_link']); ?>" class="theme-btn">
                        <?php echo esc_html($aixor_options['blogbutton_text']); ?>
                        <img src="<?php echo esc_url($aixor_options['blogbutton_img']['url']); ?>" alt="icon">
                    </a>
                    <?php
                    }
                    ?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="feature-sec feature-sec-2" id="projects">
        <div class="custom-container">
            <div class="feature-project-lists">
                <div class="project-col-2">
                    <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', 'single' );

                            endwhile;
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

<?php
get_footer();
