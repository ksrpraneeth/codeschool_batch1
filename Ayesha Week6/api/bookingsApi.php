<?php
include "./../db.php";
$selectMovies = $_POST['selectMovies'];
$selectTheatres= $_POST['selectTheatres'];
$selectShow= $_POST['selectShow'];
$selectSeat= json_decode($_POST['selectSeat']); 
$token= $_POST['token']; 
$errors = [];
//check for validations
if($selectMovies == "")
{
    array_push($errors,"Please select a movie");
}
if($selectTheatres=="")
{
    array_push($errors,"Please select a theatre");
}
if($selectShow=="")
{
    array_push($errors,"Please select a show time");
}
if($selectSeat == null){
    array_push($errors,"Please select your seats");
}
if(count($errors)>0){
    echo json_encode(['status'=>false, 'errors'=> $errors]);
    return;
}
try {
	$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
	// make a database connection
	$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    // echo "Connected to the $db database successfully!";
    // prepare statements
    // check if seat is present
    $questionMarks = trim(str_repeat('?,',count($selectSeat)),',');
    $statement = $pdo->prepare("select * from seat_booking where seats_id in ($questionMarks)");
    $statement->execute($selectSeat);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet)>0) {
        //resultSet returns array but we just need seats_id value,pluck from that array using array_column and convert it to string using implode
        $bookedSeats = implode(',',array_column($resultSet,'seats_id'));
        //create variable to give tha selected seat id in front end
        echo json_encode(['status'=>false, 'message' => "$bookedSeats are already booked",'data'=>$resultSet]);
        return;
    }
    //use token saved in local storage to get userid
    $statement = $pdo->prepare('select id from users where token =?');
$statement->execute([$_POST['token']]);
$resultSetToken = $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    $statement = $pdo->prepare("Insert into bookings (users_id,movie_id,theatre_branch_id,shows_id) values (?,?,?,?)");
    $queryResult = $statement->execute(([$resultSetToken['id'],$_POST['selectMovies'],$_POST['selectTheatres'],$_POST['selectShow']]));
    //unique seats selected so proceed to put them in db
    $bookingId = $pdo->lastInsertId();
    foreach($selectSeat as $seatId){
         //if seat is not present
        $statement = $pdo->prepare("Insert into seat_booking(bookings_id,seats_id) values (?,?)");
        $queryResult = $statement->execute([$bookingId,$seatId]);
    }
    echo json_encode(['status'=>true, 'message' => "Booked successfully",'data'=>$resultSet]);
    return;
   
}
catch (PDOException $e) {
	die($e->getMessage());
} finally {
	if ($pdo) {
		$pdo = null;
	}
}

?>