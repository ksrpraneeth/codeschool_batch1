<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="header col-lg-12-sm-12 d-flex justify-content-between bg-secondary bg-opacity-25 align-items-center">
                <div class="col-lg-2-sm-2 ">
                    <img src="./office.png" alt="pixelvidelogo" style="height: 75px;width:75px">
                </div>
                <div class="col-lg-4-sm-12">
                    <h4>PIXELVIDE</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col-lg-2-sm-12 mx-3">
                        <button type="button" class="btn btn-primary" id="logout">Logout</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12-sm-12 my-5">
            <div class="col-lg-10-sm-10 d-flex justify-content-around">
                <div class="col-lg-4-sm-4">
                    <label for="firstname">First Name:</label>
                </div>
                <div class="col-lg-6-sm-6">

                    <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname">

                </div>
            </div>
            <div class="col-lg-10-sm-10 d-flex justify-content-around my-3">
                <div class="col-lg-4-sm-4">
                    <label for="lastname">Last Name:</label>
                </div>
                <div class="col-lg-6-sm-6">
                    <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
                </div>
            </div>
            <div class="col-lg-10-sm-10 d-flex justify-content-around my-3">
                <div class="col-lg-4-sm-4">
                    <label for="aadharno">Aadhar Number:</label>
                </div>
                <div class="col-lg-6-sm-6">
                    <input type="text" class="form-control" id="Aadharnumber" placeholder="Enter Aadhar Number" name="Aadharnumber">
                </div>
            </div>
            <div class="col-lg-10-sm-10 d-flex justify-content-around my-3">
                <div class="col-lg-4-sm-4">
                    <label for="mobileno">Mobile Number:</label>
                </div>
                <div class="col-lg-6-sm-6">
                    <input type="number" class="form-control" id="mobilenumber" placeholder="Enter Mobile Number" name="MobileNumber">
                </div>
            </div>
            <div class="col-lg-10-sm-10 d-flex justify-content-around my-3">
                <div class="col-lg-4-sm-4">
                    <label for="department">Department Name:</label>
                </div>
                <div class="col-lg-6-sm-6">
                    <select name="department Name" id="department">
                        <option value="select" class="form-select">select</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-10-sm-10 d-flex justify-content-around my-3">
                <div class="col-lg-4-sm-4">
                    <label for="designation name">Designation Name:</label>
                </div>
                <div class="col-lg-6-sm-6">
                    <select name="designation Name" id="designation">
                        <option value="select" class="form-select">select</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-10-sm-10 d-flex justify-content-center my-3">
            <div class="col-lg-3-sm-3">
                <button type="button" class="btn btn-primary" id="Add">Add Employee</button>
            </div>

        </div>
</body>
<script src="./department&designationdetails.js"></script>
<script>
    if (localStorage.getItem("userData") == null) {
            window.location.assign("login.php");
        }
</script>
</html>