<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-6';
}
?>

<article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <div class="blog-post">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
        <?php
            if ( is_singular( 'post' ) ) {
                the_content();
            } else {
                the_excerpt();
            }
        ?>

       <?php
        if ( is_singular( 'post' ) ) {
            get_template_part( 'author-bio' );
        }       
        ?>

        <h2 class="blog-post-title blog-single">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <?php phungdat_blog_info(); ?>
    </div>
</article>