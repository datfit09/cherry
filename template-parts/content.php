<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-6';
}
?>

<article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <?php do_action( 'phungdat_post' ); ?>
    <?php (is_single() ? phungdat_entry_tag() : '' ); ?>
</article>