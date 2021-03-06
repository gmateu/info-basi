<?php


require get_template_directory().'/lib/class-wp-bootstrap-navwalker.php';
require get_template_directory().'/lib/customizer.php';


function info_basic_scripts(){
    wp_enqueue_script( 'bootstrap-ls', get_theme_file_uri('/js/inc/bootstrap.min.js'), array('jquery'), 'carrio4.4.1',true );
    wp_enqueue_style( 'bootstarp-css', get_theme_file_uri('/css/bootstrap.min.css'), array(),'1.0','all' );
    wp_enqueue_style( 'info-basic-style', get_stylesheet_uri(), array(),filemtime(get_template_directory().'/style.css'),'all' );
    wp_enqueue_style('font-awesom','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');


    //GOOGLE FONTS
    wp_enqueue_style('custom-google-fonts','https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700|Seaweed+Script');

    //FLEX SLIDER
    wp_enqueue_script('flex_slider_js',get_template_directory_uri().'/inc/flexslider/jquery.flexslider.js',array('jquery'),'',true);
    wp_enqueue_script('flex_slider_js_2',get_template_directory_uri().'/inc/flexslider/flexslider.js',array('jquery'),'',true);
    wp_enqueue_style('flex_slider_css',get_template_directory_uri().'/inc/flexslider/flexslider.css',array(),'','all');
}

add_action( 'wp_enqueue_scripts', 'info_basic_scripts');

function info_basic_config(){
    register_nav_menus( 
        array(
            'info_basic_main_menu'  => 'Info Basic Main Menu',
            'info_basic_footer_menu' => 'Info Basic Footer Menu',
        )
        );

	add_theme_support( 'post-thumbnails' );

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

        add_theme_support( 'custom-logo' ,array(
            'height' => 85,
            'width'  => 160,
            'flex_height'=>true,
            'flex_width'=>true,
        ));

        //un image custom size
        add_image_size('info_basic_slider',1920,800,array('center','center'));


        if ( ! isset( $content_width ) ) {
            $content_width = 600;
        }
}

add_action( 'after_setup_theme', 'info_basic_config', 0 );

if(class_exists('woocommerce')){

    require get_template_directory().'/lib/wc_modifications.php';
}




//custom post types
add_action( 'init', 'infobasic_post_types' );
function infobasic_post_types(){
    register_post_type( 'cicles', array(
        'public' => true,
        'labels' => array(
            'name'          => 'Cicles',
            'add_new_item'  => 'Afegeix cicle',
            'edit_item'     => 'Edita cicle',
            'all_items'     => 'Tots els cicles',
            'singular_name' => 'Cicle'
        ),
        'supports' => array('title', 'editor', 'custom-fields', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-awards',
        'show_in_rest' => true,
    ));
}



