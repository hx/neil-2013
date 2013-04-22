<?php

require_once __DIR__ . '/lib/class-wp-customize-control-textarea.php';

class Neil2013 {

    public static function customSettings(WP_Customize_Manager $wpc) {

        $wpc->add_setting('n13_site_summary', array(
            'default'   => 'Customize the Neil 2013 theme to change this text.'
        ));

        $wpc->add_control(new WP_Customize_Control_Textarea($wpc, 'n13_site_summary', array(
            'label'     => 'Site Summary',
            'section'   => 'static_front_page',
            'rows'      => 4
        )));

        $wpc->add_section('n13_footer_section', array(
            'title'     => 'Footer',
            'priority'  => 9999
        ));

        $wpc->add_setting('n13_footer_image', array(
            'default'   => null
        ));

        $wpc->add_setting('n13_twitter_screen_name', array(
            'default'   => null
        ));

        $wpc->add_control(new WP_Customize_Image_Control($wpc, 'n13_footer_image', array(
            'label'     => 'Footer Image',
            'section'   => 'n13_footer_section'

        )));

        $wpc->add_control('n13_twitter_screen_name', array(
            'label'     => 'Twitter ID',
            'section'   => 'n13_footer_section'
        ));

    }

    public static function excerptMore() {
        return '&hellip;';
    }

    public static function latestTweet() {

        if(class_exists('SimpleXMLElement') && $screenName = get_theme_mod('n13_twitter_screen_name')) {

            $screenName = str_replace('@', '', $screenName);

            $tweet = get_option('n13_tweet');

            if(!$tweet || $tweet->screenName !== $screenName) {
                $tweet = (object) array(
                    'refreshed' => 0,
                    'screenName' => $screenName
                );
            }

            if($tweet->refreshed < time() - 60 * 3) {

                $rawXml = file_get_contents("http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=$screenName");

                if($rawXml) {

                    $xml = new SimpleXMLElement($rawXml);
                    $item = $xml->channel->item[0];

                    $tweet->description = preg_replace('`^.*?:\s+`', '', $item->description);
                    $tweet->pubDate = strtotime($item->pubDate);
                    $tweet->link = (string) $item->link;

                    $tweet->refreshed = time();

                    update_option('n13_tweet', $tweet);
                }
            }

            if($tweet->pubDate) {
                return $tweet;
            }
        }

        return false;
    }

    public static function detectUrls($plainText) {
        return preg_replace('`\b((?:https?|ftp|file)://|www\.|ftp\.)
                ((?:\([-A-Z0-9+&@#/%=~_|$?!:,.]*\)|[-A-Z0-9+&@#/%=~_|$?!:,.])*)
                (\([-A-Z0-9+&@#/%=~_|$?!:,.]*\)|[A-Z0-9+&@#/%=~_|$])`xi', '<a href="$0">$2$3</a>',
            $plainText
        );
    }

    public static function addMetaBoxes() {
        add_meta_box('n13-meta', 'Neil 2013', array(__CLASS__, 'renderMetaBox'), 'page', 'side', 'high');
    }

    public static function renderMetaBox() {
        global $post;
        $file = __DIR__ . "/admin/{$post->post_type}-meta.php";
        if(is_file($file)) {
            include $file;
        }
    }

    public static function onSavePost($post_id, $post) {
        if(current_user_can('edit_post', $post_id)) {
            foreach($_POST as $k => $i) {
                if(substr($k, 0, 4) === 'n13-') {
                    update_post_meta($post_id, $k, $i);
                }
            }
        }
    }

    public static function init() {
        add_post_type_support('page', 'excerpt');
    }

    public static function nextPostsLinkAttrs($last) {
        return $last . ' class="next-posts"';
    }

    public static function prevPostsLinkAttrs($last) {
        return $last . ' class="prev-posts"';
    }

}

add_action('customize_register', array('Neil2013', 'customSettings'));
add_action('add_meta_boxes', array('Neil2013', 'addMetaBoxes'));
add_action('save_post', array('Neil2013', 'onSavePost'), 1, 2);
add_action('init', array('Neil2013', 'init'));

add_theme_support('menus');

register_nav_menu('main-menu', 'Main Sidebar Menu');

add_filter('excerpt_more', array('Neil2013', 'excerptMore'));
add_filter('next_posts_link_attributes', array('Neil2013', 'nextPostsLinkAttrs'));
add_filter('previous_posts_link_attributes', array('Neil2013', 'prevPostsLinkAttrs'));

register_sidebar(array(
    'name'          => 'Footer',
    'id'            => 'n13_footer_widgets',
    'description'   => 'Widgets for the Neil 2013 footer',
    'before_widget' => '<li id="%1$s" class="n13-widget %2$s">',
    'after_widget'  => "</li>",
    'before_title'  => '<h6 class="n13-widget-title">',
    'after_title'   => '</h6>',
) );

