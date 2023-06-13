<?php
include 'header.php';
include 'sidebar.php';
?>
<h1>Profile page here</h1>
<table class="table">
    <thead>
    <tbody>
      <tr>
        <th>Firstname</th>
        <td><?php echo $_SESSION['userdet']['firstname']; ?></td>
      </tr>
      <tr>
        <th>Lastname</th>
        <td><?php echo $_SESSION['userdet']['lastname']; ?></td>
      </tr>
      <tr>
        <th>Mobile Number</th>
        <td><?php echo $_SESSION['userdet']['mobile']; ?></td>
      </tr>
      <tr>
        <th>email</th>
        <td><?php echo $_SESSION['userdet']['email']; ?></td>
      </tr>
      <tr>
      <th>registeredat</th>
      <td><?php echo $_SESSION['userdet']['registeredat']; ?></td>
</tr>
<tr>
      <th>lastlogin</th>
      <td><?php echo $_SESSION['userdet']['lastlogin']; ?></td>
</tr>
    </tbody>
  </table>


<?php
include 'footer.php';
?>