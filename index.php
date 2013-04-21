<?php get_header() ?>

<h1><?php bloginfo('description') ?></h1>

<div class="n13-summary">
    <?php esc_html_e(get_theme_mod('n13_site_summary')) ?>
</div>

<?php get_template_part('posts') ?>

<?php get_footer() ?>
