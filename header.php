<!doctype html>
<html lang="en">
<head>
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( 'Page %s', max( $paged, $page ) );

        ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
    <script src="<?php bloginfo('template_url'); ?>/script.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="n13-background">
        <div class="n13-container">
            <div class="n13-body">
                <h4><?php bloginfo() ?></h4>
                <nav class="n13-sidebar">
                    <?php wp_nav_menu(['menu' => 'main-menu']) ?>
                </nav>
