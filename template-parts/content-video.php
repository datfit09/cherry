<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-6';
}
?>

<article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <!-- 
        phungdat_post_title, 10
        phungdat_post_thumbnail, 20
        phungdat_entry_meta, 30
        phungdat_post_content, 40
        phungdat_post_author, 50
     -->
    <?php do_action( 'phungdat_post' ); ?>
</article>