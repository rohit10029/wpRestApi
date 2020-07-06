<?php
/**
 * Plugin Name: Inpsyde
 * Plugin URI: https://github.com/rohit10029/wpRestApi
 * Description: Inpsyde
 * Version: 0.1.0
 * Author: Rohit saha
 * Author URI: https://github.com/rohit10029/
 * License: GPL2
 */

require __DIR__ . '/vendor/autoload.php';

use PluginInpsyde\InpsydeShortCode;
 $d=new InpsydeShortCode();
 $d->init();
?>