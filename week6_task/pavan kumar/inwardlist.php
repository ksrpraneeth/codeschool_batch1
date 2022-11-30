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
                        <a href="./home.php" class="btn btn-primary">Home</a>
                    </div>
                    <div class="col-lg-2-sm-12 mx-3">
                        <button type="button" class="btn btn-primary" id="logout">Logout</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover my-3">
            <thead>
                <tr>
                    <th>id</th>
                    <th>doctor_id</th>
                    <th>room_id</th>
                    <th>patient_id</th>
                    <th>disease_id</th>
                    <th>patient_name</th>
                    <th>room_name</th>
                    <th>disease_name</th>
                    <th>doctor_name</th>
                </tr>
            </thead>
            <tbody id="inwardlist" class="table-hover">

            </tbody>
        </table>

    </div>
    <script>
        $("document").ready(function () {
            $.ajax({
                type: "POST",
                url: "Apis/getinwardslist.php",
                dataType: "JSON",
                success: function (responseData) {
                    if (responseData.status) {
                        responseData.data.forEach((inward) => {
                            $("#inwardlist").append(`
                                <tr>
                                    <td>${inward.id}</td>
                                    <td>${inward.doctor_id}</td>
                                    <td>${inward.room_id}</td>
                                    <td>${inward.patient_id}</td>
                                    <td>${inward.disease_id}</td>
                                    <td>${inward.patient_name}</td>
                                    <td>${inward.room_name}</td>
                                    <td>${inward.disease_name}</td>
                                    <td>${inward.doctor_name}</td>
                                </tr>
                            `);
                        });
                    }

                }

            })
        });
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