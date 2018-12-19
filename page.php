<?php get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="col-md-8 blog">
                    <div id="main-content">
                        <?php
                        if( have_posts() ) :
                            while( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content' , get_post_format() );
                                
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }
                            endwhile;
                        else:
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>