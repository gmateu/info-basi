<?php

/**
 * The single.php for our theme
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

<?php
    if(have_posts()){
        while(have_posts()){
            the_post();
?>
    
<div class="jumbotron">
    <h1><?=the_title()?></h1>
    <p>Canviar</p>
</div>

<div class="content-area">
        <div id="main">
            <section class="info-blog">
                <div class="container">
                            <?php
                                ?>
                                <article>
                                    <div class="metabox">
                                        <p>
                                            <a href="<?=site_url('/blog')?>">Blog Home</a>
                                            Posted by <?=the_author_posts_link()?> on <?=the_time('Y-n-j')?> in <?=get_the_category_list(', ')?>
                                        </p>    
                                    </div>
                                    <div class="contingu">
                                        <?=the_content()?>
                                    </div>
                                </article>
                                <hr>
                                <?php 
                                }
                                echo paginate_links();
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

    get_footer();
?>