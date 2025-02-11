<?php
if (!defined('ABSPATH')) {exit;}

function rde_add_privacy_policy_link() {
    $privacy_policy_url = get_privacy_policy_url();
    echo '<div style="text-align:center;color:#fff;width:100%;margin:auto;">';
    if ($privacy_policy_url) {echo '<p class="rde-privacy-policy"><a href="' . esc_url($privacy_policy_url) . '" target="_blank" style="text-align:center;margin:auto;width:320px; padding:0 24px;">Política de Privacidade</a></p>';} 
    else{echo '<p class="rde-privacy-policy" style="text-align:center;margin:auto;width:320px;padding:0 24px;">Configure sua página de política de privacidade</p>';}
    echo '</div>';
}
add_action('login_footer', 'rde_add_privacy_policy_link');