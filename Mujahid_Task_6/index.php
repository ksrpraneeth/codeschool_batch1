<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br> 
            <h2><button type="submit">Login</button></h2>
    </form>
</body>
</html>

<!-- after login show menu 
1 master table
student brach type db
add button to add student
1 master table 
hostel details 
id, name,hostelfee, room_no(diff)

Menu
Master
-Branch
-Hostel Type
Student -->