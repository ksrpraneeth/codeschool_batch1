<?php
session_start();
if(!isset($_SESSION['adminId'])){
    header("Location: ./../user/login.php");
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
    <!--jquer-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
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
                <a href="#" class="nav-item nav-link active" id="addDetails">Add</a>
                <a href="#" class="nav-item nav-link" id="deleteDetails">Delete</a>
                <a href="#" class="nav-item nav-link" id="logoutBtn">Logout</a>
            </div>
        </div>
    </div>
</nav>
    <!--body--->
    <div class="h-100 justify-content-center overflow-auto" style="background-color:gray">
<form onsubmit="return false;">
<div class="container overflow-hidden">
  <div class="row gy-5">
    <!--movies-->
    <div class="col-6">
      <div class="p-3 border bg-light mt-4">
        <!--Addmovies-->
        <div class="mb-3 p-2">
                    <div class="row">
                    <div class="col-md-6">
                    <label for="movieName" class="form-label">Movie Name</label>
                    <input type="text" class="form-control border border-primary" id="addMovie">
                </div>
                <div class="col-md-6">
                <label for="movieName" class="form-label">Director</label>
                    <input type="text" class="form-control border border-primary" id="addDirector">
                </div>
                </div>
                <div id="movieError" class="text-danger"></div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-dark" type="submit" id="addMovieBtn">Add Movie</button>
                </div>
                <label>Movie List</label>
                <select class="browser-default custom-select mb-4 form-control border-primary" id="movieList" >
                    <option value="" disabled="" selected="">Movies</option>
                    <option value=""></option>
                 </select>
                 <div class="d-grid">
                    <button class="btn btn-dark" type="submit" id="getMovieList">Movies streaming</button>
                </div>
      </div>
    </div>
    <!--shows-->
    <div class="col-6">
    <div class="p-3 border bg-light mt-4">
           <!--AddTheatres-->
           <div class="mb-3">
                   </div>
                <div class="mb-3 p-2">
             <label>Theatres</label>
<select class="browser-default custom-select mb-4 form-control border-primary" id="addTheatre" >
<option value="" disabled="" selected="">Theatres</option>
<option value=""></option>
</select>
                </div>
            </div>
</div>
        <!--shows-->
        <div class="col-6">
      <div class="p-3 border bg-light">
        <!--AddShows-->
<div class="mb-3">
                    <div class="row">
                    <div class="col-md-4">
                    <label for="ShowDate" class="form-label">Show Date</label>
                    <input type="text" class="form-control border border-primary" id="addDate">
                </div>
                <div class="col-md-4">
                <label for="fromTime" class="form-label">From-time</label>
                    <input type="text" class="form-control border border-primary" id="addFromTime">
                </div>
                <div class="col-md-4">
                <label for="ToTime" class="form-label">To-time</label>
                    <input type="text" class="form-control border border-primary" id="addToTime">
                </div>
                <div id="showError" class="text-danger"></div>
</div>
</div>
                <div class="d-grid">
                    <button class="btn btn-dark type="submit" id="addShowBtn">Add Show</button>
                </div>
                <label>Shows List</label>
   <select class="browser-default custom-select mb-4 form-control border-primary" id="showList" >
   <option value="" disabled="" selected="">Shows List</option>
   <option value=""></option>
   </select>
   <div class="d-grid">
                    <button class="btn btn-dark" type="submit" id="getShowList">Available Shows</button>
                </div>
                <div class="mb-3">
                   </div>
              
      </div>
    </div>
    <!--shows-->
    <div class="col-6">
      <div class="p-3 border bg-light">
      <div class="mb-3">
                    <label for="addSeat" class="form-label">Seat Type</label>
                    <input type="text" class="form-control border border-primary" id="addSeat">
                </div>
                <div id="seatError" class="text-danger"></div>
                <div class="d-grid">
                    <button class="btn btn-dark" type="submit" id="addSeatBtn">Add Seats</button>
                </div>
</div>
</div>
    </div>
  </div>
</div>
</div>
</body>
       <footer class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-dark me-auto">© Copyright Ayesha Fatima</a>
            </div>
</footer>
<script>
     //ajax call to back-end to get theatres
   $(document).ready(function () {
    $("#addTheatre").html('<option hidden value="">Select</option>');
        $.ajax({
            url: './api/fetchTheatres.php',
            method: "POST",
            dataType: "JSON",
            success:function(result){
                    $.each(result.data,function(index,theatreBranch){
                    $("#addTheatre").append("<option value='" + theatreBranch.id+ "' >" + theatreBranch.address+ "</option>");
                })
            }
                });
        });
    //ajax call to add new movie to database
    $("#addMovieBtn").click(function () {
            var addMovie=$("#addMovie").val();
            var addDirector=$("#addDirector").val();
            $('#movieError').html('');
            $.ajax({
            url: './api/addNewMovies.php',
            method: "POST",
            data: {addMovie,
                addDirector},
                dataType: "JSON",
            success:function(result){
                if(result.status==true){
                    alert(result.message);
                }
                else{
                    if(result.errors)
                    {
                        result.errors.forEach((error) => {
                            $('#movieError').append(error+"<br>");
                            
                        })
                        return;
                    }
                    $('#movieError').text(result.message);
                 
                }
        }
    });
    });
//ajax call to get movies from database
$("#getMovieList").click(function () {
    $("#movieList").html('<option hidden value="">Select</option>');
        $.ajax({
            url: './api/fetchMovies.php',
            method: "POST",
            dataType: "JSON",
            success:function(result){
                $.each(result.data,function(index,movie){
                    $("#movieList").append("<option value='" + movie.id+ "' >" + movie.movie_name+ "</option>");
                });
            }
        });
    });
      //ajax call to add new show to database
      $("#addShowBtn").click(function () {
            var addDate=$("#addDate").val();
            var addFromTime=$("#addFromTime").val();
            var addToTime=$("#addToTime").val();
            var addTheatre=$("#addTheatre").val();
            var movieList=$("#movieList").val();
            $("#showError").html('');
            $.ajax({
            url: './api/addNewShows.php',
            method: "POST",
            data: {addDate,
            addFromTime,
        addToTime,
    movieList,
addTheatre},
                dataType: "JSON",
            success:function(result){
                if(result.status==true){
                    alert(result.message);
                }
                else{
                    if(result.errors)
                    {
                        result.errors.forEach((error) => {
                            $('#showError').append(error+"<br>");
                            
                        })
                        return;
                    }
                    $('#showError').text(result.message);
                 
                }
        }
    });
});
//ajax call to get shows from database
$("#getShowList").click(function () {
    $("#showList").html('<option hidden value="">Select</option>');
        $.ajax({
            url: './api/fetchShows.php',
            method: "POST",
            dataType: "JSON",
            success:function(result){
                $.each(result.data,function(index,show){
                    $("#showList").append("<option value='" + show.show_id+ "' >" + show.movie_name+ " - " +show.from_time +" - " +show.to_time+ "-"+show.date+ "-" +show.address +" </option>");
                });
            }
        });
    });
    //ajax call to add new seats
    $("#addSeatBtn").click(function () {
            var showList=$("#showList").val();
            var addSeat=$("#addSeat").val();
            $("#seatError").html('');
            $.ajax({
            url: './api/addNewSeats.php',
            method: "POST",
            data: {showList,
            addSeat},
            dataType: "JSON",
            success:function(result){
                if(result.status==true){
                   alert(result.message);
                }
                else{
                    if(result.errors)
                    {
                        result.errors.forEach((error) => {
                            $('#seatError').append(error+"<br>");
                            return;
                        })
                    }
                 
                }
        }
        });
    });
    //logout
    $("#logoutBtn").click(function () {
            window.location.assign("./../user/logout.php");
        });
        $("#addDetails").click(function () {
            window.location.assign("adminpage.php");
        });
        $("#deleteDetails").click(function () {
            window.location.assign("deleteDetails.php");
        });
            </script>