<?php
// Bloqueia acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

/// Redireciona rdx-login para a página de login do WordPress
add_action('init', function() {
  add_rewrite_rule('^rdx-login$', 'index.php?custom-login=1', 'top');
});

// Captura a nova URL e redireciona corretamente para a página de login
add_action('template_redirect', function() {
  if (get_query_var('custom-login') == 1) {
      wp_redirect(site_url('wp-login.php'));
      exit;
  }
});

// Adiciona a variável custom-login
add_filter('query_vars', function($vars) {
  $vars[] = 'custom-login';
  return $vars;
});

// Bloqueia o acesso a wp-admin para usuários não logados
add_action('init', function() {
  if (strpos($_SERVER['REQUEST_URI'], 'wp-admin') !== false && !is_user_logged_in()) {
      global $wp_query;
      $wp_query->set_404();
      status_header(404);
      nocache_headers();
      include(get_query_template('404'));
      exit;
  }
});

// Garante que as regras de reescrita sejam atualizadas
register_activation_hook(__FILE__, function() {
  flush_rewrite_rules();
});

register_deactivation_hook(__FILE__, function() {
  flush_rewrite_rules();
});