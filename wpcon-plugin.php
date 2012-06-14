<?php
/*
Plugin Name: WP Conf 2012
Plugin URI: http://www.wpcon.it/
Description: Just a simple example
Version: 0.0.1
Author: Walter Dal Mut
Author URI: http://www.corley.it
License: MIT
*/

add_action('wp_dashboard_setup', 'upcloo_add_dashboard_widgets' );

function upcloo_add_dashboard_widgets() {
    wp_add_dashboard_widget('wpcon_dashboard_widget', 'WPCON.it News Widget', 'wpcon_dashboard_widget_function');
}

function wpcon_dashboard_widget_function() {
    $url = 'http://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=wpcon&count=10';
    
    $data = file_get_contents($url);
    
    $unpack = json_decode($data);
    
    echo "<ul>";
        foreach ($unpack as $element) {
            echo "<li>{$element->text}</li>";
        }
    echo "</ul>";
}