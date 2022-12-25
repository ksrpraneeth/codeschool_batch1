<?php
include 'APIs/db.php';
include 'APIs/response.php';

session_start();
if (!(isset($_SESSION['user_id']))) {
  header("location: ./login.php");
}

$statement = $pdo->prepare("select s.sidebar_name, u.username from sidebar s,users u where s.module_id=?");
$statement->execute([$_SESSION['user_id']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>form</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./form.js"></script>
</head>

<body style="
      font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
      font-size: 1.1rem;
    ">
  <div class="container-fluid m-0 p-0">
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
                style="font-size: 15px" onclick="window.location.assign('mainmenu.php')">
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

            <div class="px-1">
              <a type="button" class="btn btn-secondary rounded-0 d-flex align-items-center" style="font-size: 13px"
                href="APIs/logout.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>

                <p class="m-1" type="button" href="APIs/logout.php">Logout</p>
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

          </div>
          <div class="gap col-2"></div>

          <div>&nbsp;</div>

          <div class="dropdown me-5">
            <button class="btn btn-secondary dropdown-toggle rounded-0 d-flex align-items-center" type="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-regular fa-user"></i>
              <h6 class="px-2">
                <?php echo $resultSet[0]["username"] ?>
              </h6>
              <p class="d-none" id="userId"><?php echo $_SESSION['user_id']  ?></p> 
            </button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" type="button" href="APIs/logout.php">Logout</a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row d-flex">
        <div class="sidebar col-lg-2 m-0 p-0 d-none d-lg-block">
          <div class="w3-bar-block w3-light-grey w3-card">
            <a href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
              <?php echo $resultSet[0]["sidebar_name"] ?>
            </a>
            <div class="w3-dropdown-hover" style="background-color: rgb(0, 27, 71)">
              <button class="w3-button text-white" style="background-color: rgb(0, 27, 71)">
                <?php echo $resultSet[1]["sidebar_name"] ?>
                <i class="fa fa-caret-down" style="background-color: rgb(0, 27, 71)"></i>
              </button>

              <div class="w3-dropdown-content w3-bar-block" style="background-color: rgb(0, 27, 71)"></div>

              <button class="w3-button text-white" style="background-color: rgb(0, 27, 71)">
                <?php echo $resultSet[2]["sidebar_name"] ?>
                <i class="fa fa-caret-down" style="background-color: rgb(0, 27, 71)"></i>
              </button>
            </div>

            <button href="#" class="w3-bar-item w3-button text-white" style="background-color:rgb(0, 27, 71)">
              <?php echo $resultSet[3]["sidebar_name"] ?>
            </button>
            <button href="#" class="billEntry w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)"
              onclick="unHideForm()">
              <?php echo $resultSet[4]["sidebar_name"] ?>
            </button>
            <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
              <?php echo $resultSet[5]["sidebar_name"] ?>
            </button>
            <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">

              <?php echo $resultSet[6]["sidebar_name"] ?>
            </button>
            <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
              <?php echo $resultSet[7]["sidebar_name"] ?>
            </button>

            <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
              <?php echo $resultSet[8]["sidebar_name"] ?></a>
              <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
                <?php echo $resultSet[9]["sidebar_name"] ?></a>
                <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
                  <?php echo $resultSet[10]["sidebar_name"] ?></a>
                  <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
                    <?php echo $resultSet[11]["sidebar_name"] ?></a>
                    <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
                      <?php echo $resultSet[12]["sidebar_name"] ?>
                    </button>
                    <button href="#" class="w3-bar-item w3-button text-white" style="background-color: rgb(0, 27, 71)">
                      <?php echo $resultSet[13]["sidebar_name"] ?>
                    </button>
          </div>
        </div>
        <div class="container col-lg-10 m-0 p-0 card">
          <div class="row text-white p-0 m-2 mx-3 w3-card">
            <div class="supp col-lg-12 py-3" id="salaryBills">
              <b> FORM 47- SALARY BILLS </b>
            </div>
            <div class="supp col-lg-12 py-3" id="otherBills">
              <b> OTHER BILLS </b>
            </div>
            <div class="supp col-lg-12 py-3" id="formsuppl">
              <b> FORM 47- SUPPLEMENTARY BILLS </b>
            </div>
            <div class="text-black border border-lg-dark p-1 m-2 p-2 col-lg-8  flex-wrap" id="mainForm">
              <input type="radio" name="formbills" onclick="unHideSalaryBill()" />
              <label>Form 47- Salary Bills</label>

              <input type="radio" name="formbills" onclick=" unHideotherBill()" />
              <label for="css">Other bills</label>
              <input type="radio" name="formbills" onclick="unHideForm47()" />
              <label for="javascript">Form 47-Supplementary Bills</label>
            </div>
            <div class="d-flex text-dark mt-3" id="formSuppBills">
              <i class="fa-solid fa-file" style="font-size: 20px"></i>
              <strong class="px-3"> FORM-47 SUPPLEMENTARY BILLS</strong>
            </div>
            <hr class="border-3" id="hr" />

            <div class="row text-dark col-lg-8 mt-3" id="selectSupplBill">
              <b class=" col-md-4"> Select Bill Type</b>
              <div class=" col-md-4">
                <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                  <option  selected id="supplementarySalaryBills" >Supplementary Salary Bills</option>

                </select>
              </div>
            </div>
            <div class="row text-dark col-lg-8 mt-2" id="forms">
              <b class="col-md-4"> Form No</b>
              <div class="col-md-4">47</div>
            </div>
            <div class="row text-dark col-lg-8 my-1 mt-3" id="empSearchFilterType">
              <div class="col-md-4">
                <b>EMP Search Filter Type</b>
              </div>
              <div class="text-black col-lg-8">
                <input type="radio" name="EmployeeSearchFilter" value="0"  onclick="billIdUnHide()" />
                <label for="html">Bill ID</label>

                <input type="radio" name="EmployeeSearchFilter" value="1" onclick="employeeCodeUnHide()" />
                <label for="css">EMP Code</label>
                <input type="radio" name="EmployeeSearchFilter" value="2" onclick="bankAcNoUnHide()" />
                <label for="javascript">Bank AC No</label>
              </div>
            </div>
            <div class="row text-dark col-lg-8 mt-3" id="selectBillId">
              <b class="col-md-4"> Select Bill ID</b>
              <div class="col-md-4">
                <select class="form-select form-select-md mb-3" id="billIdSelect" onchange="billIdSelecter(event)">
                  <option value="" selected disabled>Select</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
            <div class=" row text-dark col-lg-8 mt-3" id="enterEmpCode">
              <b class="col-md-4"> Enter EMPCODE</b>
              <div class="col-md-4 d-flex">
                <input type="text" class="form-control form-control-md" id="empCodeInput">
                <button class="btn btn-primary" onclick="EmpNameFromEmpCode(event)">search</button>
              </div>
              <div class="row text-dark col-lg-8 mt-3 d-none">
            <p class="text-dark" id="emCodeFromBankAc"> </p>
            </div>
            <div class="row text-dark col-lg-8 mt-3 d-none">
               <p class="text-dark" id="emCodeFromBillId"> </p>
              </div>
            </div>
            <div class="row text-dark col-lg-8 mt-3 " id="enterBankAcNO">
              <b class="col-md-4"> Enter Bank AC NO</b>
              <div class="col-md-4 d-flex">
                <input type="text" class="form-control form-control-md  " id="enterBankAcInput">
                <button class="btn btn-primary" onclick="EmpNameFromBankAcNo(event)">search</button>
              </div>
            </div>
            <div class=row id="inputErrors">
              <p class="col-md-3" id=""> </p>
              <p class=" text-danger col-md-3" id="inputError"> </p>
            </div>



            <div class="row text-dark col-lg-8 mt-3 " id="selectEmp">
              <b class="col-md-4"> Select Employee</b>
              <div class="col-md-4">
                <select class="form-select form-select-md mb-3" id="selectEmployee" onchange="employeeSelectFromBill(this)">



                </select>
              </div>
            </div>
            <div class="row text-dark col-lg-8 mt-3 " id="empNameEmp">
              <b class="col-md-4">Employe Name</b>
              <div class="col-md-4 ">
                <p class="text-dark" id="emplnameFromEmpCode"> </p>

              </div>
            </div>
            
            <div class="row text-dark col-lg-8 mt-3 " id="empNameBank">
              <b class="col-md-4">Employe Name</b>
              <div class="col-md-4">

                <p class="text-dark" id="emplnameFromBankAcNo"> </p>
              </div>
            </div>

            <div class="row text-dark col-lg-8 mt-2" id="dateId">
              <b class="col-lg-4"> Select Date</b>
              <div class="col-lg-4 d-flex">
                <div class="px-2">
                  <input type="month" id="dateInput" />
                </div>

              </div>
            </div>
            <div class="row text-dark col-lg-8 my-4" id="employeeSearchBill">
              <div class="col-lg-4">
                <b>EMP Search Filter Type</b>
              </div>
              <div class="text-black col-lg-8">
                <input type="radio" id="billEarnings" value="0" name="transaction" onclick="showBillIdtoEarningType()" />
                <label>Earnings</label>
                <input type="radio" id="billDeductions" value="1" name="transaction" onclick="showBillIdToDeductionType()" />
                <label>Deductions</label>
              </div>
            </div>
            <div class="row text-dark col-lg-8 my-4" id="empSearchEmp">
              <div class="col-lg-4">
                <b>EMP Search Filter Type</b>
              </div>
              <div class="text-black col-lg-8">
                <input type="radio" id="empEarnings" name="transaction" value="0"  onclick="showEarningsFromEmpCode()" />
                <label>Earnings</label>
                <input type="radio" id="empDeductions" name="transaction" value="1" onclick="showDeductionsFromEmpCode()" />
                <label>Deductions</label>
              </div>
            </div>
            <div class="row text-dark col-lg-8 my-4" id="empSearchBank">
              <div class="col-lg-4">
                <b>EMP Search Filter Type</b>
              </div>
              <div class="text-black col-lg-8">
                <input type="radio" id="bankEarnings" name="transaction" value="0" onclick="showEarningsFromBankAcNO()" />
                <label>Earnings</label>
                <input type="radio" id="bankDeductions" name="transaction" value="1" onclick="showDeductionsFromBankAcNO()" />
                <label>Deductions</label>
              </div>
            </div>
            <div class="row text-dark col-lg-8 my-2" id="transactionType">
              <b class="col-lg-4"> Select Type</b>
              <div class="col-lg-4">
                <select class="form-select form-select-md mb-3" id="earningType">

                </select>
              </div>
            </div>
            <div class="row text-dark col-lg-8 my-2" id="enterAmount">
              <b class="col-lg-4">Enter Amount</b>
              <div class="col-lg-6 d-lg-flex">

                <input type="text" id="amountInput" class="col-12 col-lg-3 form-control" placeholder="Due">
                <button class="btn btn-success col-12 col-lg-3" onclick=" addIntoEarningsAndDeductionTables()">
                  ADD
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6" id="earningTable">
                <table class="table table-bordered ">
                  <thead>
                    <tr class="bg-primary bg-opacity-10 text-primary text-center ">
                      <th scope="col">Earnings</th>
                      <th scope="col"> Net Amount</th>

                    </tr>
                  </thead>
                  <tbody class="text-start" id="tableEaringsPrint">

                  </tbody>
                  <tfoot id="TotalofEarnings">
                    <tr>
                  <td>total</td>    
                  <td></td>    
                  </tr>

</tfoot>
                </table>
              </div>
              <div class="col-lg-6" id="deductionTable">
                <table class="table table-bordered">
                  <thead class="bg-primary bg-opacity-10 text-primary text-center">
                    <tr>
                      <th scope="col">Deductions</th>
                      <th scope="col">Net Amount</th>

                    </tr>
                  </thead>
                  <tbody class="text-start" id="tableDeductionsPrint">
                    

                  </tbody>
                  <tfoot id="TotalofDeductions">
                    <tr>
                  <td>total</td>    
                  <td ></td>    
                  </tr>

</tfoot>
                </table>
                <div class="row">
                  <p class=> </p>
                  <button class="btn btn-success" onclick="addIntoEmployeeTable()"> Add Employee</button>
                </div>
              </div>
            </div>
            <div id="finalBillTable">
              <b class="text-dark">Employee Added</b>
              <table class="table table-bordered">
                <thead class="bg-primary bg-opacity-10 text-primary text-center">
                  <tr>
                   
                    <th scope="col">Employee</th>
                    <th scope="col">Emp Code</th>
                   
                    <th scope="col">Date</th>
                    <th scope="col">Net Amount</th>
                   
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="text-start" id="EmployeeAddBill">
                  

                </tbody>
              </table>
              <button class="btn btn-success" onclick="insertingDataInto()"> Submit</button>
              
            </div>
          </div>
          


        </div>
      </div>
    </div>
  </div>
</body>

</html>