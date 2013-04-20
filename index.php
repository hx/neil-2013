<?php get_header() ?>

<h2><?php

    bloginfo('description');

?></h2>

<div class="n13-summary">
    <?php esc_html_e(get_theme_mod('n13_site_summary')) ?>
</div>

<div class="n13-sep"></div>


<?php get_footer() ?>
