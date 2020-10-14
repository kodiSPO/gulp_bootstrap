<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div class="container">
    <div class="row">
        <div class="col">


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <?php
                    if (has_nav_menu('main_nav')) {
                        wp_nav_menu(array(
                            'container'      => false,
                            'fallback_cb'    => false,
                            'walker'         => new BootstrapWalker(),
                            'theme_location' => 'main_nav',
                            'items_wrap'     => '
                                <ul class="navbar-nav ml-auto" 
                                    data-hover="true" 
                                    data-detect-overflow="true" 
                                    data-copy-parent-link="true"
                                >%3$s</ul>',
                        ));
                    }
                    ?>

                </div>
            </nav>







        </div>
    </div>
</div>






    <div class="main-wrapper">
        <div class="header">














        </div>
        <div class="header-placeholder"></div>
