<?php

session_start();
if (isset($_SESSION["userDetails"])) {
    header("Location: dashboard.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login || IFMIS</title>

        <!-- Bootstrap -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"
        ></script>

        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Main CSS -->
        <link rel="stylesheet" href="./assets/css/main.css" />
        
        <!-- Index CSS -->
        <link rel="stylesheet" href="./assets/css/index.css" />
        
    </head>
    <body>
        <div
            class="mainDiv position-absolute min-vh-100 min-vw-100 top-0 left-0 d-flex row m-0"
        >
            <!-- Left -->
            <div
                class="left p-2 p-sm-4 align-items-center d-flex justify-content-start flex-column"
            >
                <!-- Form -->
                <div
                    class="formDiv rounded-3 col-12 col-sm-8 col-md-6 col-lg-4 px-5 py-3 mt-5 d-flex flex-column"
                >
                    <!-- Logo -->
                    <div
                        class="logo d-flex align-items-center pb-1 w-100"
                    >
                        <img
                            src="https://ifmis.telangana.gov.in/images/govt_logo.png"
                            alt=""
                        />
                    </div>
                    <!-- Header -->
                    <div class="header mt-2">
                        <h3 class="fw-smeibold">Login</h3>
                        <span class="text-black-50"
                            >Login using username and password</span
                        >
                    </div>

                    <!-- Form -->
                    <form onsubmit="return false" class="">
                        <div class="mainErrorDiv text-danger">
                            <span id="mainErrorText"></span>
                        </div>
                        <!-- Username -->
                        <div class="inputGroup col-12 my-3">
                            <label for="username">Username</label>
                            <input
                                type="text"
                                id="username"
                                placeholder="Enter your username..."
                                class="form-control"
                            />
                            <div class="usernameErrorDiv text-danger">
                                <span id="usernameErrorText"></span>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="inputGroup col-12 my-3">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                id="password"
                                placeholder="Enter your password..."
                                class="form-control"
                            />
                            <div class="passwordErrorDiv text-danger">
                                <span id="passwordErrorText"></span>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div
                            class="loginBtn d-flex justify-content-center mt-5"
                        >
                            <button id="loginBtn" class="btn btn-dark col-6">
                                Sign In
                            </button>
                        </div>
                    </form>

                    <!-- Footer -->
                    <div class="footer mt-2 text-center">
                        <span class="text-black-50"
                            >&copy; Governament of Telangana</span
                        >
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/loading.php"; ?>

        <!-- Main JS -->
        <script src="./assets/js/main.js"></script>
        <!-- Index JS -->
        <script src="./assets/js/index.js"></script>
    </body>
</html>
