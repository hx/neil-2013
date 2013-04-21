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

}

add_action('customize_register', array('Neil2013', 'customSettings'));

add_theme_support('menus');

register_nav_menu('main-menu', 'Main Sidebar Menu');

add_filter('excerpt_more', array('Neil2013', 'excerptMore'));
