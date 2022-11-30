<?php
session_start();
if (isset($_SESSION['emp_id']) || isset($_SESSION['role_id'])) {
  if ($_SESSION['role_id'] != "12") {
    header("Location: employeeDashboard.php");
  }
  elseif($_SESSION['role_id'] == "12"){
    header("Location: adminDashboard.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="https://logodix.com/logo/1713924.png" type="image/png">
  <title>Login</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./index.css">
</head>

<body>
  <form class="loginform  p-3 rounded-3" onsubmit="return false">
    <div class="login d-lg-flex py-4 justify-content-center align-items-center">
      <img src="https://logodix.com/logo/1713924.png" alt="" style="width:38px;height:38px;">
      <h1 class="px-3 my-0">Login</h1>
    </div>
    <div class="d-lg-flex">
      <p class="col-3">Employee ID</p>
      <input type="text" class="mx-5 my-1" id="empIdInput" autocomplete="off" required placeholder="Employee Id"></br>
    </div>
    <div class="d-lg-flex">
      <p class="col-3">Password</p>
      <input type="password" class="mx-5 my-1" id="passwordInput" autocomplete="off" placeholder="Password" required>
    </div>
    <p id="errors" class="text-danger"></p>
    <button type="submit" class="loginButton my-3 border-0 rounded-2 bg-primary text-white px-3 py-1"
      id="loginSubmit">Login</button>
  </form>

  <script>
    $("#loginSubmit").click(function () {
      var formData = {
        empIdInput: $("#empIdInput").val(),
        passwordInput: $("#passwordInput").val()
      }
      $.ajax({
        url: "apis/login.php",
        method: "POST",
        dataType: "JSON",
        data: formData,
        success: function (responseData) {
          if (!responseData.status) {
            $("#errors").text(responseData.message);
          }
          if (responseData.type == 'Employee') {
            alert(responseData.message);
            window.location.assign("employeeDashboard.php")
          }
          if (responseData.type == 'Admin') {
            alert(responseData.message);
            window.location.assign("adminDashboard.php")
          }
        },
        error: function () { },
      })
    })
  </script>
</body>

</html>