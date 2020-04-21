<?php
/*
Template Name: Home Page
*/

echo get_header();
?>
    
    <div class="content-area">
        <div id="main">
            <section class="slider">
                <?php
                    $post= get_page_by_title('slider');
                    $sliderPG=get_pages(array(
                        'child_of' => $post->ID,
                    ));
                    
                ?>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!--indicadors-->
                    <ol class="carousel-indicators">
                    <?php
                        $count=0;
                        foreach ($sliderPG as $p){
                    ?>
                        <li data-target="#carouselExampleControls" data-slide-to="<?=$count?>" class="active"></li>
                    <?php
                        $count++;
                      }
                    ?>
                    </ol> 
                    
                    
                    <!--imgatges-->
                    <?php
                        $active="active";
                        foreach ($sliderPG as $p){
                            echo get_the_title($p->ID);
                            ?>
                            <div class="carousel-item <?=$active?>">
                                <?php echo get_the_post_thumbnail($p->ID,'info_basic_slider',array('class' => 'img-fluid d-block w-100'))?>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?=$p->post_title?></h5>
                                    <p><?=$p->post_content?></p>
                                </div>
                            </div>
                            <?php
                            $active="";
                        }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </section>

            <?php if(class_exists('WooCommerce')):?>
            <section>
                <!--fet amb custom query-->
                <div class="container">
                    <div class="row">
                        <?php
                            $popularProducts=new WP_Query(array(
                                'posts_per_page'    => 4,
                                'post_type'         => 'product',
                                'meta_key'          => '_sale_price',
                            ));
                            ?>
                            <h2>On sale</h2>
                            <div class="woocommerce columns-4 ">
                                <ul class="products columns-4">
                            <?php
                            
                            while($popularProducts->have_posts()){
                                $popularProducts->the_post(); 
                                wc_get_template_part('content','product');
                                    
                            }
                        ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section><!--popular-products-->

            <!--<section>
                <?php
                $popular_limit = get_theme_mod('set_popular_max_num',4);
                $popular_col = get_theme_mod('set_popular_max_col',4);
                $arrival_limit = get_theme_mod('set_new_arrivals_max_num',4);
                $arrival_col = get_theme_mod('set_new_arrivals_max_col',4);
                ?>
            
                <div class="container">
                    <div class="row">
                        <h2>productos populares</h2>
                        <?php echo do_shortcode('[products limit="'.$popular_limit.'" columns="'.$popular_col.'" orderby="popularity"]')?>
                    </div>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <div class="row">
                        <h2>Novedades</h2>
                        <?php echo do_shortcode('[products limit="'.$arrival_limit.'" columns="'.$arrival_col.'" orderby="date"]')?>
                    </div>
                </div>
            </section>-->
            <?php
            $showdeal			= get_theme_mod( 'set_deal_show', 0 );
            $deal 				= get_theme_mod( 'set_deal' );
            $currency			= get_woocommerce_currency_symbol();
            $regular			= get_post_meta( $deal, '_regular_price', true );
            $sale 				= get_post_meta( $deal, '_sale_price', true );

            if( $showdeal == 1 && ( !empty( $deal ) ) ):
                ?>
            <section class="deal-of-the-week">
                <div class="container">
                    <h3>Deal of the week</h3>
                    <div class="row d-flex aling-items-center">
                        <div class="deal-img col-md-6 col-12 ml-auto text-center">
                            <?php echo get_the_post_thumbnail($deal,'large',array('class'=>'img-fluid'));?>
                        </div>
                        <div class="deal-desc col-md-4 col-12 mr-auto text-center">
                            <?php if(!empty($sale)):
                                $discount_percentage = absint( 100 - ( ( $sale/$regular ) * 100 ) );
                            ?>
                            <span class="discount">
                                <?php echo "$discount_percentage % OFF"; ?>
                            </span>
                            <?php endif;?>
                            <h3>
                                <a href="<?php echo get_the_permalink($deal);?>"><?php echo get_the_title($deal)?></a>
                            </h3>
                            <p><?php echo get_the_excerpt($deal)?></p>
                            <div class="princes">
                                <span class="regular">
                                    <?php
                                        echo $currency;
                                        echo $regular;
                                    ?>
                                </span>
                                <?php if(!empty($sale)):?>
                                <span class="sale">
                                    <?php 
                                        echo $currency;
                                        echo $sale;
                                    ?>
                                </span>
                                <?php endif;?>
                            </div>
                            <a href="<?php echo esc_url('?add-to-cart='.$deal);?>">Add to cart</a>
                        </div>
                    </div>
                </div>
            </section>
                <?php endif;?>
            <?php endif;?>
            <section class="info-blog">
                <div class="container">
                    <h3>From our blogs</h3>
                    <div class="summary-posts">
                        <?php
                        $homepagePosts = new WP_Query(array(
                            'posts_per_page' => 1,
                        ));
                        while($homepagePosts->have_posts()){
                            $homepagePosts->the_post();
                            ?>
                            <div class="home-post">
                                <h4><a href="<?=the_permalink()?>"><?=the_title()?></a></h4>
                                <span class="data"><?php the_time('d-M-Y')?></span>
                                <p><?=wp_trim_words(get_the_excerpt(),18)?>
                            </p>
                            <a href="<?=the_permalink()?>">Read more</a>
                            </div>
                            <hr>
                        <?php
                        }
                        wp_reset_postdata();
                    ?>
                        <p class="text-center"><a href="<?=site_url('/blog')?>" class="btn btn-lg btn-info">Verue posts</a></p>
                    </div><!--sumamry posts-->
                </div>
            </section>
        </div>
    </div>
<?php
echo get_footer(  );
?>