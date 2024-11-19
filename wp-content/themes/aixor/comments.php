<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * /*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required())
    return;
?>
<?php if (have_comments()) : ?>
    <div class="comment-lists-wrap">
        <h3 class="title-with-circle section-subtitle">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/subtitle-shape.svg'; ?>" alt="icon">
            <?php comments_number(esc_html__('0 Comment', 'aixor'), esc_html__('1 Comment', 'aixor'), esc_html__('% Comments', 'aixor')); ?>
        </h3>
        <div class="comment-lists">
            <?php wp_list_comments('callback=aixor_theme_comment'); ?>
        </div>
    </div>

    <?php
// Are there comments to navigate through?
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
        <div class="text-center">
            <ul class="pagination">
                <li>
                    <?php //Create pagination links for the comments on the current post, with single arrow heads for previous/next
                    paginate_comments_links(
                        array(
                            'prev_text' => wp_specialchars_decode('<i class="fa fa-angle-left"></i>', ENT_QUOTES),
                            'next_text' => wp_specialchars_decode('<i class="fa fa-angle-right"></i>', ENT_QUOTES),
                        )); ?>
                </li>
            </ul>
        </div>
    <?php endif; // Check for comment navigation ?>
    <?php if (!comments_open() && get_comments_number()) : ?>
        <p class="no-comments"><?php echo esc_html__('Comments are closed.', 'aixor'); ?></p>
    <?php endif; ?>
<?php endif; ?>

<?php
if (is_singular()) wp_enqueue_script("comment-reply");
$aria_req = ($req ? " aria-required='true'" : '');
$comment_args = array(
    // 'id_form' => 'commentform',
    'class_form' => 'comment-form',
    'title_reply_before' => '<h3 class="title-with-circle section-subtitle"><img src="' . get_template_directory_uri() . '/assets/images/subtitle-shape.svg" alt="icon">',
    'title_reply'        => esc_html__('Leave A Comment', 'aixor'),
    'title_reply_after'  => '</h3>',
    'fields'             => apply_filters('comment_form_default_fields', array(
        'cookies' => '',
        'author'  => '<div class="form-col-2">',

        'Name' => '
                <div class="input-group">
                <!-- Name -->
                <input id="author" name="author" type="text" placeholder="' . esc_attr__('Name', 'aixor') . '" required="required" >
                </div>',

        'Email' => '
                <div class="input-group">
                    <!-- Email -->
                    <input id="email" name="email" type="email" placeholder="' . esc_attr__('Email', 'aixor') . '" required="required">
                    </div>
                </div>',

    )),

    'comment_field' => '
                <div class="input-group">
                    <textarea name="comment"' . $aria_req . '  placeholder="' . esc_attr__('Your Comment', 'aixor') . '"></textarea>
                </div>',

    'label_submit'         => '' . esc_attr__('Post Comment', 'aixor') . '',
    'comment_notes_before' => '',
    'submit_button' => '<div class="input-group">
                    <button name="%1$s" type="submit" id="%2$s" class="submit-comment-btn theme-btn %3$s" value="%4$s">%4$s<img src="' . get_template_directory_uri() . '/assets/images/btn-arrow.svg" alt="icon"></button>
                        </div>',
    'comment_notes_after'  => '',
)
?>


<?php if (comments_open()) : ?>
    <div class="comment-form-wrap">
        <?php comment_form($comment_args); ?>
    </div>
<?php endif; ?>

<!-- End Comments Form -->

