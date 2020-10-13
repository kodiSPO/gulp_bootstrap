<?php
require_once 'inc/wp_fixes.php';
require_once 'inc/BootstrapWalker.php';
require_once 'inc/enqueue.php';

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
 * Register ACF options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

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

/**
 * Dynamic submenu
 */
//add_filter('wp_get_nav_menu_items', function($items, $menu, $args) {
//    $child_items    = array();
//    $menu_order     = count($items);
//    $parent_item_id = 0;
//
//    foreach ($items as $item) {
//        if (in_array('menu-item-projects', $item->classes)) {
//            $parent_item_id = $item->ID;
//        }
//    }
//
//    if ($parent_item_id > 0) {
//        foreach (get_posts('post_type=projects_post_type&numberposts=-1&order=DESC') as $post) {
//            $post->menu_item_parent = $parent_item_id;
//            $post->post_type = 'nav_menu_item';
//            $post->object = 'custom';
//            $post->type = 'custom';
//            $post->menu_order = ++$menu_order;
//            $post->title = $post->post_title;
//            $post->url = get_permalink($post->ID);
//            array_push($child_items, $post);
//        }
//    }
//
//    return array_merge($items, $child_items);
//}, 10, 3 );

/**
 * Ajax handler - load_more_vacancies
 */
//if (!function_exists('load_more_vacancies')) {
//    add_action('wp_ajax_load_more_vacancies',        'load_more_vacancies');
//    add_action('wp_ajax_nopriv_load_more_vacancies', 'load_more_vacancies');
//
//    function load_more_vacancies() {
//        $paged          = intval(sanitize_text_field($_POST["paged"])) + 1;
//        $posts_per_page = intval(sanitize_text_field($_POST["posts_per_page"]));
//
//        $arg = array(
//            'post_type'        => 'vacancies',
//            'order'            => 'DESC',
//            'paged'            => $paged,
//            'posts_per_page'   => $posts_per_page,
//            'suppress_filters' => true,
//            'meta_query' => array(
//                array(
//                    'key'     => 'status',
//                    'value'   => 1,
//                    'compare' => '='
//                )
//            )
//        );
//
//        $response = array();
//
//        $the_query = new WP_Query($arg);
//
//        $no_more = ($paged == $the_query->max_num_pages) ? 1 : 0;
//        $content = '';
//
//        ob_start();
//
//        if ($the_query->have_posts()) :
//            while ( $the_query->have_posts() ) : $the_query->the_post();
//                echo get_template_part('parts/vacancy_loop_item');
//            endwhile;
//        endif; wp_reset_query();
//
//        $content = ob_get_contents();
//        ob_end_clean();
//
//        $response['content'] = $content;
//        $response['paged']   = $paged;
//        $response['no_more'] = $no_more;
//
//        echo wp_json_encode($response);
//        wp_die();
//    }
//}






















