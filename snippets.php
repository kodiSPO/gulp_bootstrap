<?php
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

// --- HTML ---
// <div class="row vacancy-list"></div>
// <div id="load-more" paged="0" posts_per_page="6" status="ready"></div>

// --- JS ---
/*
** vacancies - load vacancies via ajax
*/
// function loadVacanciesViaAjax() {
//     let that           = $('#load-more');
//     let paged          = that.attr('paged');
//     let posts_per_page = that.attr('posts_per_page');
//     let status         = that.attr('status');
//
//     if (that.attr('status') !== 'ready') return false;
//
//     that.attr('status', 'loading');
//
//     $.ajax({
//         type : 'POST',
//         url  : document.location.origin + "/wp-admin/admin-ajax.php",
//         data : {
//             'action'        : 'load_more_vacancies',
//             'paged'         : paged,
//             'posts_per_page': posts_per_page,
//         },
//         dataType : 'JSON',
//         success: function(response) {
//             that.attr('paged', response.paged);
//
//             $('.vacancy-list').append(response.content);
//             initLazyLoad();
//
//             if (response.no_more) {
//                 that.attr('status', 'nomore');
//             } else {
//                 that.attr('status', 'ready');
//             }
//
//             // repeat
//             loadVacanciesOnScroll();
//         }
//     });
// }

/*
** vacancies - bind ajax load to scroll
*/
// function loadVacanciesOnScroll() {
//     let scrollTop    = $(window).scrollTop();
//     let windowHeight = $(window).height();
//     if ($('#load-more').length && (scrollTop + windowHeight) > $('#load-more').offset().top) {
//         loadVacanciesViaAjax();
//     }
// }
// loadVacanciesOnScroll(); $(window).scroll(function() { loadVacanciesOnScroll(); });

