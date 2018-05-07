<?php
/*
Plugin Name: MyPlugin
Plugin URI: https://www.bluelily.com.au
Author: Michael Barrett
Author URI: https://www.bluelily.com.au
Description: My first plugin
Version: 1.0
*/

if ( !defined('ABSPATH' ) ) {
            exit;
}

add_filter('allowed_http_origins', 'add_allowed_origins');

function add_allowed_origins($origins) {
    $origins[] = 'localhost';
    return $origins;
}

require_once(plugin_dir_path(__FILE__). 'inc/mrb_enqueue.php');
//require_once(plugin_dir_path(__FILE__). 'inc/mrb_translations.php');

require_once(plugin_dir_path(__FILE__). 'inc/mrb_modify_menus.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_CPT.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_tax.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_metabox.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_job_render_admin.php');


