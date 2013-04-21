<div class="n13-sep"></div>
<article id="post-<?php echo $post->ID ?>" class="<?php echo implode(' ', get_post_class('', $post->ID)) ?>">
    <h2>
        <a href="<?php esc_attr_e(get_permalink($post->ID)) ?>" title="Full article: <?php esc_attr_e($post->post_title) ?>" rel="bookmark">
            <?php esc_html_e($post->post_title) ?>
        </a>
    </h2>
    <div class="date"><?php esc_html_e(date(get_option('date_format'), strtotime($post->post_date))) ?></div>
    <div class="excerpt"><p><?php esc_html_e($post->post_excerpt) ?></p></div>
    <div class="n13-clear-floats"></div>
</article>