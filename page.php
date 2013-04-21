<?php get_header(); the_post() ?>

<div class="n13-page">
    <header>
        <h1><?php the_title() ?></h1>
        <?php if(has_excerpt()): ?>
            <div class="n13-summary">
                <?php the_excerpt() ?>
            </div>
        <?php endif ?>
    </header>
    <?php
    $includeCat = intval(get_post_meta($post->ID, 'n13-include-cat', true));
    if($includeCat > 1) {
        echo '<div class="n13-posts">';
        $posts = get_posts("category=$includeCat&orderby=date&order=ASC&numberposts=-1");
        foreach($posts as $post) {
            include __DIR__ . '/post.php';
        }
        echo '</div><div class="n13-sep"></div>';
    }
    ?>
    <div class="content">
        <?php the_content() ?>
    </div>
</div>

<?php get_footer() ?>
