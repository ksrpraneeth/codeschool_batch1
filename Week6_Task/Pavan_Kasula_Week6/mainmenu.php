<?php
use LDAP\Result;
include 'APIs/db.php';
include 'APIS/response.php';

session_start();
if (!(isset($_SESSION['user_id']))) {
  header("location: ./login.php");
}

$statement = $pdo->prepare("select m.module_name,u.username from modules m,users u where u.id=?;");
$statement->execute([$_SESSION['user_id']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Main Menu</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="ifmis.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

</head>

<body>
  <div class="container-fluid m-0 p-0 fonts">
    <div class="header">
      <div class="row">
        <div class="bg-image d-flex align-items-center justify-content-md-between justify-content-around"
          style="background-image: url('pictures/bg_city.jpeg')">
          <div class="col-3 d-none d-md-block left d-flex align-items-center">
            <img class="w-75" src="https://d20exy1ygbh3sg.cloudfront.net/fms/images/newUi/ifmis-logo.png" alt="" />
          </div>
          <div class="d-xs-block d-lg-none d-flex ms-5">
            <img src="https://ifmis.telangana.gov.in/images/govt_logo.png" width="60px" height="60px" class=""
              alt="..." />
            <h3 class="text-white">IFMIS</h3>
          </div>

          <div class="gap"></div>

          <div class="col-6 center text-white d-flex align-items-center">
            <div class="px-1 d-none d-lg-block">
              <button type="button" class="btn btn-secondary rounded-0 d-flex align-items-center"
                style="font-size: 15px">
                <i class="fa-solid fa-house"></i>
                <p class="m-1">Modules</p>
              </button>
            </div>

            <div class="px-1 d-none d-lg-block">
              <button type="button" class="btn btn-secondary rounded-0 d-flex align-items-center"
                style="font-size: 15px">
                <i class="fa-regular fa-user"></i>
                <p class="m-1">Profile</p>
              </button>
            </div>

            <div class="px-1 ">
              <a type="button" class="btn btn-secondary rounded-0 d-flex align-items-center" style="font-size: 13px"
                href="APIs/logout.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>

                <p class="m-1" href="APIs/logout.php">Logout</p>
              </a>
            </div>
            <div class="row text-white d-none d-lg-block">
              <h6 class="m-0 text-muted" style="font-size:10px">Last Login</h6>
              <h6 class="m-0" style="font-size:10px" id="displayDateTime">
                <?php echo date("d-M-Y") ?>
              </h6>
              <h6 class="m-0" style="font-size:10px" id="displayDateTime">

                <?php
                date_default_timezone_set("Asia/kolkata");
                echo date("h:i:a")
                  ?>
              </h6>


            </div>
            &nbsp; &nbsp;

            <div class="right d-flex align-items-center">

            </div>
          </div>
          <div class="gap col-2"></div>

          <div>&nbsp;</div>

          <div class="dropdown me-5 ">
            <button class="btn btn-secondary dropdown-toggle rounded-0 d-flex align-items-center" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="fa-regular fa-user"></i>
              <h6 class="px-2"><?php echo $resultSet[0]["username"]?></h6> 
            </button>
           
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="APIs/logout.php">Logout! </a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid circle1" style="background-image: url('pictures/city.jpg')">
    <div class="box1  flex-column justify-content-center align-items-center d-none d-lg-flex" type="button">
      <i class="fa-solid fa-house text-white"></i> <br />
      <div class="text-white" id="depositAccounts"><?php echo $resultSet[0]["module_name"] ?></div>

    </div>
    <div class="box1 flex-column justify-content-center align-items-center  d-flex" type="button"
    onclick="window.location.assign('form.php')">

      <i class="fa-regular fa-credit-card text-white"></i> <br />
      <div class="text-white" id="billSection"><?php echo $resultSet[1]["module_name"] ?></div>
      
    </div>
    <div class="box1 flex-column justify-content-center align-items-center d-none d-lg-flex" type="button">
      <i class="fa-solid fa-people-group text-white"></i> <br />
      <div class="text-white" id="hrSection"><?php echo $resultSet[2]["module_name"] ?></div>
    </div>
    <div class="box1  flex-column justify-content-center align-items-center d-none d-lg-flex" type="button">
      <i class="fa-solid fa-house text-white"></i> <br />
      <div class="text-white" id="prc2020"><?php echo $resultSet[3]["module_name"] ?></div>
    </div>
    <div class="box1 flex-column justify-content-center align-items-center d-none d-lg-flex" type="button">
      <i class="fa-brands fa-youtube text-white"></i> <br />
      <div class="text-white" id="tutorialSection"><?php echo $resultSet[4]["module_name"] ?></div>
    </div>

    <div class="spacecircle">..</div>
  </div>
</body>

</html>