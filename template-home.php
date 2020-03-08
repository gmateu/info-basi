<?php
/*
Template Name: Home Page
*/

echo get_header();
?>
    
    <div class="content-area">
        <div id="main">
            <section class="slider">
                <div class="container">
                    <div class="row">
                        slider
                    </div>
                </div>    
            </section>
            <section class="popular-products">
                <div class="container">
                    <div class="row">
                        productos populares
                    </div>
                </div>
            </section>
            <section class="new-arrivals">
                <div class="container">
                    <div class="row">
                        novedades
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