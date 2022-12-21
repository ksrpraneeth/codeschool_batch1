<?php
include 'header.php';
include 'sidebar.php';
?>
<h1>Dashboard here</h1>
<?php
$statement = $pdo->prepare("select * from task where userid= ? order by id desc");
$statement->execute([$_SESSION['userdet']['id']]);
$resultset=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach($rseultset as $item) {
    echo $item['title'];
}
$tagidarray = [];
$stament = $pdo->query("Select * from tasktagtable where taskid = 1");
$resultset = $statment->fetchAll(PDO::FETCH_ASSOC);
foreach($resultset as $item) {
	$tagidarray[] = $item['tagid'];
}
$tagid= implode(",", $tagidarray);
$tagsarray= [];
$statement= $pdo->query("Select * from tagtables where id in (".$tagid.")");
$resultset = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($resultset as $item) {
	$tagsarray[] = $item['title'];
}
$tagsString = implode(", ", $tagsarray);
if($statement->row()>0){
	while($row=$statement->fetch()){	
	}
}
$statement= $pdo->query("Select * from tasktable where id in(".$taskid.")");
    $resultset = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultset);
	foreach($resultset as $item) {
		$tagsarray[] = $item['title'];
	}
    if ($pdo) {
        $pdo = null;
    }
include 'footer.php';
?>