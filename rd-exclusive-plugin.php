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

require_once plugin_dir_path(__FILE__) . 'src/admin-page/admin-page.php';

// Importar automaticamente os arquivos principais dos módulos
$modules_dir = plugin_dir_path(__FILE__) . 'src/modules/';
$module_dirs = glob($modules_dir . '*', GLOB_ONLYDIR);

foreach ($module_dirs as $module_path) {
    $main_file = $module_path . '/' . basename($module_path) . '.php';
    if (file_exists($main_file)) {
        include_once $main_file;
    }
}
