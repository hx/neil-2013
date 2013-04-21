<?php get_header(); the_post() ?>

<div class="n13-post">
    <article id="post-<?php echo the_ID() ?>" <?php post_class() ?>>
        <h1><?php the_title() ?></h1>
        <div class="date">Published on <?php the_date() ?></div>
        <div class="content">
            <?php the_content() ?>
        </div>
    </article>
</div>

<?php get_footer() ?>
