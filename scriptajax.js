$(document).ready(function() {
    $('#login-form').submit(function(e) {
      e.preventDefault(); 
  
      $.ajax({
        type: 'POST',
        url: 'login.php',
        data: $(this).serialize(),
        success: function(response) {
          $('#login-result').html(response);
        }
      });
    });
  
    $('#signup-form').submit(function(e) {
      e.preventDefault(); 
  
      $.ajax({
        type: 'POST',
        url: 'signup.php',
        data: $(this).serialize(),
        success: function(response) {
          $('#signup-result').html(response);
        }
      });
    });
  });
  