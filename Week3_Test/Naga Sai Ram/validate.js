$().ready(function () {

    $().ready(function () {
        $("#login_form").validate({
            errorClass: "invalid",
            messages: {
              firstname: {
                required: "Please enter your password",
                minlength: jQuery.validator.format("At least {0} characters required!")
            },
        },
        lastname: {
          required: "Please enter your lastname",
          minlength: jQuery.validator.format("At least {0} characters required!")
        
        }
      }
    });