<?php
/**
 * @Packge     : Aixor
 * @Version    : 1.0
 * @Author     : Aixor
 * @Author URI : https://themeforest.net/user/widethemes/portfolio
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

if( ! function_exists('aixor_get_user_role_name') ){
    function aixor_get_user_role_name( $user_ID ){
        global $wp_roles;

        $user_data      = get_userdata( $user_ID );
        $user_role_slug = $user_data->roles[0];
        return translate_user_role( $wp_roles->roles[$user_role_slug]['name'] );
    }
}



add_image_size( 'aixor_80X80', 80, 80, true );
add_image_size( 'aixor_432x324', 432, 324, true );
// add_image_size( 'aixor_372X279', 372, 279, true );
// add_image_size( 'aixor_800X600', 800, 600, true );

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );