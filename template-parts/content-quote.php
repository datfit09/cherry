<?php$class = '';if ( ! is_singular( 'post' ) ) {    $class = 'col-md-6';}?><article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>    <div class="blog-follow">        <h2 class="blog-follow-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) , get_the_author_meta( 'user_nicename' ) ); ?>">            <?php the_author(); ?>        </a>        <?php            the_post_thumbnail();            if ( is_singular( 'post' ) ) {                the_content();            } else {                the_excerpt();            }        ?>       <?php       if ( is_singular( 'post' ) ) {            get_template_part( 'author-bio' );        }               ?>    </div></article>