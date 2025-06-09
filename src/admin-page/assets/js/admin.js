jQuery(document).ready(function($) {
  $('.upload_image_button').click(function(e) {
      e.preventDefault();

      var custom_uploader = wp.media({
          title: 'Selecionar Logo',
          button: { text: 'Usar esta imagem' },
          multiple: false
      }).on('select', function() {
          var attachment = custom_uploader.state().get('selection').first().toJSON();
          $('#rde_login_logo').val(attachment.url);
      }).open();
  });
});
