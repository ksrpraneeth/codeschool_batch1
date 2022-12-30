<?php
include 'header.php';
?>
<table class="table">
    <thead>
    <tbody>
      <tr>
        <th>username</th>
        <td><?php echo $_SESSION['userdet']['username']; ?></td>
      </tr>
      <tr>
        <th>password</th>
        <td><?php echo $_SESSION['userdet']['password']; ?></td>
      </tr>
      <tr>
        <th>gender</th>
        <td><?php echo $_SESSION['userdet']['gender']; ?></td>
      </tr>
      <tr>
        <th>province</th>
        <td><?php echo $_SESSION['userdet']['province']; ?></td>
      </tr>
    </tbody>
  </table>
<?php
include 'footer.php';
?>