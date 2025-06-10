<?php
if (!defined('ABSPATH')) {
    exit;
}

// Caminho absoluto da pasta de módulos
$modules_dir = plugin_dir_path(__DIR__) . 'modules/';

// Pega todos os subdiretórios
$module_dirs = glob($modules_dir . '*', GLOB_ONLYDIR);

foreach ($module_dirs as $module_path) {
    $admin_fields_file = $module_path . '/admin-fields.php';

    if (file_exists($admin_fields_file)) {
        include_once $admin_fields_file;
    }
}
