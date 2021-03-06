<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Info Basic
 * @since 1.0.0
 */
echo get_header();
?>
    
    <div class="content-area">
        <div id="main">
            
            <section class="info-blog">
                <div class="container">
                    <div class="row">
                        <?php
                            if(have_posts()){
                                while(have_posts()){
                                    the_post();
                                ?>
                                <article class="col">
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