<!doctype html>
<html lang="<?php bloginfo('language') ?>">
<head>
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '•', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " • $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' • ' . sprintf( 'Page %s', max( $paged, $page ) );

        ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>">
    <?php wp_head(); ?>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="n13-background">
        <div class="n13-container">
            <div class="n13-body">
                <h4><a href="<?php echo site_url() ?>" title="<?php echo get_bloginfo() ?>"><?php bloginfo() ?></a></h4>
                <nav class="n13-sidebar">
                    <?php wp_nav_menu(array('menu' => 'main-menu')) ?>
                </nav>
