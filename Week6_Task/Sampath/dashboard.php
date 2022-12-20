<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/modules.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/header.php";

if(!isset($_SESSION))
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/main.css" />


    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="./assets/css/dashboard.css" />
</head>

<body class="bg bg-light">
    <!-- Header -->
    <?php echo getHeader(""); ?>
    <div class="content row justify-content-center py-3 px-4 m-0">
        <div class="section p-1 p-md-3">
            <div class="title">
                <h4 class="fw-semibold">Modules</h4>
            </div>
            <div class="modules d-flex gap-3 flex-wrap">
                <?php
                $userId = (new Encryption())->decrypt($_SESSION["userDetails"]);
                $moduleResponse = (new Modules())->getModules($userId);
                if ($moduleResponse["status"] == true) {
                    foreach ($moduleResponse["data"] as $module) {
                        echo '<div class="module d-flex bg-white p-3 rounded-3 align-items-center">
                                <div class="logo p-2 text-success">
                                    <i class="fw-bold bi bi-' . $module["logo"] . ' fs-1"></i>
                                </div>
                                <div class="name p-2 d-flex flex-column">
                                    <span class="fw-bold">' . $module["name"] . '</span>
                                    <a class="text-decoration-none btn btn-dark" href="moduleView.php?id=' . $module['id'] . '&menuId=0" class="">
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
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/loading.php"; ?>

    <!-- Main Script -->
    <script src="./assets/js/main.js"></script>
    <!-- Dashboard JS -->
    <script src="./assets/js/dashboard.js"></script>
</body>

</html>