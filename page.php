<?php get_header(); the_post() ?>

<div class="n13-page">
    <header>
        <h1><?php the_title() ?></h1>
    </header>
    <div class="content">
        <?php the_content() ?>
    </div>
</div>

<?php get_footer() ?>
