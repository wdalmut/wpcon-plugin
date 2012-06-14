<?php
/*
Plugin Name: WP Conf 2012
Plugin URI: https://github.com/wdalmut/wpcon-plugin
Description: Just a simple example to show xdebug remote debuggin features.
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
            echo "<li>
                <a href='https://www.twitter.com/{$element->user->name}/status/{$element->id_str}' target='_blank'>{$element->text}</a>
                <ul>
                    <li><a href='https://www.twitter.com/{$element->user->name}' target='_blank'>@{$element->user->screen_name}</a></li>
                </ul>
            </li>";
        }
    echo "</ul>";
}