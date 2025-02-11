<?php
// Bloqueia acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

// Reescreve regras ao ativar o plugin
register_activation_hook(__FILE__, function() {
  flush_rewrite_rules();
});