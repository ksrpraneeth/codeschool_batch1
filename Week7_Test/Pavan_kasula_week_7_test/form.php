<?php 
include 'apis/db.php';
include 'apis/response.php';


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body style="background-image: url('pictures/bg3.jpg')">
    <div class="container-fluid m-0 p-0">
      <header class="bg-dark">
        <div class="row p-2">
          <div class="col-md-4" type="button"  onclick="location.assign('details.php')" id>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="36"
              height="36"
              fill="currentColor"
              class="bi bi-clipboard2-fill text-warning"
              viewBox="0 0 16 16"
            >
              <path
                d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"
              />
              <path
                d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z"
              />
            </svg>
            <label class="text-warning">Employee Details</label>
          </div>
          <div class="d-flex col-md-3 align-items-center">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="46"
              height="46"
              fill="currentColor"
              class="bi bi-chevron-left text-white"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"
              />
            </svg>
            <h4 class="text-white">CODESCHOOL</h4>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="46"
              height="46"
              fill="currentColor"
              class="bi bi-chevron-right text-white"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
              />
            </svg>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-2">
            <a type="button" class="btn btn-warning" id="logoutButton"
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="26"
                height="26"
                fill="currentColor"
                class="bi bi-reply-all-fill text-dark"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"
                />
                <path
                  d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"
                />
              </svg>
              logout</a
            >
          </div>
        </div>
      </header>
      <div class="row mt-3">
        <div class="box col-md-3"></div>
        <d class="boxs col-md-6 bg-dark bg-opacity-50 p-4">
          <div class="email">
            <h5
              class="col-md-12 text-warning bg-secondary bg-opacity-25 rounded-3 p-2"
              for="emailInput"
            >
              ADD EMPLOYEE
            </h5>
            <label class="col-md-12 text-white" for="First Name"
              >First Name
            </label>
            <input
              class="form-control form-control-sm col-md-12"
              type="email"
              id="firstNameInput"
              placeholder="Enter First Name here"
            />
          </div>
          <div class="">
            <label class="col-md-12 text-white" for="lastNamea"
              >Last Name
            </label>
            <input
              class="form-control form-control-sm col-md-12"
              type="text"
              id="lastNameInput"
              placeholder="Enter last Name here"
            />
          </div>
          <div class="">
            <label class="col-md-12 text-white" for="confirmPasswordInput"
              >Aadhaar Number
            </label>
            <input
              class="form-control form-control-sm col-md-12"
              type="text"
              id="aadhaarInput"
              placeholder="Enter Aadhaar Number here"
            />
          </div>
          <div class="">
            <label class="col-md-12 text-white" for="NumberInput"
              >Phone Number
            </label>
            <input
              class="form-control form-control-sm col-md-12"
              type="text"
              id="phoneNumberInput"
              placeholder="Enter Phone Number here"
            />
          </div>
          <div class="row d-flex">
            <label class=" text-white">Departments</label>
            <select class=" form-select form-select-sm mb-3" id="selectDesignation" >
                <option value="" selected disabled>Select </option>

              <?php
                $statement = $pdo->prepare("select * from departments");
                $statement->execute();
                $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
                if($resultSet){
                    foreach ($resultSet as $departments){
                      echo "<option value=" .$departments['id']. ">" .$departments['department_name'] . "</option>";
                    }
                }
                ?>

            </select>
          </div>
          <div class="row d-flex">
            <label class=" text-white">Designations</label>
            <select class=" form-select form-select-sm mb-3" id="selectDepartment" >
                <option value="" selected disabled>Select </option>

              <?php
                $statement = $pdo->prepare("select * from designations ");
                $statement->execute();
                $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
                if($resultSet){
                    foreach ($resultSet as $designation){
                      echo "<option value=" .$designation['id']. ">" .$designation['designation'] . "</option>";
                    }
                }
                ?>
                
            </select>
          </div>
          
          
          <div
            class="row justify-content-center col-md-12"
           
          >
            <p class="col-md-12 text-danger" id="errors"></p>
            <button class="btn btn-warning col-md-10" id="addButton" onclick="addEmployees()">
              ADD
            </button>
          </div>
        </div>
        <div class="col-3 box"></div>
      </div>
    </div>
  </body>

  <script>
    if (localStorage.getItem("username") == null) {
      window.location.assign("login.php");
    }
    $("#logoutButton").click(function () {
      localStorage.removeItem("username");
      window.location.assign("login.php");
    });
  </script>
</html>
