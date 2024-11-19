<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aixor
 */

get_header('v1');
?>

<!-- Start Breadcrumb
============================================= -->

<div class="breadcrumb-sec">
    <div class="section-header">
        <span class="section-subtitle">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/Union.svg'); ?>" alt="icon">
            <?php aixor_category();?>
        </span>
        <div class="right">
            <h3 class="section-title reveal-type">
                <?php echo wp_trim_words(get_the_excerpt(), 28); ?>
            </h3>
        </div>
    </div>
</div>

<!-- End Breadcrumb -->

<!-- Start Blog
============================================= -->

<div class="blog-detail-sec">
    <div class="container">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : { ?>
        <div class="custom-row">
            <?php } else : ?>
            <?php endif; ?>
            <div class="left">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                endwhile; // End of the loop. ?>

                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                else:
                endif; ?>

            </div>
            <!-- Start Sidebar -->
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : { ?>
            <aside class="blog-sidebar">
                 <?php get_sidebar(); ?>
            </aside>
            <?php } else : ?>
            <?php endif; ?>
            <!-- End Sidebar -->

        </div>
    </div>
</div>

<!-- End Blog -->

<?php
get_footer();
