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
    <!--register form-->
    <div class="h-100 d-flex justify-content-center align-items-center" style="background-color:gray">
        <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white m-auto">
            <h2 class="text-center mb-4 text-dark">Register Now!</h2>
            <form onsubmit="return false;">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control border border-primary" id="registerEmail">
                </div>
                <div id="errorEmail" class="text-danger"></div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control border border-primary" id="registerUsername">
                </div>
                <div id="errorUsername" class="text-danger"></div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control border border-primary" id="registerPassword">
                </div>
                <div id="errorPassword" class="text-danger"></div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control border border-primary" id="registerCPassword">
                </div>
                <div id="errorCPassword" class="text-danger"></div>
                <div id="errorRegister" class="text-danger"></div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit" id="registerBtn">Sign Up</button>
                </div>
            </form>
            <div class="mt-3">
                <p class="mb-0  text-center">Existing User? <a href="login.php"
                        class="text-primary fw-bold">Log in</a></p>
            </div>
        </div>
    </div>
       </body>
       <footer class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-dark me-auto">© Copyright Ayesha Fatima</a>
            </div>
</footer>
<!--ajax call to api-->
<script>
     if (localStorage.getItem("userData") != null) {
            window.location.assign("userpage.php");

        }
    //register API
    $("document").ready(function () {
        console.log("Hello")
    $("#registerBtn").click(function () {
        var registerEmail = $("#registerEmail").val();
        var registerUsername = $("#registerUsername").val();
        var registerPassword = $("#registerPassword").val();
        var registerCPassword = $("#registerCPassword").val();
        //status
        $.post("./api/registerApi.php",
            {
                data: {
                    source: 'normal',
                    registerEmail: registerEmail,
                    registerUsername: registerUsername,
                    registerPassword: registerPassword,
                    registerCPassword: registerCPassword
                }
            },
            function (res) {
                var response = JSON.parse(res);
                console.log(response);
                $("#errorEmail").html('');
                $("#errorUsername").html('');
                $("#errorPassword").html('');
                $("#errorCPassword").html('');
                if(response.status==false){
                    //check if errors array has data
                    if(response.errors){
                       $("#errorEmail").html(response.errors.errorEmail);
                       $("#errorUsername").html(response.errors.errorUsername);
                       $("#errorPassword").html(response.errors.errorPassword);
                       $("#errorCPassword").html(response.errors.errorCPassword);
                    }
                    //no errors are present,proceed to check if email exists or not
                   else{
                    $("#errorRegister").html(response.message);
                    }
                }
                //new user register and go to login page
                else{
                    alert("User registration successful!");
                    window.location.assign('login.php') ;
                }
                
            });
    });
});</script>

       </html>