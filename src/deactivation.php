<?php
// Bloqueia acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

// Restaura as regras padrão ao desativar o plugin
register_deactivation_hook(__FILE__, function() {
  flush_rewrite_rules();
});