<?php

if(!class_exists('WP_Customize_Control'))
    require_once ABSPATH . '/wp-includes/class-wp-customize-control.php';

class WP_Customize_Control_Textarea extends WP_Customize_Control {

    public $type = 'textarea';
    public $rows = 3;

    public function render_content() {
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <textarea rows="<?php echo $this->rows ?>" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
    <?php
    }
}
