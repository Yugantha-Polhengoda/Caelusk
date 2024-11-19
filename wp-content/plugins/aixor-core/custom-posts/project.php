<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Register Custom post type
function customPostTypeProjects() {
    $cptURLSlug = 'project';
    $cptURLSlug = apply_filters('aixor_project_cpt_url_slug', $cptURLSlug);

    $labels = array(
        'name'               => __('Projects', 'aixor-core'),
        'singular_name'      => __('Project', 'aixor-core'),
        'menu_name'          => __('Projects', 'aixor-core'),
        'name_admin_bar'     => __('Project', 'aixor-core'),
        'add_new'            => __('Add New', 'aixor-core'),
        'add_new_item'       => __('Add New Project', 'aixor-core'),
        'new_item'           => __('New Project', 'aixor-core'),
        'edit_item'          => __('Edit Project', 'aixor-core'),
        'view_item'          => __('View Project', 'aixor-core'),
        'all_items'          => __('All Projects', 'aixor-core'),
        'search_items'       => __('Search Projects', 'aixor-core'),
        'parent_item_colon'  => __('Parent Project:', 'aixor-core'),
        'not_found'          => __('No projects found.', 'aixor-core'),
        'not_found_in_trash' => __('No projects found in Trash.', 'aixor-core'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => $cptURLSlug),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('project', $args);
}

add_action('init', 'customPostTypeProjects');



// Add Meta Boxes
function add_projects_meta_box()
{
    add_meta_box(
        'project_info_meta_box', // ID
        esc_html__('Project Infos', 'aixor-core'), // Title
        'infoMetaBoxDisplay', // Callback
        'project', // Screen (CPT)
        'side', // Context
    );

    add_meta_box(
        'project_details_meta_box', // ID
        esc_html__('Project Details', 'aixor-core'), // Title
        'projectDetailsMetaBoxDisplay', // Callback
        'project', // Screen (CPT)
        'normal', // Context
        'high' // Priority
    );

}

add_action('add_meta_boxes', 'add_projects_meta_box', 1);

// Project Info Display for Meta Box
function infoMetaBoxDisplay($post)
{
    // Use nonce for verification
    wp_nonce_field('aixor_repeatable_meta_box_nonce', 'aixor_repeatable_meta_box_nonce');

    $info_title = get_post_meta($post->ID, 'info_title', true);
    $info_subtitle = get_post_meta($post->ID, 'info_subtitle', true);
    $description_title = get_post_meta($post->ID, 'description_title', true);
    $info_description = get_post_meta($post->ID, 'info_description', true);
    $industry_title = get_post_meta($post->ID, 'industry_title', true);
    $info_industry = get_post_meta($post->ID, 'info_industry', true);
    $release_title = get_post_meta($post->ID, 'release_title', true);
    $info_release_date = get_post_meta($post->ID, 'info_release_date', true);
    ?>
    <div class="aixor-project-infos-fields">
        <div class="aixor-project-info-box">
            <label for="info_subtitle"><?php echo esc_html__('Project Title', 'aixor-core'); ?>:</label>
            <input type="text" id="info_subtitle" placeholder="<?php echo esc_attr__('Project Title', 'aixor-core'); ?>"
                   name="info_subtitle" value="<?php echo esc_attr($info_subtitle); ?>"/>
        </div>
        <div class="aixor-project-info-box">
            <label for="info_title"><?php echo esc_html__('Project Name', 'aixor-core'); ?>:</label>
            <input type="text" id="info_title" placeholder="<?php echo esc_attr__('Project Name', 'aixor-core'); ?>"
                   name="info_title" value="<?php echo esc_attr($info_title); ?>"/>
        </div>
        <div class="aixor-project-info-box">
            <label for="description_title"><?php echo esc_html__('Description Title', 'aixor-core'); ?>:</label>
            <input type="text" id="description_title" placeholder="<?php echo esc_attr__('Description Title', 'aixor-core'); ?>"
                   name="description_title" value="<?php echo esc_attr($description_title); ?>"/>
        </div>
        <div class="aixor-project-info-box">
            <label for="info_description"><?php echo esc_html__('Description', 'aixor-core'); ?>:</label>
            <textarea id="info_description" type="text"
                   placeholder="<?php echo esc_attr__('Description', 'aixor-core'); ?>" name="info_description"><?php echo esc_html($info_description); ?></textarea>
        </div>
        <div class="aixor-project-info-box">
            <label for="industry_title"><?php echo esc_html__('Industry Title', 'aixor-core'); ?>:</label>
            <input type="text" id="industry_title" placeholder="<?php echo esc_attr__('Industry Title', 'aixor-core'); ?>"
                   name="industry_title" value="<?php echo esc_attr($industry_title); ?>"/>
        </div>
        <div class="aixor-project-info-box">
            <label for="info_industry"><?php echo esc_html__('Industry', 'aixor-core'); ?>:</label>
            <input id="info_industry" type="text" placeholder="<?php echo esc_attr__('Industry', 'aixor-core'); ?>"
                   name="info_industry" value="<?php echo esc_attr($info_industry); ?>"/>
        </div>
        <div class="aixor-project-info-box">
            <label for="release_title"><?php echo esc_html__('Release Title', 'aixor-core'); ?>:</label>
            <input type="text" id="release_title" placeholder="<?php echo esc_attr__('Release Title', 'aixor-core'); ?>"
                   name="release_title" value="<?php echo esc_attr($release_title); ?>"/>
        </div>
        <div class="aixor-project-info-box">
            <label for="info_release_date"><?php echo esc_html__('Release Date', 'aixor-core'); ?>:</label>
            <input id="info_release_date" type="text"
                   placeholder="<?php echo esc_attr__('Release Date', 'aixor-core'); ?>" name="info_release_date"
                   value="<?php echo esc_attr($info_release_date); ?>"/>
        </div>
    </div>
    <?php
}

// Project Details Display for Meta Box
function projectDetailsMetaBoxDisplay($post)
{
    $projectDetailsGroup = get_post_meta($post->ID, 'project_details_group', true);
    wp_nonce_field('aixor_repeatable_meta_box_nonce', 'aixor_repeatable_meta_box_nonce');
    ?>

    <table id="aixor-project-repeatable-fieldset" width="100%">
        <?php if ($projectDetailsGroup) { ?>
            <thead>
            <tr>
                <th><?php echo esc_html__('Sub Title', 'aixor-core'); ?></th>
                <th><?php echo esc_html__('Title', 'aixor-core'); ?></th>
                <th><?php echo esc_html__('Description', 'aixor-core'); ?></th>
            </tr>
            </thead>
        <?php } ?>
        <tbody>

        <script type="text/html" id="tmpl-repeater">
            <tr>
                <td width="25%">
                    <input type="text" placeholder="<?php echo esc_attr__('Sub Title', 'aixor-core'); ?>"
                           name="project_details_subtitle[]"/>
                </td>
                <td width="25%">
                    <input type="text" placeholder="<?php echo esc_attr__('Title', 'aixor-core'); ?>"
                           name="project_details_title[]"/>
                </td>
                <td>
                    <textarea placeholder="<?php echo esc_attr__('Description', 'aixor-core'); ?>" name="project_details_description[]"></textarea>
                </td>
                <td width="15%"><a class="button remove-row"
                                   href="#"><?php echo esc_html__('Remove', 'aixor-core'); ?></a></td>
            </tr>
        </script>
        <?php
        if ($projectDetailsGroup) :
            foreach ($projectDetailsGroup as $field) {
                ?>
                <tr>
                    <td width="25%">
                        <input type="text" placeholder="<?php echo esc_attr__('Sub Title', 'aixor-core'); ?>"
                               name="project_details_subtitle[]"
                               value="<?php if ($field['project_details_subtitle'] != '') echo esc_attr($field['project_details_subtitle']); ?>"/>
                    </td>
                    <td width="25%">
                        <input type="text" placeholder="<?php echo esc_attr__('Title', 'aixor-core'); ?>"
                               name="project_details_title[]"
                               value="<?php if ($field['project_details_title'] != '') echo esc_attr($field['project_details_title']); ?>"/>
                    </td>
                    <td>
                        <textarea placeholder="Description" name="project_details_description[]"><?php if ($field['project_details_description'] != '') echo esc_attr($field['project_details_description']); ?></textarea>
                    </td>
                    <td width="15%"><a class="button remove-row" href="#"><?php echo esc_html__('Remove', 'aixor-core'); ?></a></td>
                </tr>
                <?php
            }
        endif; ?>
        </tbody>
    </table>
    <div class="add-new-row-wrap"><a id="aixor_add_row" class="button" href="#"><?php echo esc_html__('Add another', 'aixor-core'); ?></a></div>

    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", function () {
            // Add row functionality
            document.getElementById("aixor_add_row").addEventListener("click", function (e) {
                e.preventDefault();
                var template = wp.template('repeater');
                var html = template();
                document.querySelector("#aixor-project-repeatable-fieldset tbody").insertAdjacentHTML('beforeend', html);
            });

            // Remove row functionality
            document.querySelectorAll('.remove-row').forEach(function (element) {
                element.addEventListener("click", function (e) {
                    e.preventDefault();
                    console.log('hit');
                    this.closest('tr').remove();
                });
            });
        });

    </script>
    <?php
}


