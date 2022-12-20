<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMyShow</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/login.css">
     <!--jquer-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
</head>
<body class='vh-100'>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/img/logo.png" alt="..." height="36">
              </a>
            <a href="#" class="navbar-brand text-dark me-auto">BookMyShow</a>
            </div>
    </nav>
    <!--login form-->
    <div class="h-100 d-flex justify-content-center align-items-center" style="background-color:gray">
        <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white m-auto">
            <h2 class="text-center mb-4 text-dark">User Login</h2>
            <form onsubmit="return false">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control border border-primary" id="usernameLogin">
                </div>
                <div id="usernameError" class="text-danger"></div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control border border-primary" id="passwordLogin">
                </div>
                <div id="passwordError" class="text-danger"></div>
                <div id="loginError" class="text-danger"></div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit" id="loginBtn">Login</button>
                </div>
            </form>
            <div class="mt-3">
                <p class="mb-0  text-center">Don't have an account? <a href="register.php"
                        class="text-primary fw-bold">Sign
                        Up</a></p>
            </div>
        </div>
    </div>
       </body>
       <footer class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-dark me-auto">© Copyright Ayesha Fatima</a>
            </div>
</footer>
<script>
     if (localStorage.getItem("userData") != null) {
            window.location.assign("userpage.php");

        }
    $("document").ready(function () {
  $("#loginBtn").click(function () {
        var usernameLogin = $("#usernameLogin").val();
        var passwordLogin = $("#passwordLogin").val();
        //status
        $.post("./api/loginApi.php",
            {
                data: {
                    source: 'normal',
                    usernameLogin: usernameLogin,
                    passwordLogin: passwordLogin
                }
            },
            function (res) {
                var response=JSON.parse(res);
                console.log(response);
                if(response.status==true){
                    alert(response.message);
                    localStorage.setItem('userData',JSON.stringify(response.data));
                    //console.log(localStorage.getItem('userData'));
                    window.location.assign('userpage.php') ;
                }
                else
                {
                    $('#loginError').text(response.message);
                 
                }
            });
    });
});

</script>
       </html>