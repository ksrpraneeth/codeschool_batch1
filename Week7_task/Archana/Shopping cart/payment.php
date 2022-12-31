<?php
include 'header.php';
include './apis/db.php';
$statement = $pdo->prepare("select * from payment where id = ?");
$statement->execute([$_SESSION['Buyerid']]);
$resultset =$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($resultset as $row)
// session_start();
?>
<h1>Payment Details</h1>
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
        <th>amounttype</th>
        <td><?php echo $row['amounttype']; ?></td>
      </tr>
    </tbody>
  </table>
  <div class="container">
  <h2>Message</h2>
  <div class="alert alert-success">
    <strong>Success!</strong> Your order is placed sucessfull!!!
  </div>
  <li class="dropdown nav-item">
        <a class="nav-link "href="feedback.php">
        <i class="btn btn-primary">Feedback</i>
        </a>
    </li>
  <?
include 'footer.php';
?>