<?php
include "include/admin_header.php";
?>

<body>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <div id="login-overlay" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Login Form</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well">
                            <form action="login.php" id="loginForm" method="post">
                                <?php if (isset($_GET['error'])) { ?>
                                <p class="error text-danger">
                                    <?php echo $_GET['error']; ?>
                                </p>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="username" class="control-label">Username / Email id</label>
                                    <input type="text" class="form-control" id="username" name="username" required=""
                                        title="Please enter you username or Email-id" placeholder="email or username">
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" value="" required="" title="Please enter your password">
                                    <span class="help-block"></span>
                                </div>

                                <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                            </form>
                        </div>
                        <div class="form-group">
                            <p class="lead">Register From Here</p>
                            <p><a href="signup.php" class="btn btn-info btn-block">Register!!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
</body>

</html>