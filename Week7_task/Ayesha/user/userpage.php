<?php
session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login.php");
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
<!--multiple select plugins-->
<script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script>
<link rel="stylesheet" href="https://phpcoder.tech/multiselect/css/jquery.multiselect.css">
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
                <a href="#" class="nav-item nav-link active" id="booktickets">Book Tickets</a>
                <a href="#" class="nav-item nav-link" id="bookingsBtn">Bookings</a>
                <a href="#" class="nav-item nav-link" id="logoutBtn">Logout</a>
            </div>
        </div>
    </div>
</nav>

<!--main content-->
<div class="h-100 p-4" style="background-color:gray">
  <!--Card-Body-->
	<div class="card-body">
<!--Card-Title-->
<p class="card-title text-center shadow mb-5 rounded">Where movies come to you!</p>
<!--First Row-- movies-->
<div class="row">

<div class="col-sm-6">
    <label>MOVIES:</label>
<select class="browser-default custom-select mb-4 form-control" id="selectMovies" >
<option value="" disabled="" selected="">Movies</option>
<option value=""></option>
</select>
    </div>
<!--theatre-->
<div class="col-sm-6">
<label>THEATRES:</label>
<select class="browser-default custom-select mb-4 form-control" id="selectTheatres" >
<option value="" disabled="" selected="">Theatres</option>
<option value=""></option>
</select>
    </div>
</div>
 <!--Second Row shows-->
 <div class="row mt-4">
<div class="col-sm-6">
<label>SHOW TIMINGS:</label>
<select class="browser-default custom-select mb-4 form-control" id="selectShow">
<option value="" disabled="" selected="">Show timings</option>
<option value=""></option>
</select>
</div>
<!--seats-->
<div class="col-sm-6">
<label>SEAT ID:</label>
<select class="selecbrowser-default form-select custom-select mb-4" size="1" id="selectSeat" multiple>
<option value="" disabled="" selected="">SeatID</option>
</select>
</div>
</div>
<div class="d-flex align-items-center justify-content-center">
<button id="confirmBtn" class="btn btn-dark float-left mt-5">Confirm Booking</button>
</div>
<div class="row d-flex align-items-center justify-content-center text-danger" id="bookingError"></div>
</div>
 </div>
</div>
</body>
       <footer class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-dark me-auto">© Copyright Ayesha Fatima</a>
            </div>
</footer>
<script>
     //ajax call to back-end to get movies 
   $(document).ready(function () {
    $("#selectMovies").html('<option hidden value="">Select</option>');
        $.ajax({
            url: './api/moviesApi.php',
            method: "POST",
            dataType: "JSON",
            success:function(result){
                $.each(result.data,function(index,movie){
                    $("#selectMovies").append("<option value='" + movie.id + "' >" + movie.movie_name + "</option>");
                });
            }
        });
    });
    //ajax call to back-end to get theatre_branches
    $("#selectMovies").change(function(){
        var selectMovies=$("#selectMovies").val();
        //clear the options before appending
        $("#selectTheatres").html('<option hidden value="">Select</option>');
        $("#selectShow").html('');
        $("#selectSeat").html('');
        $.ajax({
            url: './api/theatreApi.php',
            method: "POST",
            data: {selectMovies},
            dataType: "JSON",
            success:function(result){
                $.each(result.data,function(index,theatreBranch){
                    $("#selectTheatres").append("<option value='" + theatreBranch.id + "' >" + theatreBranch.address+ "</option>");
                });
            }
        });
    });
    //ajax call to back-end to get show timings
    $("#selectTheatres").change(function(){
        var selectTheatres=$("#selectTheatres").val();
        var selectMovies=$("#selectMovies").val();
        //clear the options before appending
        $("#selectShow").html('<option hidden value="">Select</option>');
     $('#selectSeat').html('');
    $.ajax({
            url: './api/showsApi.php',
            method: "POST",
            data: {selectTheatres,selectMovies},
            dataType: "JSON",
            success:function(result){
                $.each(result.data,function(index,show){
                    $("#selectShow").append("<option value='" + show.id + "' >" + show.from_time+ "[" +show.date+ "]" + "</option>");
                });
            }
        });
    });
    //ajax call to back-end to get seatIDs
    $("#selectShow").change(function(){
        var selectShow=$("#selectShow").val();
        //clear the options before appending
        var selectSeat=$("#selectSeat").html('');
        //after selecting show increase the size of select seat box
     $("#selectSeat").attr('size', 4)
     $.ajax({
            url: './api/seatsApi.php',
            method: "POST",
            data: {selectShow},
            dataType: "JSON",
            success:function(result){
                $.each(result.data,function(index,seats){
                    $("#selectSeat").append("<option value='" + seats.id + "' >" + seats.id+ "-" +seats.seat_type+ "</option>");
                });
            }
        });
    });
     
       
    //logout
    $("#logoutBtn").click(function () {
            window.location.assign("logout.php");
        });
        $("#bookingsBtn").click(function () {
            window.location.assign("bookings.php");
        });
        $("#booktickets").click(function () {
            window.location.assign("userpage.php");
        });
       //ajax call to feed in selected details
       $("#confirmBtn").click(function () {
            var selectMovies=$("#selectMovies").val();
            var selectTheatres=$("#selectTheatres").val();
            var selectShow=$("#selectShow").val();
            var selectSeat=JSON.stringify($("#selectSeat").val());
            $('#bookingError').html('');
            $.ajax({
            url: './api/bookingsApi.php',
            method: "POST",
            data: {selectMovies,
                selectTheatres,
                selectShow,
                selectSeat,
            

            },
            dataType: "JSON",
            success:function(result){
                console.log(result);
                if(result.status==true){
                    alert(result.message);
                    window.location.assign("bookings.php");
                }
                else{
                    if(result.errors)
                    {
                        result.errors.forEach((error) => {
                            $('#bookingError').append(error+"<br>");
                            
                        })
                        return;
                    }
                    $('#bookingError').text(result.message);
                 
                }
                
                
            }
        });
    });

            

       </script>
       </html>  

