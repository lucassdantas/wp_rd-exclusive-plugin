<?php
if (!defined('ABSPATH')) exit;

function rde_register_script_install_scroll_settings() {
    // Registrar as opções
    register_setting('rde_login_settings', 'rde_enable_script_instant_scroll');
    register_setting('rde_login_settings', 'rde_custom_scroll_class');

    // NOVO: ID da seção única para este script
    $section_id = 'rde_scroll_instant_section';

    add_settings_section(
        $section_id,
        'Script Global - Scroll Instantâneo',
        null,
        'rde-login-settings'
    );

    add_settings_field(
        'rde_enable_script_instant_scroll_field',
        'Habilitar Script',
        'rde_enable_script_install_scroll_script_callback',
        'rde-login-settings',
        $section_id
    );

    add_settings_field(
        'rde_custom_scroll_class_field',
        'Classe CSS para Scroll',
        'rde_custom_scroll_class_callback',
        'rde-login-settings',
        $section_id
    );
}
add_action('admin_init', 'rde_register_script_install_scroll_settings');

function rde_enable_script_install_scroll_script_callback() {
    $enabled = get_option('rde_enable_script_instant_scroll');
    ?>
    <input type="checkbox" name="rde_enable_script_instant_scroll" value="1" <?php checked(1, $enabled); ?> />
    <label for="rde_enable_script_instant_scroll">Ativar script em todo o site</label>
    <?php
}

function rde_custom_scroll_class_callback() {
    $class = esc_attr(get_option('rde_custom_scroll_class', ''));
    ?>
    <input type="text" name="rde_custom_scroll_class" value="<?php echo $class; ?>" placeholder=".instantScroll" />
    <p class="description">Digite a classe CSS dos botões que terão o scroll instantâneo. Ex: <code>.instantScroll</code>. Se vazio, será aplicado em todos os botões do Elementor.</p>
    <?php
}
