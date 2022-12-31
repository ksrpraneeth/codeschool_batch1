<?php
include 'header.php';
include './apis/db.php';
$statement = $pdo->prepare("select * from orders where referencekeybuyerid = ?");
$statement->execute([$_SESSION['Buyerid']]);
$resultset =$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($resultset as $row)
// session_start();
?>
<h1>Cart details</h1>
<table class="table">
    <thead>
    <tbody>
      <tr>
        <th>id</th>
        <td> <?php echo $row['id']; ?></td>
      </tr>
      <tr>
        <th>amount</th>
        <td> <?php echo $row['amount'];?></td>
      </tr>
      <tr>
        <th>ordercount</th>
        <td><?php echo $row['ordercount']; ?></td>
      </tr>
    </tbody>
  </table>
  <?
include 'footer.php';
?>