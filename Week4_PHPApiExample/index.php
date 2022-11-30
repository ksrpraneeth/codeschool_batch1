<?php
echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] == "POST") { /////

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($firstName) == 0) {
        echo "Please enter First Name";
    }
    if (strlen($lastName) == 0) {
        echo "Please enter Last Name";
    }
    if (strlen($email) == 0) {
        echo "Please enter Email";
    }
}
?>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    First Name: <input type="text" name="firstName"><br>
    Last Name: <input type="text" name="lastName"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
</form>
