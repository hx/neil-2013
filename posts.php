<div class="n13-posts">

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <div class="n13-sep"></div>

        <article id="post-<?php echo the_ID() ?>" <?php post_class() ?>>
            <h2>
                <a href="<?php the_permalink(); ?>" title="Full article: <?php the_title_attribute() ?>" rel="bookmark">
                    <?php the_title(); ?>
                </a>
            </h2>
            <div class="date"><?php the_date() ?></div>
            <div class="excerpt"><?php the_excerpt() ?></div>
            <div class="n13-clear-floats"></div>
        </article>

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