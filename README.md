# Example for integrating Twig into a WP plugin

A simple example for use Twig template engine into a WP plugin.

## Twig dependency

Obviously get Twig...

```
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

## Concepts

Composer add needed dependencies and we use the autoloader of composer
for loading all Twig classes.

```php
<?php
// Autoloader
require_once dirname(__FILE__) . '/vendor/autoload.php';

// Register the Twig autoloader
function upcloo_twig_autoload() {
    Twig_Autoloader::register();
    get_twig();
}

// On init boot twig template engine
add_action('init', 'upcloo_twig_autoload');

// Prepare Twig if missing
function get_twig()
{
    static $twig;
    if (!$twig) {
        $loader = new Twig_Loader_Filesystem(dirname(__FILE__) . '/templates');
        $twig = new Twig_Environment($loader, array('cache' => dirname(__FILE__) . '/cache'));
    }

    return $twig;
}
```

We have Twig into our plugin... Just use it

```php

function a_wp_real_hook() {
    $data = array( 
        /* My data */ 
    );
    
    $unpack = json_decode($data);
    
    // Load template file
    $template = get_twig()->loadTemplate('tweets.twig');
    
    // Print 
    echo $template->render(array('elements' => $unpack));
}
```

