<?php get_header() ?>

<h1><?php single_cat_title() ?></h1>

<div class="n13-summary">
    <?php
    $desc = category_description();
    $count = intval($wp_query->found_posts);
    $countText = sprintf('%s article%s', $count, $count === 1 ? '' : 's');
    if($desc) {
        printf('%s &nbsp; (%s)', strip_tags($desc), $countText);
    } else {
        echo $countText;
    }
    ?>
</div>

<?php get_template_part('posts') ?>

<?php get_footer() ?>
