$("document").ready(function () {
  $("#signInSubmit").click(function () {
    var formData = {
      username: $("#UserIdInput").val(),
      password: $("#passwordInput").val(),
    };
    $.ajax({
      url: "APIs/loginapi.php",
      method: "POST",
      dataType: "JSON",
      data: formData,
      success: function (responseData) {
        if (!responseData.status) {
          $("#errors").text(responseData.message);
        } else {
          window.location.assign("mainmenu.php");
         
        }
      },
      error: function () {},
    });
  });
});

