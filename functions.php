<?php 
/*
Khai bao hang gia tri
    @ THEME_URI = lay duong dan thu muc theme
    @ CORE = lay duong dan thu muc /core
*/
define( 'THEME_URI', get_template_directory_uri() . '/' );
define( 'THEME_DIR', get_template_directory() . '/' );

// Chi duong dan do_action den Template hooks 
require_once THEME_DIR . 'inc/template-hooks.php';


require_once THEME_DIR . 'inc/customizer.php';

/*
@ Thiet lap chieu rong noi dung
*/ 
if ( !isset( $content_with ) ){
    $content_with = 1200;
}

/*
@ Khai bao chuc nang cua theme
*/ 
if ( ! function_exists( 'phungdat_theme_setup' ) ) {
    function phungdat_theme_setup() {

        /* Thiet lap textdomain */ 
        $language_folder = THEME_DIR . 'language';
        load_theme_textdomain( 'phungdat', $language_folder );

        /* Tu dong them link RSS len <header> */
        add_theme_support( 'automatic-feed-links' );

        /* Them post thumbnail */
        add_theme_support( 'post-thumbnails' );


        /* Them custumer logo */
        add_theme_support(
            'custom-logo' ,
            array(
                'height'      => 100,
                'width'       => 400,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array( 'site-title', 'site-description' ),
            )
        );

        /* Post formats */
        add_theme_support( 'post-formats' , array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ) );

        /* Them title-tag */
        add_theme_support( 'title-tag' );

        /* Them custom background */
        $default_background = array(
            'default_background' => '#e8e8e8',
        );
        add_theme_support( 'custom-background', $default_background );
    }
    add_action( 'after_setup_theme', 'phungdat_theme_setup' );
}


/* Them menu */
function register_my_menus() {
  register_nav_menus(
    array('primary-menu' => __( 'Primary Menu', 'phungdat' ) )
  );
}
add_action( 'init', 'register_my_menus' );

/* --------------Template function--------------------------- */

if ( ! function_exists( 'phungdat_header' ) ){
    function phungdat_header() { ?>
        <div class="site-name">
            <?php 
                if ( is_home() ){
                    printf( 
                        '<h1> <a href="%1$s" title="%2$s"> %3$s </a></h1>',
                        get_bloginfo( 'url' ),
                        get_bloginfo( 'description' ),
                        get_bloginfo( 'sitename' )
                    );
                } else {
                    printf( 
                        '<p> <a href="%1$s" title="%2$s"> %3$s </a> </p>',
                        get_bloginfo( 'url' ),
                        get_bloginfo( 'description' ),
                        get_bloginfo( 'sitename' )
                    );
                }
            ?>
        </div>
        <div class="site-description">
            <?php bloginfo( 'description' ); ?>
        </div> <?php
    }
}

/*-----------------Thiet lap menu ------------------------------*/

if ( ! function_exists( 'phungdat_menu' ) ) {
    function phungdat_menu( $menu ) {
        $menu = array(
            'theme_location'  => $menu,
            'container'       => 'nav',
            'container_class' => $menu,
            'items_wrap'      => '<ul id="%1$s" class="%2$s"> %3$s </ul>'
        );
        wp_nav_menu( $menu );
    }
}

/*Ham tao phan trang don gian*/
if ( ! function_exists( 'phungdat_pagination' ) ) {
    function phungdat_pagination() {
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return '' ;
        } ?>
        <nav class="pagination" role="navigation">
            <?php if ( get_next_post_link() ) : ?>
                <div class="prev"> <?php next_posts_link( 'Older Posts', 'phungdat' ); ?> </div>
            <?php endif; ?>
            <?php if ( get_previous_posts_link() ) : ?>
                <div class="next"> <?php previous_posts_link( __( 'Newest Posts' ) , 'phungdat' ); ?> </div>
            <?php endif; ?>               
        </nav>
        <?php
    }
}

/*Ham hien thi thumbnail*/
if ( !function_exists( 'phungdat_thumbnail' ) ) {
    function phungdat_thumbnail( $size ) {
        if ( !is_single() && has_post_thumbnail() && post_password_required() || has_post_format( 'image' ) ) : ?>
        <figure class="post_thumbnail"> <?php the_post_thumbnail( $size ); ?> </figure>
        <?php endif; ?>
    <?php }
}

// Ham tao thong tin blog /* add thêm file trong hooks /template-hooks  */
if ( ! function_exists( 'phungdat_blog_info' ) ) {
    function phungdat_blog_info() {
        ?>
        <ul class="blog-info blog">
            <li>
                <span class="fa fa-calendar"></span>
                <?php echo get_the_date(); ?>
            </li>

            <?php if ( ! is_singular( 'single' ) ) { ?>
                <li>
                    <span class="fa fa-eye"></span>
                    <?php comments_number( 'no responses', 'one response', '%' ); ?>
                </li>
            <?php } ?>
        </ul>
        <?php
    }
}

