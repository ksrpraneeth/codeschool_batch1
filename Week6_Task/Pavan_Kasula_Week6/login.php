<?php
session_start();
if ((isset($_SESSION['user_id']))) {
  header("location: ./mainmenu.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | IFMIS</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="ifmis.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
  <div class="container-fluid m-0 p-0 ">
    <div class="logo d-flex" style="background-image: url('pictures/bg_city.jpeg')">
      <div class="left col-lg-4 m-2 mx-4">
        <img src="pictures/ifmislogo.png" width="300px" height="80px" class="" />
      </div>
      <div class="col-lg-2 m-0 "></div>
      <div class="right col-lg-4 d-flex">
        <div class="px-1 m-0  d-none d-lg-block"><img src="pictures/kcr.png" /></div>
        <div class="px-1 m-0 d-none d-lg-block  "><img src="pictures/harishrao.png" /></div>
      </div>
    </div>
    <div class="container-fluid bgs bg-opacity-">
      <div class="login d-flex justify-content-center align-items-center">
        <form style="max-width: 500px; margin: auto" class="card p-3 my-5" onsubmit="return false">
          <h6 class="mx-4 px-3">User Login</h6>
          <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field form-control-sm" type="text" placeholder="Username" name="usrnm"
              id="UserIdInput" />

          </div>
          <div class="mx-5">
            <p class="text-danger" id="usernameerror"> </p>
          </div>

          <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field form-control-sm" type="password" placeholder="Password" name="psw"
              id="passwordInput" />


          </div>
          <div class="mx-5">
            <p class="text-danger" id="errors"> </p>
          </div>

          <div class=" d-lg-flex align-items-center">
            <span type="link" class="col-12 col-lg-6 btn" style="font-size: 16px;">ForgotPassword?</span>
            <button type="submit" class="col-12 col-lg-4 btn btn-success mx-lg-5" id="signInSubmit">
              SIGNIN
            </button>
          </div>
        </form>
      </div>
      <div class="space1">.</div>
    </div>
  </div>
</body>

</html>