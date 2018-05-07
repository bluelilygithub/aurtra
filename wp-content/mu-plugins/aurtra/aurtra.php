<?php
/*
Plugin Name: Aurtra
Plugin URI: https://www.bluelily.com.au
Author: Michael Barrett
Author URI: https://www.bluelily.com.au
Description: Manage Aurtra Clients, Devices & Reports
Version: 1.0
*/


require_once(plugin_dir_path(__FILE__). 'inc/mrb_enqueue.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_update_device_ajax.php');
//require_once(plugin_dir_path(__FILE__). 'inc/mrb_translations.php');

//require_once(plugin_dir_path(__FILE__). 'inc/mrb_replace_dashboard.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_modify_menus.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_CPT.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_metabox_company.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_metabox_device.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_userLogin.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_userRoles.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_userRego_fields.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_adminColumns.php');
require_once(plugin_dir_path(__FILE__). 'inc/mrb_add_deviceColumns.php');