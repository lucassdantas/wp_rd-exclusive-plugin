<?php
if (!defined('ABSPATH')) {
    exit;
}

function rde_register_script_default_option_settings() {
    register_setting('rde_login_settings', 'rde_enable_default_option_script');

    add_settings_section(
        'rde_script_section',
        'Script Global - Select Option Default Disabled',
        null,
        'rde-login-settings'
    );

    add_settings_field(
        'rde_enable_default_option_script_field',
        'Habilitar Script',
        'rde_enable_default_option_script_callback',
        'rde-login-settings',
        'rde_script_section'
    );
}
add_action('admin_init', 'rde_register_script_default_option_settings');

function rde_enable_default_option_script_callback() {
    $enabled = get_option('rde_enable_default_option_script');
    ?>
    <input type="checkbox" name="rde_enable_default_option_script" value="1" <?php checked(1, $enabled, true); ?> />
    <label for="rde_enable_default_option_script">Ativar script em todo o site</label>
    <?php
}