// Save Meta Box Data
function aixorSaveProjectsMetaBox($post_id)
{
    // Verify nonce
    if (!isset($_POST['aixor_repeatable_meta_box_nonce']) || !wp_verify_nonce($_POST['aixor_repeatable_meta_box_nonce'], 'aixor_repeatable_meta_box_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (isset($_POST['post_type']) && 'project' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // Sanitize and save fields
    if (isset($_POST['info_subtitle'])) {
        update_post_meta($post_id, 'info_subtitle', sanitize_text_field($_POST['info_subtitle']));
    }
    if (isset($_POST['info_title'])) {
        update_post_meta($post_id, 'info_title', sanitize_text_field($_POST['info_title']));
    }
    if (isset($_POST['description_title'])) {
        update_post_meta($post_id, 'description_title', sanitize_text_field($_POST['description_title']));
    }
    if (isset($_POST['info_description'])) {
    update_post_meta($post_id, 'info_description', wp_kses_post($_POST['info_description']));
    }
    if (isset($_POST['industry_title'])) {
        update_post_meta($post_id, 'industry_title', sanitize_text_field($_POST['industry_title']));
    }
    if (isset($_POST['info_industry'])) {
        update_post_meta($post_id, 'info_industry', sanitize_text_field($_POST['info_industry']));
    }
    if (isset($_POST['release_title'])) {
        update_post_meta($post_id, 'release_title', sanitize_text_field($_POST['release_title']));
    }
    if (isset($_POST['info_release_date'])) {
        update_post_meta($post_id, 'info_release_date', sanitize_text_field($_POST['info_release_date']));
    }


    $old = get_post_meta($post_id, 'project_details_group', true);
    $new = array();
    $projectDetailsTitle = $_POST['project_details_title'];
    $projectDetailsSubTitle = $_POST['project_details_subtitle'];
    $projectDetailsDescription = $_POST['project_details_description'];

    $count = count($projectDetailsTitle);

    for ($i = 0; $i < $count; $i++) {
        if ($projectDetailsTitle[$i] != '') :
            $new[$i]['project_details_subtitle'] = stripslashes($projectDetailsSubTitle[$i]);
            $new[$i]['project_details_title'] = stripslashes(strip_tags($projectDetailsTitle[$i]));
            $new[$i]['project_details_description'] = stripslashes($projectDetailsDescription[$i]);

        endif;
    }

    if (!empty($new) && $new != $old) {
        update_post_meta($post_id, 'project_details_group', $new);
    } elseif (empty($new) && $old) {
        delete_post_meta($post_id, 'project_details_group', $old);
    }
}

add_action('save_post_project', 'aixorSaveProjectsMetaBox');


function aixorCustomAdminCSS()
{
    ?>
    <style>
        .aixor-project-infos-fields {
            gap: 10px;
        }
        .aixor-project-infos-fields .aixor-project-info-box,
        .aixor-project-infos-fields {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }
        .aixor-project-infos-fields .aixor-project-info-box input,
        .aixor-project-infos-fields .aixor-project-info-box textarea {
            width: 100%;
        }
        .aixor-project-infos-fields .aixor-project-info-box label {
            color: #0a0a0a;
            display: block;
            margin-bottom: 4px;
        }

        #aixor-project-repeatable-fieldset {
            border-spacing: 0;
            border-collapse: collapse;
        }
        #aixor-project-repeatable-fieldset tr td input,
        #aixor-project-repeatable-fieldset tr td textarea {
            width: 100%;
            min-height: 38px;
            height: 38px;
            margin: 0;
            border-radius: 6px;
            padding: 10px 15px;
            line-height: 1.5;
        }
        #aixor-project-repeatable-fieldset tr td textarea {
            padding-top: 7px;
        }
        #aixor-project-repeatable-fieldset thead tr th {
            text-align: left;
            font-size: 16px;
        }
        #aixor-project-repeatable-fieldset tr th,
        #aixor-project-repeatable-fieldset tr td {
            padding: 6px 15px;
        }
    </style>
    <?php
}
add_action('admin_head', 'aixorCustomAdminCSS');