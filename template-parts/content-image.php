<article id="post- <?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
        <?php phungdat_thumbnail( 'large' ); ?>
        <?php phungdat_entry_header(); ?>
        <?php 
            $attachment = get_children( array( 'post_parent' => $post->ID ) );
            $attachment_number = count( $attachment );
            printf( __( 'This image post contains %1$s photo' , 'phungdat' ) , $attachment_number );
         ?>
    </div>
    <div class="entry-content">
        <?php phungdat_entry_content(); ?>
        <?php (is_single() ? phungdat_entry_tag() : '' ); ?>
    </div>
    
</article>