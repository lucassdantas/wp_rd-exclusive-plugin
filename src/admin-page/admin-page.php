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
      plugin_dir_url(__FILE__).'assets/images/favicon-rd-exclusive-marketing-exclusivo.png',
      2                               // Posição no menu
  );
}
add_action('admin_menu', 'rde_add_admin_menu');


// Página de configurações do login
function rde_login_settings_page() {
    ?>
    <div class="wrap">
        <h1>Funcionalidades Exclusivas</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('rde_login_settings');

            // Primeiro carrega os módulos que registram os campos
            $modules_dir = plugin_dir_path(__DIR__) . 'modules/';
            $module_dirs = glob($modules_dir . '*', GLOB_ONLYDIR);

            foreach ($module_dirs as $module_path) {
                $settings_page = $module_path . '/settings-page.php';
                if (file_exists($settings_page)) {
                    include $settings_page;
                }
            }

            // Depois que os campos foram registrados, você os exibe
            do_settings_sections('rde-login-settings');

            submit_button();
            ?>
        </form>

    </div>
    <?php
}
require_once plugin_dir_path(__FILE__) . 'module-settings-loader.php';



