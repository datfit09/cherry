<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-6';
}
?>

<article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <div class="blog-follow">
        <?php 
        do_action( 'phungdat_post' );
        ?>
    </div>
</article>