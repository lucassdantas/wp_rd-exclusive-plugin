<?php
if (!defined('ABSPATH')) {
    exit;
}

function rde_enqueue_instant_scroll() {
    wp_enqueue_script(
        'rde-instant-scroll',
        plugin_dir_url(__FILE__) . 'assets/js/script-instant-scroll.js',
        array(),
        null,
        true
    );

    // Envia configurações do admin para o JS
    $enabled = get_option('rde_enable_script_instant_scroll');
    if ($enabled) {
        $custom_class = trim(get_option('rde_custom_scroll_class', ''));
        wp_localize_script('rde-instant-scroll', 'rdeInstantScrollData', array(
            'selector' => $custom_class !== '' ? $custom_class . ' .elementor-button-link' : '.elementor-button-link'
        ));
    }
}
add_action('wp_enqueue_scripts', 'rde_enqueue_instant_scroll');

