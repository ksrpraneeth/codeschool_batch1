<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/modules.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/header.php";
if(!isset($_SESSION))    
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/main.css" />


    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="./assets/css/dashboard.css" />
    <link rel="stylesheet" href="./assets/css/module.css" />


</head>

<body class="bg bg-black bg-opacity-10 d-flex min-vh-100 flex-column">
    <!-- Header -->
    <?php echo getHeader("moduleView"); ?>
    <!-- Body -->
    <div class="body d-flex d-flex min-vh-100">

        <!-- Sidebar -->
        <div class="sidebar bg-white border-top position-absolute h-100">

            <!--   Menu     -->
            <ul class="list-unstyled text-black m-0 d-flex flex-column">
                <!-- Home -->

                <li onclick="gotoMenu('0', <?= $_GET['id'] ?>)" class="
                            p-2 
                            d-flex 
                            align-items-center
                            <?php
                            if ($_GET["menuId"] == 0) {
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
                        if ($menuOption["id"] == $_GET["menuId"]) {
                            echo '<li
                                onclick="gotoMenu(\'' . $menuOption["id"] . '\', \''.$menuOption["module_id"].'\')"
                                class="p-2 d-flex align-items-center bg-black bg-opacity-10"
                                role="button"
                                >
                                    <span class="">' . $menuOption["name"] . '</span>
                                </li>';
                        } else {
                            echo '<li
                            onclick="gotoMenu(\'' . $menuOption["id"] . '\', \''.$menuOption["module_id"].'\')"
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
        <div id="mobileMenuBackground" class="mobileMenuBackground position-absolute bg-black bg-opacity-50 h-100 w-100 d-none d-md-none"></div>


        <!-- Content -->
        <div class="content w-100 min-h-100 left-0 p-3">
            <?php

            // Getting Menu ID from GET
            $menuId = $_GET["menuId"];
            $moduleId = $_GET["id"];

            // Checking if Menu ID is 0
            if ($menuId == 0) {

                // Getting URL of Home From Module Class
                $moduleUrlResponse = (new Modules())->getModuleUrl([$_GET["id"]]);

                // If File exist will include
                try {
                    if (!@include($moduleUrlResponse)) {

                        // If not found sending not found response
                        echo "Page Not Found!";
                    }
                } catch (\ValueError $e) {
                    echo "Page Not Found!";
                }
            } else {
                $moduleUrlResponse = (new Modules())->getMenuUrlById([$menuId, $moduleId]);
                if (!$moduleUrlResponse) {
                    echo "Page Not Found!";
                } else {
                    if (!@include($_SERVER['DOCUMENT_ROOT'] . $moduleUrlResponse)) {
                        echo "Page Not Found!";
                    }
                }
            }
            ?>
        </div>
    </div>

    <!-- Mobile Sidebar Background -->

    <!-- Loading -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/loading.php"; ?>

    <!-- Main Script -->
    <script src="./assets/js/main.js"></script>
    <!-- Dashboard JS -->
    <script src="./assets/js/module.js"></script>
</body>

</html>