<?php
/*
Plugin Name: Sweet Custom Dashboard
Plugin URL: http://remicorson.com/sweet-custom-dashboard Description: A nice plugin to create your custom dashboard page
Version: 0.1
Author: Remi Corson
Author URI: http://remicorson.com Contributors: corsonr
Text Domain: rc_scd
*/

if ( !defined('ABSPATH' ) ) {
            exit;
}

add_filter('allowed_http_origins', 'add_allowed_origins');

function add_allowed_origins($origins) {
    $origins[] = 'localhost';
    return $origins;
}