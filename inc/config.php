<?php
// Disable use XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Remove WP version from meta tags and form the XML feeds
add_filter('the_generator', '__return_empty_string');

// Disable fullscreen mode by default
add_action( 'enqueue_block_editor_assets', function() {
    $script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
    wp_add_inline_script( 'wp-blocks', $script );
});

// Theme supports
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Remove unnecessary resources
add_action('wp_enqueue_scripts', function() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        wp_deregister_script('jquery');
    }
}, 5);

// GF: Add support to hide field labels
add_filter('gform_enable_field_label_visibility_settings', '__return_true');

// GF: Disable Automatic Scrolling On All Forms
add_filter( 'gform_confirmation_anchor', '__return_false' );

// ACF: Register options page
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

}
