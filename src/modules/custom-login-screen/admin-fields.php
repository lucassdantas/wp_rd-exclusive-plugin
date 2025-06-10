<?php
if (!defined('ABSPATH')) exit;

function rde_register_custom_login_screen_settings() {
    $module_slug = 'custom_login_screen'; // slug usado na pasta
    $option_name = 'rde_enable_' . $module_slug ; // rde_enable_custom_login_screen_module

    register_setting('rde_login_settings', $option_name);
    register_setting('rde_login_settings', 'rde_login_logo');

    add_settings_section(
        'rde_login_section',
        'Customização da Tela de Login',
        null,
        'rde-login-settings'
    );

    add_settings_field(
        'rde_enable_custom_login_screen',
        'Ativar módulo',
        function () use ($option_name) {
            $enabled = get_option($option_name);
            ?>
            <input type="checkbox" name="<?php echo esc_attr($option_name); ?>" value="1" <?php checked(1, $enabled); ?> />
            <label for="<?php echo esc_attr($option_name); ?>">Ativar</label>
            <?php
        },
        'rde-login-settings',
        'rde_login_section'
    );

    add_settings_field(
        'rde_login_logo_field',
        'Logo da página de login',
        function () {
            $logo = get_option('rde_login_logo');
            ?>
            <input type="text" name="rde_login_logo" id="rde_login_logo" value="<?php echo esc_attr($logo); ?>" style="width: 60%;" />
            <button type="button" class="upload_image_button button">Selecionar Imagem</button>
            <?php
        },
        'rde-login-settings',
        'rde_login_section'
    );
}
add_action('admin_init', 'rde_register_custom_login_screen_settings');

function rde_enqueue_custom_login_admin_scripts($hook) {
    if ($hook !== 'toplevel_page_rde-login-settings') return;

    wp_enqueue_media();
    wp_enqueue_script(
        'rde-admin-js',
        plugin_dir_url(__FILE__) . 'assets/js/admin.js',
        array('jquery'),
        null,
        true
    );
}
add_action('admin_enqueue_scripts', 'rde_enqueue_custom_login_admin_scripts');
