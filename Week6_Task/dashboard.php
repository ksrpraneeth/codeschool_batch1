<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/modules.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

session_start();
checkSession()
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>

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

        <!-- Bootstrap Icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        />

        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Main CSS -->
        <link rel="stylesheet" href="./assets/css/main.css" />

        <!-- Main Script -->
        <script src="./assets/js/main.js"></script>

        <!-- Dashboard CSS -->
        <link rel="stylesheet" href="./assets/css/dashboard.css" />

        <!-- Dashboard JS -->
        <script src="./assets/js/dashboard.js"></script>
    </head>
    <body class="bg bg-light">
        <!-- Header -->
        <div
            class="header border-bottom bg-white p-3 d-flex align-items-center justify-content-between"
        >
            <!-- Left of Header -->
            <div class="left">
                <!-- Brand -->
                <div class="brand d-flex align-items-center">
                    <!-- Logo Image -->
                    <div class="logo">
                        <img
                            width="40px"
                            src="./assets/images/logo.png"
                            alt=""
                        />
                    </div>

                    <!-- Logo Text -->
                    <div
                        class="logoText ms-2 flex-column justify-content-center d-none d-sm-flex"
                    >
                        <h5 class="m-0 fw-bold">IFMIS</h5>
                        <span class="fs-12">&copy; Governament of India</span>
                    </div>
                </div>
            </div>

            <!-- Right -->
            <div class="right">
                <!-- Menu -->
                <ul class="list-unstyled m-0 d-flex">
                    <!-- Modules Button -->
                    <li>
                        <button class="btn">
                            <i class="bi bi-boxes"></i>
                            <span>Modules</span>
                        </button>
                    </li>

                    <!-- Profile Button -->
                    <li>
                        <div class="dropdown">
                            <button
                                class="btn dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <i class="bi bi-person"></i>
                                <span><?=$_SESSION["userName"]?></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="dropdown-item" role="button" onclick="location.href='logout.php'">
                                        <i class="bi bi-escape"></i>
                                        <span>Logout</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content row justify-content-center py-3 px-4 m-0">
            <div class="section p-3">
                <div class="title">
                    <h4 class="fw-semibold">Modules</h4>
                </div>
                <div class="modules d-flex gap-3">
                    <?php
$moduleResponse = (new Modules())->getModules();
if ($moduleResponse["status"] == true) {
    foreach ($moduleResponse["data"] as $module) {
        echo '<div class="module d-flex bg-white p-3 rounded-3 align-items-center">
                                                    <div class="logo p-2 text-success">
                                                        <i class="fw-bold bi bi-' . $module["logo"] . ' fs-1"></i>
                                                    </div>
                                                    <div class="name p-2 d-flex flex-column">
                                                        <span class="fw-bold">' . $module["name"] . '</span>
                                                        <a class="text-decoration-none" href="moduleView.php?id=' . $module['id'] . '&menuId=0" class="">
                                                            <span>View</span>
                                                        </a>
                                                    </div>
                                                </div>';
    }
} else {
    echo "No modules found!";
}
?>

                </div>
            </div>
        </div>
        <!-- Loading -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/loading.php";?>
    </body>
</html>
