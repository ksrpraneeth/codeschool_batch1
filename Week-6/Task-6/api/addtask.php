<?php
session_start();
include '../db.php';
if(!array_key_exists('Title',$_POST)){
	$response['status']=false;
	$response['message']="enter a valid text ";
	echo json_encode($response);
	return ;
}
if(!array_key_exists('Description',$_POST)){
	$response['status']=false;
	$response['message']="enter a valid text ";
	echo json_encode($response);
	return;
}
if(!array_key_exists('Tags',$_POST)){
	$response['status']=false;
	$response['message']="enter a valid text ";
	echo json_encode($response);
	return ;
}
$curdt = date("Y-m-d H:i:s");
$statement = $pdo->prepare("Insert into task(title,description,createdat,updatedat,status,userid,createdby,updatedby) values(?, ?, ?, ?, ?, ?, ?, ?)");
$statement->execute([$_POST['Title'], $_POST['Description'], $curdt, $curdt,3,$_SESSION['userdet']['id'],$_SESSION['userdet']['id'],$_SESSION['userdet']['id']]);
$taskid=$pdo->lastInsertId();
$tag=explode(",",$_POST['Tags']);
//echo count($tag);
$count= count ($tag);
echo ($count);
for($x=0;$x<$count;$x++){
	echo $tag[$x];
	$slugvalue=str_replace(" ","_",$tag[$x]);
	$statement = $pdo->prepare("Insert into tagtables(title,slug)values(?,?)");
	$statement->execute([$tag[$x],$slugvalue]);
	$tagid=$pdo->lastInsertId();
	$statement=$pdo->prepare("Insert into tasktagtable(taskid,tagid)values(?,?)");
	$statement->execute([$taskid,$tagid]);
}

$response['status']=false;
$response['message']="Task added successfully";
echo json_encode($response);
return;
// $pdo = new PDO ($Title,$Description,$Tags,$id,$Createdat,$updatedat,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// 'INSERT iNTO (Title,Description,Tags, id,Createdat,updatedat) VALUES(keys,words of keys,word,03)';
?>
