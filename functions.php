<?php


function info_basic_scripts(){
    wp_enqueue_script( 'bootstrap-ls', get_theme_file_uri('/js/inc/bootstrap.min.js'), array('jquery'), 'carrio4.4.1',true );
    wp_enqueue_style( 'bootstarp-css', get_theme_file_uri('/css/bootstrap.min.css'), array(),'1.0','all' );
    wp_enqueue_style( 'info-basic-style', get_stylesheet_uri(), array(),filemtime(get_template_directory().'/style.css'),'all' );
    wp_enqueue_style('font-awesom','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('custom-google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}

add_action( 'wp_enqueue_scripts', 'info_basic_scripts');

function info_basic_config(){
    register_nav_menus( 
        array(
            'info_basic_main_menu'  => 'Info Basic Main Menu',
            'info_basic_footer_menu' => 'Info Basic Footer Menu',
        )
        );

        add_theme_support('woocommerce',array(
            'thumbnail_image_width'     => 255,
            'single_image_width'        => 255,
            'product_grid'              => array(
                    'default_rows'    => 10,
                    'min_rows'        =>  5,
                    'max_rows'        => 10,
                    'default_columns' =>  1,
                    'min_columns'     =>  1,
                    'max_columns'     =>  10, 
            ),
        ));
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support( 'wc-product-gallery-slider' );

        if ( ! isset( $content_width ) ) {
            $content_width = 600;
        }
}

add_action( 'after_setup_theme', 'info_basic_config', 0 );


//woocommerce
function info_basic_open_container_row(){
    ?>
        <div class="container"><div class="row">
    <?php
}
add_action('woocommerce_before_main_content', 'info_basic_open_container_row',5);



function info_basic_close_container_row(){
    ?>
        </div></div>
    <?php
}
add_action('woocommerce_after_main_content', 'info_basic_close_container_row', 5);
?>