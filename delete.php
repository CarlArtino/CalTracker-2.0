<?php

$mysqli = new mysqli("localhost", "id16688663_ahelmick", "~)qh]P#6X0B!#lg)", "id16688663_caltracker", 3306) or die(mysqli_error(mysqli));

if (isset($_POST['deleteFood'])) {
	
	$id = $_POST['deleteFood'];

    $mysqli->query("DELETE FROM foods WHERE foodID = '$id'") or die($mysqli->error);

    header("location: CalTracker.php");
}
