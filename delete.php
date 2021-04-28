<?php

$mysqli = new mysqli("SG-CalTracker-4216-mysql-master.servers.mongodirector.com", "AHelmick", "FunPassword1!", "CalTracker", 3306) or die(mysqli_error(mysqli));

if (isset($_POST['deleteFood'])) {
	
	$id = $_POST['deleteFood'];

    $mysqli->query("DELETE FROM foods WHERE foodID = '$id'") or die($mysqli->error);

    header("location: CalTracker.php");
}
