<?php
require_once 'inc/config.php';
require_once 'inc/BootstrapWalker.php';

/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', function() {
    if (!is_admin()) {
        $dist    = get_template_directory_uri() . '/dist/';
        $version = '1.0.0';
        // css
        wp_enqueue_style('theme-css', $dist . 'theme.min.css', array(), $version);
        // js
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), null);
        wp_enqueue_script('theme-js', $dist . 'theme.min.js', array('jquery'), $version, true);
    }
});

/**
 * Enqueue admin scripts and styles
 */
//add_action( 'admin_enqueue_scripts', function() {
//    $url     = get_template_directory_uri() . '/admin/';
//    $version = '1.0.0';
//    wp_enqueue_style('admin-css', $url . 'admin.css', array(), $version);
//});

/**
 * Add custom image sizes
 */
// add_image_size('case-preview-865-450', 865, 450, true);

/**
 * Register navigation menus
 */
register_nav_menus(array(
    'main_nav'   => 'Main navigation',
//    'footer_nav'   => 'Footer navigation',
));

/**
 * Customize login screen
 */
//add_action( 'login_enqueue_scripts', function() { ?>
<!--    <style type="text/css">-->
<!--        .login {-->
<!--            background-color: #fff;-->
<!--        }-->
<!---->
<!--        .login #login h1 a {-->
<!--            background-image: url();-->
<!--            height: 52px;-->
<!--            background-position: center;-->
<!--            background-size: auto 100%;-->
<!--            background-repeat: no-repeat;-->
<!--            width: auto;-->
<!--        }-->
<!--    </style>-->
<?php //});
























