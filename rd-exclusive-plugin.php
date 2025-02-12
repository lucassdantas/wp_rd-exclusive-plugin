<?php 
/**
 * Plugin Name: RD Exclusive
 * Description: Plugin to implement rd exclusive functionalities
 * Plugin URI:  https://github.com/lucassdantas/wp_rd-exclusive-plugin.git
 * Version:     1.0.0
 * Author:      RD Exclusive
 * Author URI:  https://www.rdexclusive.com.br
 */

if (!defined('ABSPATH')) exit;
if (!function_exists('add_action')) die;

require_once plugin_dir_path(__FILE__) . 'src/admin/settings.php';
require_once plugin_dir_path(__FILE__) . 'src/frontend/custom-login-header.php';
require_once plugin_dir_path(__FILE__) . 'src/rewrite/rules.php';
