<?php get_header(); ?>
<div id="main">
    <div class="container">
        <div class="row">
            <div class="search-page">
                <div class="col-md-8 blog">
                    <div id="main-content">
                        <div class="search-info">
                            <section id="primary" class="content-area">
                                <main id="main" class="site-main" role="main">

                                <?php if ( have_posts() ) : ?>

                                    <header class="page-header">
                                        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                                    </header><!-- .page-header -->

                                    <?php
                                    // Start the loop.
                                    while ( have_posts() ) : the_post();

                                        /**
                                         * Run the loop for the search to output the results.
                                         * If you want to overload this in a child theme then include a file
                                         * called content-search.php and that will be used instead.
                                         */
                                        get_template_part( 'template-parts/content', 'search' );

                                    // End the loop.
                                    endwhile;

                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'twentysixteen' ),
                                        'next_text'          => __( 'Next page', 'twentysixteen' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
                                    ) );

                                // If no content, include the "No posts found" template.
                                else :
                                    get_template_part( 'template-parts/content', 'none' );

                                endif;
                                ?>

                                </main><!-- .site-main -->
                            </section><!-- .content-area -->
                        </div>
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