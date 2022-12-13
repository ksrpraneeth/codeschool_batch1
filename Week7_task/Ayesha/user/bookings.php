<?php
session_start();
if(!isset($_SESSION["userId"])) {
    header("Location:login.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMyShow</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/login.css">
    <!--jquery-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</head>
<body class='vh-100'>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
                <img src="/img/logo.png" alt="..." height="36">
              </a>
        <a href="#" class="navbar-brand text-dark">BookMyShow</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="userpage.php" class="nav-item nav-link" id="booktickets">Book Tickets</a>
                <a href="bookings.php" class="nav-item nav-link active" id="bookingsBtn">Bookings</a>
                <a href="login.php" class="nav-item nav-link" id="logoutBtn">Logout</a>
            </div>
        </div>
    </div>
</nav>
<!--main content-->
<div class="h-100 p-4" style="background-color:gray">
  <!--Card-Body-->
	<div class="card-body">
<!--Card-Title-->
<p class="card-title text-center shadow mb-5 rounded">Booking Details</p>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Movie</th>
      <th scope="col">Address</th>
      <th scope="col">Seat</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="tablebody">
    </tbody>
</table>
 </div>
</div>
</body>
       <footer class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-dark me-auto">© Copyright Ayesha Fatima</a>
            </div>
</footer>
<script>
 
$("#logoutBtn").click(function () {
            window.location.assign("logout.php");
        });
        $(document).ready(function () {
   
  $.ajax({
    url: './api/bookedDetails.php',
    method: "POST",
    dataType: "JSON",
    success:function(result){
        //console.log(result);
        let string='';
        $.each(result, function(key, value){
                string += `<tr id="row">
                <td id="booking_id">${value['id']}</td>
                <td>${value['movie_name']}</td>
                <td>${value['address']}</td>
                <td id="seat_id">${value['string_agg']}</td>
                <td><button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteBooking(${value['id']},${value['string_agg']})">Delete</button>
                </td>
                </tr>`;

     
            });
            $('#tablebody').append(string);
        },
});

});
function deleteBooking(booking_id,seat_id)
{
    $.ajax({
    url: './api/deleteBooking.php/',
    method: "POST",
    data:{seat_id,
    booking_id},
    dataType: "JSON",
    success:function(result){
        console.log(result);
        location.reload();
    }
});
}
</script>
        </html>