<?php
// Bloqueia acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

// Personaliza a página de login
function rde_custom_login_styles() {
    $logo = get_option('rde_login_logo');
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
        body{
          font-family:'Montserrat', 'sans-serif'
        }
        body.login {
            background-image:url('<?php echo plugin_dir_url(__FILE__) . 'assets/images/background-wprdx-login.jpg'; ?>');
            background-repeat:no-repeat;
            background-attachment:fixed;
            background-size:cover;
            background-position:center;
        }

        .wp-login-logo{
          width:100%;
          padding: 0px 24px;
          text-align:center;
        }
        .login h1 a {
            background-image: url('<?php echo esc_url($logo); ?>');
            background-size: cover;
            width: 150px;
            height: 150px;
            border-radius:99px;
        }

        #nav a, #backtoblog a{
          color:#fff!important;
        }
        #loginform{
          background-color:#96989a;
          border:unset;
          color:#fff;
          width:100%;
        }
        #loginform label{
          font-weight:600;
        }
        #loginform input{
          font-size:14px;
          padding:12px;
          border:unset;
          border-color:#000;
        }

        #language-switcher input{
          border:unset;
          border-color:#000;
          color:#000;
        }
        #language-switcher input:hover, .wp-core-ui select:focus, .wp-core-ui select:hover, .wp-core-ui select:focus{
          border:unset;
          border-color:#000;
          color:#000;
          box-shadow:unset;
        }
        #loginform #rememberme{
          background-color:unset;
          border:2px solid #fff;
        }
        #loginform #rememberme:checked{
          background-color:#fff;
          filter: saturate(0%);
          border:unset;
        }
        #loginform #wp-submit{
          background-color:#000;
          border:unset;
          width:50%;
          padding:6px;
          font-weight:700;
          font-size:14px;
          letter-spacing:1px;
        }
        .privacy-policy-link{
          color:#fff;
          text-decoration:none;
        }
        .privacy-policy-link:hover{
          color:#fff;
        }

        
    </style>
    <?php
}
add_action('login_head', 'rde_custom_login_styles');
