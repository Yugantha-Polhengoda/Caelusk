<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aixor
 */

?>

<div class="blog-detail-content-wrap">
    <div class="blog-content-box">
        <div class="feature-project feature-project-2">
            <div class="img-box">
                <?php the_post_thumbnail('aixor-blog-standard'); ?>
            </div>
            <div class="feature-project-infos">
                <div class="feature-project-info-box">
                    <span class="title">Title:</span>
                    <a href="<?php the_permalink(); ?>">
                        <span class="subtitle"><?php the_title(); ?></span>
                    </a>
                </div>
                <div class="feature-project-info-box">
                    <span class="title">Date:</span>
                    <span class="subtitle"><?php the_time(get_option('date_format')) ?></span>
                </div>
            </div>
        </div>
        
    </div>
    <div class="blog-content-box">
       <?php the_content(); ?>
    </div>
</div>