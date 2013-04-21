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

    }

    public static function excerptMore() {
        return '&hellip;';
    }

}

add_action('customize_register', array('Neil2013', 'customSettings'));

add_theme_support('menus');

register_nav_menu('main-menu', 'Main Sidebar Menu');

add_filter('excerpt_more', array('Neil2013', 'excerptMore'));
