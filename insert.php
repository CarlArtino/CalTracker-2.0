<?php

$mysqli = new mysqli("localhost", "id16688663_ahelmick", "~)qh]P#6X0B!#lg)", "id16688663_caltracker", 3306) or die(mysqli_error(mysqli));

$id = 0;
$update = false;

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