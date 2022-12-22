<?php
//Database connuration File
include('conn.php');
error_reporting(0);
if (isset($_POST['signup'])) {
  //Getting Post Values
  $fullname = $_POST['fname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['mobilenumber'];
  $password = $_POST['password'];
  $hasedpassword = hash('sha256', $password);
  // Query for validation of username and email-id
  $ret = "SELECT * FROM userdata where (UserName=:uname ||  UserEmail=:uemail)";
  $queryt = $dbh->prepare($ret);
  $queryt->bindParam(':uemail', $email, PDO::PARAM_STR);
  $queryt->bindParam(':uname', $username, PDO::PARAM_STR);
  $queryt->execute();
  $results = $queryt->fetchAll(PDO::FETCH_OBJ);
  if ($queryt->rowCount() == 0) {
    // Query for Insertion
    // $token = bin2hex(random_bytes(16));
    $token = md5(rand() . time());

    // Insert the user's data into the database
    $sql = "INSERT INTO userdata (FullName, UserName, UserEmail, UserMobileNumber, LoginPassword, Token)
    VALUES (:fname, :uname, :uemail, :umobile, :upassword, :utoken)";
    $query = $dbh->prepare($sql);
    // Binding Post Values
    $query->bindParam(':fname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':uname', $username, PDO::PARAM_STR);
    $query->bindParam(':uemail', $email, PDO::PARAM_STR);
    $query->bindParam(':umobile', $mobile, PDO::PARAM_INT);
    $query->bindParam(':upassword', $hasedpassword, PDO::PARAM_STR);
    $query->bindParam(':utoken', $token, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      $msg = "You have signup  Scuccessfully! Please log in Now!!";
    } else {
      $error = "Something went wrong.Please try again";
    }
  } else {
    $error = "Username or Email-id already exist. Please try again";
  }
}
?>
<!-- Add tokens to this php file -->

<!DOCTYPE html>
<html lang="en">

<?php
include "include/admin_header.php";
?>

<!--Javascript for check username availability-->
<script>
  function checkUsernameAvailability() {
    jQuery.ajax({
      url: "check_availability.php",
      data: 'username=' + $("#username").val(),
      type: "POST",
      success: function (data) {
        $("#username-availability-status").html(data);
      },
      error: function () {
      }
    });
  }
</script>

<script>
  $.ajax({
    url: 'login.php',
    type: 'POST',
    data: {
      username: username,
      password: password,
      token: token
    },
    success: function (response) {
      if (response == 'success') {
        // Redirect the user to the home page
        window.location.href = 'home.php';
      } else {
        // Display an error message
        $('#error-message').text('Invalid username or password');
      }
    }
  });
</script>

<!--Javascript for check email availability-->
<script>
  function checkEmailAvailability() {
    jQuery.ajax({
      url: "check_availability.php",
      data: 'email=' + $("#email").val(),
      type: "POST",
      success: function (data) {

        $("#email-availability-status").html(data);
      },
      error: function () {
        event.preventDefault();
      }
    });
  }
</script>


</head>

<body>
  <div class="container">

    <div id="login-overlay" class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Register | <a href="index.php">Log in</a></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12">
              <div class="well">
                <form class="form-horizontal" action='' method="post">
                  <fieldset>
                    <!--Error Message-->
                    <?php if ($error) { ?>
                    <div class="errorWrap">
                      <strong>Error </strong> :
                      <?php echo htmlentities($error); ?>
                    </div>
                    <?php } ?>
                    <!--Success Message-->
                    <?php if ($msg) { ?>
                    <div class="succWrap">
                      <strong>Well Done </strong> :
                      <?php echo htmlentities($msg); ?>
                    </div>
                    <?php } ?>
                    <div class="">
                      <div class="roww">
                        <div class="col-xs-12">
                          <div class="control-group">
                            <!-- Full name -->
                            <div class="controls">
                              <label class="control-label" for="fullname">Full Name:</label>
                              <input class="form-control" type="text" id="fname" name="fname" pattern="[a-zA-Z\s]+"
                                title="Full name must contain letters only" class="input-xlarge" required>
                              <p class="help-block">Full can contain any letters only</p>
                            </div>
                          </div>

                          <div class="control-group">
                            <!-- Username -->
                            <div class="controls">
                              <label class="control-label" for="username">Username:</label>
                              <input class="form-control" type="text" id="username" name="username"
                                onBlur="checkUsernameAvailability()" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$"
                                title="User must be alphanumeric without spaces 6 to 12 chars" class="input-xlarge"
                                required>
                              <span id="username-availability-status" style="font-size:12px;"></span>
                              <p class="help-block">Username can contain any letters or numbers, without spaces 6 to 12
                                chars </p>
                            </div>
                          </div>

                          <div class="control-group">
                            <!-- E-mail -->
                            <div class="controls">
                              <label class="control-label" for="email">E-mail:</label>
                              <input class="form-control" type="email" id="email" name="email" placeholder=""
                                onBlur="checkEmailAvailability()" class="input-xlarge" required>
                              <span id="email-availability-status" style="font-size:12px;"></span>
                              <p class="help-block">Please provide your E-mail</p>
                            </div>
                          </div>

                          <div class="control-group">
                            <!-- Mobile Number -->
                            <div class="controls">
                              <label class="control-label" for="mobilenumber">Mobile Number: </label>
                              <input class="form-control" type="text" id="mobilenumber" name="mobilenumber"
                                pattern="[0-9]{10}" maxlength="10" title="10 numeric digits only" class="input-xlarge"
                                required>
                              <p class="help-block">Mobile Number Contain only 10 digit numeric values</p>
                            </div>
                          </div>


                          <div class="control-group">
                            <!-- Password-->
                            <div class="controls">
                              <label class="control-label" for="password">Password:</label>
                              <input class="form-control" type="password" id="password" name="password"
                                pattern="^\S{4,}$"
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 4 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"
                                required class="input-xlarge">
                              <p class="help-block">Password should be at least 4 characters</p>
                            </div>
                          </div>

                          <div class="control-group">
                            <!-- Confirm Password -->
                            <div class="controls">
                              <label class="control-label" for="password_confirm">Password (Confirm):</label>
                              <input class="form-control" type="password" id="password_confirm" name="password_confirm"
                                pattern="^\S{4,}$"
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '')""  class="
                                input-xlarge">
                              <p class="help-block">Please confirm password:</p>
                            </div>
                          </div>

                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button class="btn btn-success" type="submit" name="signup">Signup </button>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </fieldset>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <script type="text/javascript">

    </script>
  </div>
</body>

</html>