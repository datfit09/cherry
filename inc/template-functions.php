<?php// function tieu de contentif ( ! function_exists( 'phungdat_post_title' ) ) {    function phungdat_post_title() {        ?>        <h2 class="blog-post-title blog-single">            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>        </h2>        <?php    }}// function anh content.if ( ! function_exists( 'phungdat_post_thumbnail' ) ) {    function phungdat_post_thumbnail() {        ?>        <a href="<?php the_permalink(); ?>" class="post-thumbnail-image">            <?php the_post_thumbnail(); ?>        </a>        <?php    }}// function content.if ( ! function_exists( 'phungdat_post_content' ) ) {    function phungdat_post_content() {        if ( is_singular( 'post' ) ) {        ?>            <div class="summary">                   <?php                 the_content();                $link_pages = array(                    'before'           => __( ' <p>Page: ' , 'phungdat' ),                    'after'            => '</p>;',                    'nextpagelink'     => __( 'Next page' , 'phungdat' ),                    'previouspagelink' => __( 'Previous page' , 'phungdat' )                );                wp_link_pages( $link_pages );                ?>            </div>        <?php        }    }} // function post author.if ( ! function_exists( 'phungdat_post_author' ) ) {    function phungdat_post_author() {        if ( is_singular( 'post' ) ) {            get_template_part( 'author-bio' );        }    }}// function post meta : date, comment. if ( ! function_exists( 'phungdat_entry_meta' ) ) {    function phungdat_entry_meta() {        if ( 'link' == get_post_format() ) {            return;        }        ?>        <?php if ( ! is_singular( 'post' ) ) : ?>            <div class="blog-info blog">                <li><?php                    printf( __( '<span class="date_published"><span class="fa fa-calendar"></span> %1$s' , 'phungdat' ),                        get_the_date() );                ?></li>                <li><?php                     if ( comments_open() ):                        echo '<span class="meta-reply"><span class="fa fa-comments-o"></span>';                            comments_popup_link(                                __( 'Leave a comment', 'phungdat' ),                                __( 'One comment', 'phungdat' ),                                __( '% comments', 'phungdat' ),                                __( 'Read all comments', 'phungdat' )                            );                        echo '</span>';                    endif;                ?></li>            </div>        <?php endif; ?>    <?php }}// function paginationif ( ! function_exists( 'phungdat_pagination' ) ) {    function phungdat_pagination() {    ?>    <div class="pagination">        <div class="pagination-previous">            <?php previous_posts_link(); ?>        </div>        <div class="pagination-next">            <?php next_posts_link(); ?>        </div>    </div>    <?php    }}