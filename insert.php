<?php

$mysqli = new mysqli("SG-CalTracker-4216-mysql-master.servers.mongodirector.com", "AHelmick", "FunPassword1!", "CalTracker", 3306) or die(mysqli_error(mysqli));

if (isset($_POST['save'])) {

    $foodName = $_POST['name'];
    $foodType = $_POST['type'];
    $foodBrand = $_POST['brand'];
    $calories = $_POST['calories'];
    $fat = $_POST['fat'];
	$cholesterol = $_POST['cholesterol'];
	$sodium = $_POST['sodium'];
	$carbs = $_POST['carbs'];
	$protein = $_POST['protein'];

    $mysqli->query("INSERT INTO foods (foodName, foodType, foodBrand, calories, fat, cholesterol, sodium, carbs, protein) 
					VALUES(\"$foodName\", \"$foodType\", \"$foodBrand\", \"$calories\", \"$fat\", \"$cholesterol\", \"$sodium\", \"$carbs\", \"$protein\")") or die($mysqli->error);

    header("location: FoodPicker.php");
}

?>