if ( ! function_exists( 'phungdat_category' ) ){
    function phungdat_category() {
        ?>
        <div class="archive-title">
        <?php 
            if ( is_tag() ) :
                printf( __( 'Post tagged: %1$s' , 'phungdat' ) , single_tag_title( '', false ) );
            elseif ( is_category() ) :
                printf( __( 'Post categorized: %1$s' , 'phungdat' ) , single_tag_title( '', false ) );
            elseif ( is_day() ) :
                printf( __( 'Daily Archives: %1$s' , 'phungdat' ) , get_the_time('l, F j, Y') );
            elseif ( is_month() ) :
                printf( __( 'Monthly Archives: %1$s' ), 'phungdat' , get_the_time('F Y') );
            elseif ( is_year() ) :
                printf( __( 'Yearly Archives: %1$s' ), 'phungdat' , get_the_time('Y') );
            endif;    
        ?>
        </div>

        <?php if( is_tag() || is_category() ) : ?>
            <div class="archive-description">
                <?php echo term_description(); ?>
            </div>
        <?php endif; ?>
        <?php
    }
}


/*phungdat_entry_header = hien thi tieu de post*/
if ( ! function_exists( 'phungdat_entry_header' ) ) {
    function phungdat_entry_header() { ?>
        <?php if ( is_single() ) : ?>
            <h1 class="entry_header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" > <?php the_title(); ?> </a></h1>
        <?php else: ?>
            <h2 class="entry_header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" > <?php the_title(); ?> </a></h2>
        <?php endif; ?>
    <?php }
}

/*phungdat_entry_meta = lay du lieu post*/
if ( !function_exists( 'phungdat_entry_meta' ) ) {
    function phungdat_entry_meta() { ?>
        <?php if ( ! is_page() ) : ?>
            <div class="entry_meta">
                <?php
                    printf(  __( '<span class="author"> Posted by %1$s' , 'phungdat' ),
                        get_the_author() );

                    printf( __( '<span class="date_published"> at %1$s' , 'phungdat' ),
                        get_the_date() );

                    printf( __( '<span class="category"> in %1$s ' , 'phungdat'  ),
                        get_the_category_list() );

                    if ( comments_open() ):
                        echo '<span class="meta-reply">';
                            comments_popup_link(
                                __( 'Leave a comment', 'phungdat' ),
                                __( 'One comment', "phungdat" ),
                                __( '% comments', 'phungdat' ),
                                __( 'Read all comments', 'phungdat' )
                            );
                        echo '</span>';
                    endif;
                ?>
            </div>
        <?php endif; ?>
    <?php }
}

/**   
    @ Hàm hiển thị nội dung của post type
    @ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
    @ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
    @ phungdat_entry_content()
**/
if ( ! function_exists( 'phungdat_entry_content' ) ) {
    function phungdat_entry_content() {
    if ( ! is_single() && ! is_page() ) {
        the_excerpt();
    } else {
        the_content();
        /** Code hiển thị phân trang trong post type*/
        $link_pages = array(
          'before'           => __( ' <p>Page: ' , 'phungdat' ),
          'after'            => '</p>;',
          'nextpagelink'     => __( 'Next page' , 'phungdat' ),
          'previouspagelink' => __( 'Previous page' , 'phungdat' )
        );
        wp_link_pages( $link_pages );
        }
      }
}
/**
@ Hàm hiển thị tag của post
@ phungdat_entry_tag()
**/
if ( ! function_exists( 'phungdat_entry_tag' ) ) {
  function phungdat_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __( 'Tagged in %1$s', 'phungdat'), get_the_tag_list( '', ' ,' ) );
      echo '</div>';
    endif;
  }
}

/**
@ Chèn CSS và Javascript vào theme
@ sử dụng hook wp_enqueue_scripts() để hiển thị nó ra ngoài front-end
**/
function phungdat_styles() {
    /*
     * Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
     * Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
     */

    /* Reset css */
    wp_enqueue_style( 
        'reset-style', 
        THEME_URI . 'assets/css/reset.css'
    );

    /* font-awesome-min css */
    wp_enqueue_style(
        'font-awesome',
        THEME_URI . 'assets/css/font-awesome.min.css'
    );

    /* option.js script */
    wp_enqueue_script( 
        'option' , 
        THEME_URI . 'assets/js/option.js' , 
        array( 'jquery' ),
        null,
        true
    );

    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri()
    );
}
add_action( 'wp_enqueue_scripts', 'phungdat_styles' );


add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Main Sidebar', 'phungdat' ),
            'id'            => 'main-sidebar',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'phungdat' ),
            'before_widget' => '<ul id="%1$s" class="widget %2$s">',
            'after_widget'  => '</ul>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Widget', 'phungdat' ),
            'id'            => 'footer-widget',
            'description'   => __( 'Widgets in this area will be shown on foooter.', 'phungdat' ),
            'before_widget' => '<ul id="%1$s" class="widget %2$s">',
            'after_widget'  => '</ul>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );
}

if ( ! function_exists( 'phungdat_logo' ) ) {
    function phungdat_logo() {
        $id  = get_theme_mod( 'custom_logo' );
        $img = wp_get_attachment_image_src( $id, 'full' );
        ?>
        <h2 class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php esc_attr__( 'Logo Image', 'phungdat' ); ?>">
            </a>
        </h2>
        <?php
    }
}

if ( ! function_exists( 'phungdat_logo_footer' ) ) {
    function phungdat_logo_footer() {
        $imgft  = get_option( 'footer_logo_image' );
        ?>

        <img src="<?php echo esc_url( $imgft ); ?>" alt="<?php esc_attr__( 'Logo Image Footer', 'phungdat' ); ?>">

        <?php
    }
}




