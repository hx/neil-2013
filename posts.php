<div class="n13-posts">

<?php if (have_posts()) {

    while (have_posts()) {
        the_post();
        get_template_part('post');
    }

    global $wp_query;

    if($wp_query->max_num_pages > 1) : ?>

        <nav class="n13-posts-nav">
            <?php
            next_posts_link('&laquo; Older posts');
            previous_posts_link('Newer posts &raquo;');
            ?>
        </nav>

    <?php endif;

} else { ?>

    <div class="n13-sep"></div>

    <article id="post-0" class="post no-results not-found">
        <h2>Nothing Found</h2>
        <div class="excerpt">
            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
            <?php get_search_form(); ?>
        </div>
    </article>

<?php } ?>

</div>