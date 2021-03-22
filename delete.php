<?php

if(!isset($_SESSION)){
 session_start();
}

$mysqli = new mysqli('localhost', 'root', '', 'CalTracker') or die(mysqli_error($mysqli));

if (isset($_POST['deleteFood'])) {
	
	$id = $_POST['deleteFood'];

    $mysqli->query("DELETE FROM foods WHERE foodID = '$id'") or die($mysqli->error);

    $_SESSION['message'] = "Food has been deleted!";
    $_SESSION['msg_type'] = "success";

    header("location: CalTracker.php");
}
