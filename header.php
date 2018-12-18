<!DOCTYPE html>
<html "<?php language_attributes(); ?>" />
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">    
        <div class="topnav">
            <div class="container">
                <h2 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Cherry</a></h2>

                <ul class="menu">
                    <?php phungdat_menu( 'primary-menu' ); ?>
                </ul>

                <button class="toggle-menu-btn fa fa-bars"></button>

                <div class="menu-overlay"></div>
            </div>
        </div>

        <div class="page-header">
            <div class="container">
                <div class="block">
                    <h1 class="blog-title">
                        Our Stories
                    </h1>
                    <h2 class="index-title">KEEP UPDATE WITH US</h2>

                </div>
            </div>
        </div>
    </header>
