<p><label>
    Include posts from:
    <?php wp_dropdown_categories(array(
            'show_option_none' => ' ',
            'selected' => get_post_meta($post->ID, 'n13-include-cat', true),
            'id' => 'n13-include-cat',
            'name' => 'n13-include-cat'
        )) ?>
</label></p>
