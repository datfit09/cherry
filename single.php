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

                                is_single() ? phungdat_entry_tag() : '';
                                
                            endwhile;
                        else:
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>
                    </div>
                </div>

                <div id="sidebar" class="col-md-4 slide-bar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>