<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <?=wp_head();?>
</head>
<body <?php body_class()?>>

<header>
    <section id="search">
        <div class="container">
            Search
        </div>    
    </section>
    <section id="top-bar">
        <div class="container">
            <div class="row">
                <div class="brand col-12 col-md-3 col-lg-2 text-center text-md-left">logo</div>
                <div class="second-column col-12 col-md-9 col-lg-10">
                    <div class="row">
                        <div class="account col-12">cuenta</div>
                        <div class="col-12">
                            <nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                        <?php
                                        wp_nav_menu( array(
                                            'theme_location'    => 'info_basic_main_menu',
                                            'depth'             => 3,
                                            'container'         => 'div',
                                            'container_class'   => 'collapse navbar-collapse',
                                            'container_id'      => 'bs-example-navbar-collapse-1',
                                            'menu_class'        => 'nav navbar-nav',
                                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                            'walker'            => new WP_Bootstrap_Navwalker(),
                                        ) );
                                        ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
                        