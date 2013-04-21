<div class="n13-posts">

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php include __DIR__ . '/post.php' ?>

    <?php endwhile; ?>

<?php else : ?>

    <div class="n13-sep"></div>

    <article id="post-0" class="post no-results not-found">
        <h2>Nothing Found</h2>
        <div class="excerpt">
            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
            <?php get_search_form(); ?>
        </div>
    </article>

<?php endif; ?>

</div>