<?php
include 'header.php';
include './apis/db.php';
$statement = $pdo->prepare("select * from cart where buyerid = ?");
$statement->execute([$_SESSION['Buyerid']]);
$resultset =$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($resultset as $row)

$addressStatement = $pdo->prepare("select * from Address where referencekeybuyerid = ?");
$addressStatement->execute([$_SESSION['Buyerid']]);
$addressResultset =$addressStatement->fetchAll(PDO::FETCH_ASSOC);
foreach($addressResultset as $address)
// session_start();
?>
<h1>Cart details</h1>
<table class="table">
    <thead>
    <tbody>
      <tr>
        <th>id</th>
        <td> <?php echo $row['buyerid']; ?></td>
      </tr>
      <tr>
        <th>product</th>
        <td> <?php echo $row['productname'];?></td>
      </tr>
    </tbody>
  </table>
  <li class="dropdown nav-item">
        <a class="nav-link" >
        <i class="btn btn-primary" id="place_order">place order</i>
        </a>
</li>
<div id="address-block">
<h1>Address Details</h1>
<table class="table">
    <thead>
    <tbody>
      <tr>
        <th>id</th>
        <td> <?php echo $address['id']; ?></td>
      </tr>
      <tr>
        <th>streetaddress</th>
        <td> <?php echo $address['streetaddress'];?></td>
      </tr>
      <tr>
        <th>city</th>
        <td><?php echo $address['city']; ?></td>
      </tr>
    </tbody>
  </table>
</div>
<script src="./cart.js"></script>
<li class="dropdown nav-item">
        <a class="nav-link" href=payment.php >
        <i class="btn btn-primary" id="payment_details">Payment</i>
        </a>
</li>
<script src="./payment.js"></script>

  <?
include 'footer.php';
?>