<?php

function info_basic_wc_modify(){

    //woocommerce
    add_action('woocommerce_before_main_content', 'info_basic_open_container_row',5);
    function info_basic_open_container_row(){
        ?>
            <div class="container shop-content"><div class="row">
        <?php
    }
    //HEM AFEGIT EL CONTAINER I EL ROW BEFORE MAIN CONENTN AMB PRIORITAT 5
    
    add_action('woocommerce_after_main_content', 'info_basic_close_container_row', 5);
    function info_basic_close_container_row(){
        ?>
            </div></div>
        <?php
    }
    //AFEGIM EL TANCADOR DEL CONTAINER
    
    
    
    if(is_shop()){
        //els clas per l'ordre i les columnes
        add_action('woocommerce_before_main_content','info_basic_add_sidebar_tags',6);
        function info_basic_add_sidebar_tags(){
            ?>
                <div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">
            <?php
        }

        //ARA HEM DE CANVIAR EL SIDEBAR DE LLOC, PRIMER FEM UN REMOVE D'AQUÍ ON EL TENIM
        remove_action('woocommerce_sidebar','woocommerce_get_sidebar');
        //i el posam on voelm
        add_action('woocommerce_before_main_content','woocommerce_get_sidebar',7);
        
        //tancam el div sidebar-shop 
        add_action('woocommerce_before_main_content', 'info_basic_close_sidebar_tags',8);
        function info_basic_close_sidebar_tags(){
            ?>
            </div>
            <?php
        }
    }
    
    //ara hem de posar els estils de columna al main 
    add_action('woocommerce_before_main_content', 'info_basic_add_shop_tags',9);
    function info_basic_add_shop_tags(){
        if (is_shop()){
            ?>
                <div class="sidebar-shop col-lg-9 col-md-8 order-1 order-md-2">
            <?php
        }else{
            ?>
                <div class="col">
            <?php

        }
    }
    //i les tancam després del man content amb prioritat 4 pq la 5 tanca el row i el container
    add_action('woocommerce_after_main_content', 'info_basic_close_shop_tags', 4);
    function info_basic_close_shop_tags(){
        ?>
            </div>
        <?php
    }
    
    //afegim un filtre per modificar el títol
    /*add_filter('woocommerce_show_page_title','info_basic_page_title');
    function info_basic_page_title(){
        ?>
        <h1>Camaleon</h1>
        <?php
    
    }*/
    
    //eliminam el filtre
    /*add_filter('woocommerce_show_page_title','info_basic_remove_shop_title');
    function info_basic_remove_shop_title(){
       return false;
    
    }*/
    
    //afegim descripció breu del produte
    add_action('woocommerce_shop_loop_item_title','the_excerpt',5);

}

add_action('wp','info_basic_wc_modify');


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'info_basic_woocommerce_header_add_to_cart_fragment' );

function info_basic_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

