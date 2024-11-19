<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aixor
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="feature-project feature-project-2" data-aos="fade-up">
        <div class="hover_mouse">
            <a href="<?php the_permalink(); ?>">View</a>
        </div>
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