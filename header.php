<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <?=wp_head();?>
</head>
<body>

<header>
    <section id="search">
        <div class="container">
            Search
        </div>    
    </section>
    <section id="top-bar">
        <div class="container">
            <div class="row">
                <div class="brand col-3">logo</div>
                <div class="second-column col-9">
                    <div class="account">cuenta</div>
                    <div class="main-menu">
                        <?php 
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'info_basic_main_menu'
                                )
                            );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>