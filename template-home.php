<?php
/*
Template Name: Home Page
*/

echo get_header();
?>
    
    <div class="content-area">
        <div id="main">
            <section class="slider">
                <div class="flexslider" style="direction:rtl">
                    <ul class="slides">
                        <?php 
                            
                            for ($i=1;$i<=3;$i++){
                                $slider_page[$i]        = get_theme_mod('set_slider_page'.$i);
                                $slider_button_text[$i] = get_theme_mod('set_slider_button_text'.$i);
                                $slider_button_url[$i]  = get_theme_mod('set_slider_button_url'.$i);

                            }
                            $args = array(
                                'post_type'         => 'page',
                                'posts_per_page'    => 3,
                                'posts__in'         => $slider_page,
                                'orderby'           => 'posts__in',

                            );

                            $slider_loop = new WP_Query($args);
                            if($slider_loop->have_posts()){
                                $count=1;
                                while($slider_loop->have_posts()){
                                    $slider_loop->the_post();
                                    ?>
                                    <li>
                                        <?php the_post_thumbnail('info_basic_slider',array('class' => 'img-fluid'));?>
                                        <div class="container">
                                            <div class="slider-details-container">
                                            <div class="slider-title">
                                                <h1><?php the_title()?></h1>
                                            </div>
                                            <div class="slider-description">
                                                <div class="subtitle">
                                                    <?php the_content()?>
                                                </div>
                                                <a href="<?php echo $slider_button_url[$count]?>" class="link"><?php echo $slider_button_text[$count]?></a>
                                                <?php $count++;?>
                                            </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            wp_reset_postdata();
                        ?>
                    </ul>
                </div> 
            </section>
            <section class="popular-products">
                <?php
                $popular_limit = get_theme_mod('set_popular_max_num',4);
                $popular_col = get_theme_mod('set_popular_max_col',4);
                $arrival_limit = get_theme_mod('set_new_arrivals_max_num',4);
                $arrival_col = get_theme_mod('set_new_arrivals_max_col',4);
                ?>
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
            </section>
            <section class="deal-of-the-week">
                <div class="container">
                    <div class="row">
                        oferta semanal
                    </div>
                </div>
            </section>
            <section class="info-blog">
                <div class="container">
                    <div class="row">
                        <?php
                            if(have_posts()){
                                while(have_posts()){
                                    the_post();
                                ?>
                                <article>
                                    <h2><?=the_title()?> </h2>
                                    <div class="contingu">
                                        <?=the_content()?>
                                    </div>
                                </article>
                                <?php 
                                }
                            }else{
                                ?>
                            <p>Nada que ver</p>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php
echo get_footer(  );
?>