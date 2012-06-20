<?php
/*
Plugin Name: WP Conf 2012
Plugin URI: https://github.com/wdalmut/wpcon-plugin
Description: Just a simple example to show xdebug remote debugging features.
Version: 0.0.1
Author: Walter Dal Mut
Author URI: http://www.corley.it
License: MIT
*/

require_once dirname(__FILE__) . '/vendor/autoload.php';

function upcloo_twig_autoload() {
    Twig_Autoloader::register();
    get_twig();
}

add_action('init', 'upcloo_twig_autoload');
add_action('wp_dashboard_setup', 'upcloo_add_dashboard_widgets' );

function upcloo_add_dashboard_widgets() {
    wp_add_dashboard_widget('wpcon_dashboard_widget', 'WPCON.it News Widget', 'wpcon_dashboard_widget_function');
}

function wpcon_dashboard_widget_function() {
    $url = 'http://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=wpcon&count=10';
    
    $data = file_get_contents($url);
    
    $unpack = json_decode($data);
    
    $template = get_twig()->loadTemplate('tweets.twig');
    echo $template->render(array('elements' => $unpack));
}

function get_twig()
{
    static $twig;
    if (!$twig) {
        $loader = new Twig_Loader_Filesystem(dirname(__FILE__) . '/templates');
        $twig = new Twig_Environment($loader, array('cache' => dirname(__FILE__) . '/cache'));
    }

    return $twig;
}
