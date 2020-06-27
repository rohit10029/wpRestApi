<?php
/**
 * Plugin Name: Inpsyde
 * Plugin URI: https://example.com/namespace-autoload-with-composer-demo
 * Description: Inpsyde
 * Version: 0.1.0
 * Author: Rohit saha
 * Author URI: https://example.com
 * License: GPL2
 */

require __DIR__ . '/vendor/autoload.php';
use PluginInpsyde\InpsydeShortCode;
 new InpsydeShortCode();
?>