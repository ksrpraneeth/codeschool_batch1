<?php
include 'header.php';
include './apis/db.php';
$statement = $pdo->prepare("select * from Address where referencekeybuyerid = ?");
$statement->execute([$_SESSION['Buyerid']]);
$resultset =$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($resultset as $row)
// session_start();
?>
<h1>Address Details</h1>
<table class="table">
    <thead>
    <tbody>
      <tr>
        <th>id</th>
        <td> <?php echo $row['id']; ?></td>
      </tr>
      <tr>
        <th>streetaddress</th>
        <td> <?php echo $row['streetaddress'];?></td>
      </tr>
      <tr>
        <th>city</th>
        <td><?php echo $row['city']; ?></td>
      </tr>
    </tbody>
  </table>
  <?
include 'footer.php';
?>