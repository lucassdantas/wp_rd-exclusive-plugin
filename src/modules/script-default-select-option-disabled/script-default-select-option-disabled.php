<?php
if (!defined('ABSPATH')) {
    exit;
}

function rde_enqueue_default_select_option_script() {
    wp_enqueue_script(
        'rde-default-select-option',
        plugin_dir_url(__FILE__) . 'assets/js/script-default-select-option-disabled.js',
        array('jquery'), // Dependência, pode ser [] se não usar jQuery
        null,
        true // true = carrega no footer
    );
}
add_action('wp_enqueue_scripts', 'rde_enqueue_default_select_option_script');
