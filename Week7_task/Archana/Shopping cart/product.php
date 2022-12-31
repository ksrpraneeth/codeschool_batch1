<?php
include 'header.php';
// session_start();
if(!isset($_SESSION["userdet"])){
	header("Location:login.html");
}
?>
<body>

<h2 style="text-align:center">Product Card</h2>

<div class="card">
  <h1>Jeans</h1>
  <p class="price">$=990.9</p>
</div>
<li class="dropdown nav-item">
        <a class="nav-link ">
        <i class="btn btn-primary" id="addCart">Add to cart</i>
        </a>
    </li>
    <input type="hidden" id="userid" value="
    <?php
    echo $_SESSION['Buyerid'];
    ?>">
<div class="card">
  <h1> Jeans</h1>
  <p class="price">$=990.9</p>
</div>
<li class="dropdown nav-item">
        <a class="nav-link "href="cart.php">
        <i class="btn btn-primary" id="addCart">Add to cart</i>
        </a>
    </li>
<div class="card">
  <h1>Jeans</h1>
  <p class="price">$=990.9</p>
</div>
<li class="dropdown nav-item">
        <a class="nav-link "href="cart.php">
        <i class="btn btn-primary" id="addCart">Add to cart</i>
        </a>
    </li>
    <script>
        // // if(localStorage.getItem("userdata")!=null){
        //     window.location.assign("home.php");
        //   //  }

            $("#addCart").click(function (){
            //   event.preventDefault();
              var formData = {
             product:'jeans',
             id:$("#userid").val()
              };

        
              $.ajax({
                type:"POST",
                data:formData,
                dataType:'JSON',
                url:"apis/addCart.php",
                success:function(responsedata){
                  console.log(responsedata.status);
                  //responsedata=JSON.parse(responsedata);
                  if(!responsedata.status){
                    $('#errors').text(responsedata.message);
                  }else{
                   alert(responsedata.message);
                   window.location.assign('cart.php');
                  }
                  },
                  error: function(){
                  }
                })
              });
        </script>