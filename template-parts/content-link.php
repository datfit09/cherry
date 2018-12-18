<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-6';
}
?>

<article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <div class="blog-follow">
        <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <a href="<?php the_permalink(); ?>" class="link-follow">
            <span class="fa fa-link"></span>
            <?php the_permalink(); ?>
        </a>

        <?php
            the_post_thumbnail();

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
    </div>

</article>