<?php

/**
 * The archive.php for our theme
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

<div class="jumbotron">
        <h1><?php the_archive_title()?></h1>
        <p><?php the_archive_description()?></p>
    </div>
    
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
                                    <h2 class="display-5"><a href="<?=the_permalink()?>"><?=the_title()?></a></h2>
                                    <div class="metabox">
                                        <p>Posted by <?=the_author_posts_link()?> on <?=the_time('Y-n-j')?> in <?=get_the_category_list(', ')?></p>
                                    </div>
                                    <div class="contingu">
                                        <?=the_excerpt()?>
                                        <p>
                                            <a class="btn btn-sm btn-info" href="<?=the_permalink()?>">Continue reading &raquo;</a>
                                        </p>
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
echo get_footer();

?>