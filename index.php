<?php

/**
 * The index.php for our theme
 *
* This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

echo get_header();
?>
    
    <div class="content-area">
        <div id="main">
            <section class="info-blog">
                <div class="container">
                        <?php
                            if(have_posts()){
                                while(have_posts()){
                                    the_post();
                                ?>
                                <article>
                                    <h2><?=the_title()?> </h2>
                                    <div class="contingu">
                                        <?=the_excerpt()?>
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
            </section>
        </div>
    </div>
<?php
echo get_footer(  );
?>