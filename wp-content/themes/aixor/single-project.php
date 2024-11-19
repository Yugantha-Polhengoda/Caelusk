<?php
/**
 * The template for displaying all single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aixor
 */

get_header('v1');
global $post;
?>

<?php

$infosubTitle = get_post_meta($post->ID, 'info_subtitle', true);
$infoTitle = get_post_meta($post->ID, 'info_title', true);
$descriptionTitle = get_post_meta($post->ID, 'description_title', true);
$infoDescription = get_post_meta($post->ID, 'info_description', true);
$industryTitle = get_post_meta($post->ID, 'industry_title', true);
$infoIndustry = get_post_meta($post->ID, 'info_industry', true);
$releaseTitle = get_post_meta($post->ID, 'release_title', true);
$infoReleaseDate = get_post_meta($post->ID, 'info_release_date', true);
$projectDetailsGroup = get_post_meta($post->ID, 'project_details_group', true);
//$featuredImage = get_the_post_thumbnail($post->ID, 'full');
?>

    <div class="project-single-wrap">
        <div class="project-single-header">
            <div class="section-header">
                <span class="section-subtitle">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/subtitle-shape.svg' ?>" alt="<?php echo esc_attr__('Shape', 'aixor'); ?>">
                    <?php the_title(); ?>
                </span>
                <h3 class="section-title reveal-type">
                    <?php the_excerpt(); ?>
                </h3>
            </div>
        </div>

        <div class="feature-project">
            <?php if (!empty(get_the_post_thumbnail_url($post->ID, 'full'))) { ?>
                <div class="img-box">
                    <img class="scaleDown" src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>"
                         alt="<?php the_title(); ?>">
                </div>
            <?php } ?>
            <div class="feature-project-infos">
                <?php if (!empty($infoTitle)) { ?>
                    <div class="feature-project-info-box project-name">
                        <span class="title"><?php echo esc_html($infosubTitle); ?></span>
                        <span class="subtitle"><?php echo esc_html($infoTitle); ?></span>
                    </div>
                <?php }
                if (!empty($infoDescription)) { ?>
                    <div class="feature-project-info-box project-description">
                        <span class="title"><?php echo esc_html($descriptionTitle); ?></span>
                        <span class="subtitle"><?php echo wp_kses_post($infoDescription); ?></span>
                    </div>
                <?php }
                if (!empty($infoIndustry)) { ?>
                    <div class="feature-project-info-box">
                        <span class="title"><?php echo esc_html($industryTitle); ?></span>
                        <span class="subtitle"><?php echo esc_html($infoIndustry); ?></span>
                    </div>
                <?php }
                if (!empty($infoReleaseDate)) { ?>
                    <div class="feature-project-info-box">
                        <span class="title"><?php echo esc_html($releaseTitle); ?></span>
                        <span class="subtitle"><?php echo esc_html($infoReleaseDate); ?></span>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="project-single-content-wrap">

            <?php foreach ($projectDetailsGroup as $detail): ?>
                <div class="section-header">
                    <?php
                    if (!empty($detail['project_details_subtitle'])) { ?>
                        <span class="section-subtitle">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/subtitle-shape.svg' ?>" alt="<?php echo esc_attr__('Shape', 'aixor'); ?>">
                            <?php echo esc_html($detail['project_details_subtitle']); ?>
                        </span>
                    <?php } ?>
                    <div class="right">
                        <?php if (!empty($detail['project_details_title'])) { ?>
                            <h3 class="section-title reveal-type">
                                <?php echo esc_html($detail['project_details_title']); ?>
                            </h3>
                        <?php }
                        if (!empty($detail['project_details_description'])) { ?>
                            <div class="section-desc">
                                <?php echo wp_kses_post($detail['project_details_description']); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="full-image">
            <img class="scaleDown" src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>"
                 alt="<?php the_title(); ?>">
        </div>
    </div>

<?php
get_footer();