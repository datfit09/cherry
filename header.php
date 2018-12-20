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
                
                <?php phungdat_logo(); ?>

                <ul class="menu">
                    <?php phungdat_menu( 'primary-menu' ); ?>
                </ul>

                <button class="toggle-menu-btn fa fa-bars"></button>

                <div class="menu-overlay"></div>
            </div>
        </div>

        <div class="page-header">
            <div class="container">
                <?php phungdat_title_blog(); ?>
            </div>
        </div>
    </header>
