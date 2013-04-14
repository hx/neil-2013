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
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles.css">
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
    <script src="<?php bloginfo('template_url'); ?>/script.js"></script>
</head>
<body>
    <div class="neil2013-body">