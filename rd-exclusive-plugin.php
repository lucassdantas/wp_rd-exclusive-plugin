<?php 
/**
 * Plugin Name: RD Exclusive
 * Description: Plugin to implement rd exclusive functionalities
 * Plugin URI:  https://github.com/lucassdantas/wp_rd-exclusive-plugin.git
 * Version:     1.2.0
 * Author:      RD Exclusive
 * Author URI:  https://www.rdexclusive.com.br
 */

if (!defined('ABSPATH')) exit;

require_once plugin_dir_path(__FILE__) . 'src/admin-page/admin-page.php';

// Diretório dos módulos
$modules_dir = plugin_dir_path(__FILE__) . 'src/modules/';
$module_dirs = glob($modules_dir . '*', GLOB_ONLYDIR);

foreach ($module_dirs as $module_path) {
    $module_slug = basename($module_path);
    $option_name = 'rde_enable_' . str_replace('-', '_', $module_slug); // <- CORRIGIDO

    $enabled = get_option($option_name);

    if ($enabled) {
        $main_file = $module_path . '/' . $module_slug . '.php';
        if (file_exists($main_file)) {
            include_once $main_file;
        }
    }
}

