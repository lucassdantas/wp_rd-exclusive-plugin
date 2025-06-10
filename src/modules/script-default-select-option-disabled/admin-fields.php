<?php
if (!defined('ABSPATH')) exit;

function rde_register_script_default_option_settings() {
    register_setting('rde_login_settings', 'rde_enable_script_default_select_option_disabled'); // <-- ESSE NOME

    add_settings_section(
        'rde_script_section',
        'Script Global - Select Option Default Disabled',
        null,
        'rde-login-settings'
    );

    add_settings_field(
        'rde_enable_script_default_select_option_disabled_field',
        'Habilitar Script',
        'rde_enable_script_default_option_script_callback',
        'rde-login-settings',
        'rde_script_section'
    );
}
add_action('admin_init', 'rde_register_script_default_option_settings');

function rde_enable_script_default_option_script_callback() {
    $enabled = get_option('rde_enable_script_default_select_option_disabled'); // <-- MESMO NOME
    ?>
    <input type="checkbox" name="rde_enable_script_default_select_option_disabled" value="1" <?php checked(1, $enabled); ?> />
    <label for="rde_enable_script_default_select_option_disabled">Ativar script em todo o site</label>
    <?php
}
