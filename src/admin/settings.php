<?php
// Bloqueia acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

// Adiciona "RD Exclusive" na barra lateral com ícone personalizado
function rde_add_admin_menu() {
  add_menu_page(
      'RD Exclusive',                 // Título da página
      'RD Exclusive',                 // Nome no menu
      'manage_options',               // Permissão necessária
      'rde-login-settings',           // Slug do menu
      'rde_login_settings_page',      // Função que renderiza a página
      plugin_dir_url(__FILE__).'../../assets/images/favicon-rd-exclusive-marketing-exclusivo.png',
      2                               // Posição no menu
  );
}
add_action('admin_menu', 'rde_add_admin_menu');


// Página de configurações do login
function rde_login_settings_page() {
    ?>
    <div class="wrap">
        <h1>Configurações de Login</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('rde_login_settings');
            do_settings_sections('rde-login-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Registra a configuração do logotipo
function rde_register_settings() {
    register_setting('rde_login_settings', 'rde_login_logo');
    add_settings_section('rde_login_section', 'Configurações de Login', null, 'rde-login-settings');
    add_settings_field('rde_login_logo_field', 'Logo da página de login', 'rde_login_logo_field_callback', 'rde-login-settings', 'rde_login_section');
}
add_action('admin_init', 'rde_register_settings');

// Campo de upload do logotipo
function rde_login_logo_field_callback() {
    $logo = get_option('rde_login_logo');
    ?>
    <input type="text" name="rde_login_logo" id="rde_login_logo" value="<?php echo esc_attr($logo); ?>" style="width: 60%;" />
    <button class="upload_image_button button">Selecionar Imagem</button>
    <?php
}

// Enfileira os scripts do painel administrativo
function rde_enqueue_admin_scripts($hook) {
    if ($hook !== 'settings_page_rde-login-settings') {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script('rde-admin-js', plugin_dir_url(__FILE__) . '../../assets/js/admin.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'rde_enqueue_admin_scripts');
