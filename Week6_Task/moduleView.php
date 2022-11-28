<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/modules.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

session_start();
checkSession();
if (!isset($_GET["id"]) || !isset($_GET["menuId"])) {
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/main.css" />

    <!-- Main Script -->
    <script src="./assets/js/main.js"></script>

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="./assets/css/dashboard.css" />
    <link rel="stylesheet" href="./assets/css/module.css" />

    <!-- Dashboard JS -->
    <script src="./assets/js/module.js"></script>
</head>

<body class="bg bg-black bg-opacity-10 vh-100 d-flex flex-column">
    <!-- Header -->
    <div class="header bg-white p-3 d-flex align-items-center justify-content-between">
        <!-- Left of Header -->
        <div class="left d-flex align-items-center">
            <!-- Brand -->
            <div class="brand d-flex align-items-center">
                <!-- Logo Image -->
                <div class="logo">
                    <img width="40px" src="./assets/images/logo.png" alt="" />
                </div>

                <!-- Logo Text -->
                <div class="logoText ms-2 flex-column justify-content-center d-none d-sm-flex">
                    <h5 class="m-0 fw-bold">IFMIS</h5>
                    <span class="fs-12">&copy; Governament of India</span>
                </div>
            </div>

            <!-- Mobile Menu Btn -->
            <button class="btn ms-2 fs-3 d-block d-md-none" id="mobileMenuBtn">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <!-- Right -->
        <div class="right">
            <!-- Menu -->
            <ul class="list-unstyled m-0 d-flex">
                <!-- Modules Button -->
                <li>
                    <button class="btn" onclick="location.href='dashboard.php'">
                        <i class="bi bi-boxes"></i>
                        <span class="d-none d-sm-inline">Modules</span>
                    </button>
                </li>

                <!-- Profile Button -->
                <li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person"></i>
                            <span><?= $_SESSION["userName"] ?></span>
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

    <!-- Body -->
    <div class="body d-flex h-100 d-flex">

        <!-- Sidebar -->
        <div class="sidebar bg-white border-top position-absolute h-100">

            <!--   Menu     -->
            <ul class="list-unstyled text-black m-0 d-flex flex-column">
                <!-- Home -->
                
                <li onclick="gotoMenu('0')" 
                    class="
                        p-2 
                        d-flex 
                        align-items-center
                        <?php 
                            if($_GET["menuId"] == 0){
                                echo "bg-secondary bg-opacity-10";
                            }
                        ?>
                        " role="button">
                    <span class="">Home</span>
                </li>
                <!-- Getting Menu From Database -->
                <?php
                $moduleMenuResponse = (new Modules())->getModuleMenu($_GET['id']);
                if ($moduleMenuResponse["status"]) {
                    foreach ($moduleMenuResponse["data"] as $menuOption) {
                        if($menuOption["id"] == $_GET["menuId"]){
                            echo '<li
                            onclick="gotoMenu(\'' . $menuOption["id"] . '\')"
                            class="p-2 d-flex align-items-center bg-black bg-opacity-10"
                            role="button"
                            >
                                <span class="">' . $menuOption["name"] . '</span>
                            </li>';
                        } else {
                            echo '<li
                            onclick="gotoMenu(\'' . $menuOption["id"] . '\')"
                            class="p-2 d-flex align-items-center"
                            role="button"
                            >
                                <span class="">' . $menuOption["name"] . '</span>
                            </li>';
                        }
                        
                    }
                }
                ?>
            </ul>
        </div>

        <!-- Mobile Menu Background -->
        <div id="mobileMenuBackground"
            class="mobileMenuBackground position-absolute bg-black bg-opacity-50 h-100 w-100 d-none d-md-none"></div>


        <!-- Content -->
        <div class="content w-100 h-100 left-0 p-3">
            <?php

            // Getting Menu ID from GET
            $menuId = $_GET["menuId"];

            // Checking if Menu ID is 0
            if ($menuId == 0) {

                // Getting URL of Home From Module Class
                $moduleUrlResponse = (new Modules())->getModuleUrl([$_GET["id"]]);

                // If File exist will include
                if (!@include($moduleUrlResponse)) {

                    // If not found sending not found response
                    echo "Page Not Found!";
                    return;
                }
            } else {
                $moduleUrlResponse = (new Modules())->getMenuUrlById($menuId);
                if (!$moduleUrlResponse) {
                    echo "Page Not Found!";
                    return;
                }
                if (!@include($_SERVER['DOCUMENT_ROOT'] . $moduleUrlResponse)) {
                    echo "Page Not Found!";
                    return;
                }
            }
            ?>
        </div>
    </div>

    <!-- Mobile Sidebar Background -->

    <!-- Loading -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/loading.php"; ?>
</body>

</html>