<?php
// Register and load the widget
function wpb_load_widget() {
    register_widget('fius_open_widget');
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class fius_open_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

// Base ID of your widget
            'fius_open_widget',

// Widget name will appear in UI
            __('FIUS offen widget', 'fius-website-theme'),

// Widget description
            array('description' => __('Dieses Widget zeigt an, ob die Fachgruppe offen ist.', 'fius-website-theme'),)
        );
    }

// Creating widget front-end

    public function widget($args, $instance)
    {
        wp_enqueue_script('fius_open_widget_js', get_template_directory_uri(). '/widget/fius_open_widget/js/fius_open_widget_js.js', __FILE__);
        wp_enqueue_style('fius_open_widget_style', get_template_directory_uri().'/widget/fius_open_widget/css/fius_open_widget_css.css', array(), '1.0.0', 'all');


// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        echo $args['before_title'] . __('Ist die Fachgruppe offen?', 'fius-website-theme') . $args['after_title'];

// This is where you run the code and display the output
        echo '<div id="state">
                  <span id="dot" class="dotYellow"></span>
                  <span id="fius_widget_text">'. __('Außer betrieb','fius-website-theme') . '</span>
              </div>';
        echo $args['after_widget'];
    }
}
//Class fius_open_widget ends here