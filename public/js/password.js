
  $(document).ready(function() {
    $('#toggle-password').click(function() {
      var passwordField = $('#password');
      var passwordFieldType = passwordField.attr('type');
      if (passwordFieldType == 'password') {
        passwordField.attr('type', 'text');
        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
      } else {
        passwordField.attr('type', 'password');
        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
      }
    });
  });

  $(document).ready(function() {
    $('#toggle-confirm-password').click(function() {
      var confirmPasswordField = $('#password_confirmation');
      var confirmPasswordFieldType = confirmPasswordField.attr('type');
      if (confirmPasswordFieldType == 'password') {
        confirmPasswordField.attr('type', 'text');
        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
      } else {
        confirmPasswordField.attr('type', 'password');
        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
      }
    });
  })
