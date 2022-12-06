<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="register_patient">
        <div class="container-fluid">
            <div class="row">
                <div
                    class="header col-lg-12-sm-12 d-flex justify-content-between bg-secondary bg-opacity-25 align-items-center">
                    <div class="col-lg-2-sm-2 ">
                        <img src="./hospital.png" alt="hospitallogo" style="height: 75px;width:75px">
                    </div>
                    <div class="col-lg-4-sm-12">
                        <h4>HOSPITAL MANAGEMENT SYSTEM</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-2-sm-2 mx-3">
                            <a href="inwards.php" class="btn btn-primary">Inwards</a>
                        </div>
                        <div class="col-lg-2-sm-2 mx-3">
                            <a href="./inwardlist.php" class="btn btn-primary">inwardlist</a>
                        </div>
                        <div class="col-lg-2-sm-12 mx-3">
                            <button type="button" class="btn btn-primary" id="logout">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-secondary bg-opacity-25 mx-5 my-5">
                <form>
                    <div class="row d-flex justify-content-center col-10 my-3">
                        <div class="col-5 mx-5">
                            <label for="patientid">Patient id:</label>
                            <input type="text" class="form-control" id="id" placeholder="Enter id" name="patientid">
                        </div>
                        <div class="col-5">
                            <label for="patientname">Patient Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                name="patientname">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center col-10 my-3">
                        <div class="col-5 mx-5">
                            <label for="age">Age:</label>
                            <input type="text" class="form-control" id="age" placeholder="Enter Age" name="Age">
                        </div>
                        <div class="col-5">
                            <label for="Gender">Gender:</label>
                            <input type="text" class="form-control" id="gender" placeholder="Enter Gender"
                                name="Gender">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center col-10 my-3">
                        <div class="col-5 mx-5">
                            <label for="Address">Address:</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter Address"
                                name="Address">
                        </div>
                        <div class="col-5">
                            <label for="Phoneno">Phone Number:</label>
                            <input type="number" class="form-control" id="phonenumber" placeholder="Enter phone number"
                                name="phone number">
                        </div>
                    </div>
                    <div class="row d-felx justify-content-center col-10 my-3">
                        <div class="col-5 mx-5">
                            <label for="bloodgroup">Blood Group:</label>
                            <input type="text" class="form-control" id="bloodgroup" placeholder="Enter Bloodgroup"
                                name="Bloodgroup">
                        </div>
                        <div class="col-5">
                            <label for="dateofbirth">Date of Birth:</label>
                            <input type="date" class="form-control" id="dateofbirth" placeholder="Enter Date of Birth"
                                name="Date of Birth">
                        </div>
                    </div>
                    <div class="col-5">
                        <p class="text-danger" id="errors"></p>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-center col-10 my-3">
                <button type="button" class="btn btn-primary" id="save">Save</button>
            </div>
        </div>
    </div>

    <script>
        $("#save").click(function () {
            var formData = {
                id: $("#id").val(),
                name: $("#name").val(),
                age: $("#age").val(),
                gender: $("#gender").val(),
                address: $("#address").val(),
                phonenumber: $("#phonenumber").val(),
                bloodgroup: $("#bloodgroup").val(),
                dateofbirth: $("#dateofbirth").val(),
            };
            $.ajax({
                type: "POST",
                data: formData,
                url: "Apis/register.php",
                success: function (responseData) {
                    responseData = JSON.parse(responseData);
                    if (!responseData.status) {
                        $('#errors').text(responseData.message);
                    } else {
                        alert(responseData.message);
                    }
                },
                error: function () {

                }
            })
        });
    </script>
    <script>
        if (localStorage.getItem('userData') ==null) {
            window.location.replace("login.php");
        }
        $("#logout").click(function () {
            localStorage.removeItem('userData');
            window.location.replace("login.php");

        })
    </script>

</body>

</html>