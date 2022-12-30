<?php
include("db.php");
include("response.php");
$statement = $pdo->prepare("select * from task");
$statement->execute();
$resultset =$statement->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>userid</th>
            <th>createdat</th>
            <th>updatedat</th>
            <th>description</th>
            <th>status</th>
            <th>hours</th>
            <th>createddate</th>
            <th>updateddate</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach($resultset as $row){
    echo "<tr>";
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['userid'] . '</td>';
    echo '<td>' . $row['createdat'] . '</td>';
    echo '<td>' . $row['updatedat'] . '</td>';
    echo '<td>' . $row['title'] . '</td>';
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['status'] . '</td>';
    echo '<td>' . $row['hours'] . '</td>';
    echo '<td>' . $row['createdat'] . '</td>';
    echo '<td>' . $row['updatedat'] . '</td>';
    echo "</tr>";

}?>
    </tbody>
</table>
