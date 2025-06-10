<?php
if (!defined('ABSPATH')) exit;

$modules_dir = plugin_dir_path(__DIR__) . 'modules/';
$module_dirs = glob($modules_dir . '*', GLOB_ONLYDIR);

foreach ($module_dirs as $module_path) {
    $admin_fields = $module_path . '/admin-fields.php';
    if (file_exists($admin_fields)) {
        include_once $admin_fields;
    }
}
