<?php

if(!isset($_SESSION)){
 session_start();
}

$mysqli = new mysqli('localhost', 'root', '', 'isp') or die(mysqli_error($mysqli));

$id = 0;
$price = '';
$update = false;

if (isset($_POST['save'])) {

    $foodName = $_POST['fName'];
    $foodType = $_POST['fType'];
    $foodBrand = $_POST['fBrand'];
    $calories = $_POST['fCalories'];
    $fat = $_POST['fFat'];
	$cholesterol = $_POST['fCholesterol'];
	$sodium = $_POST['fSodium'];
	$carbs = $_POST['fCarbs'];
	$protein = $_POST['fProtein'];

    $mysqli->query("INSERT INTO foods (foodName, foodType, foodBrand, calories, fat, cholesterol, sodium, carbs, protein) 
					VALUES('$foodName', '$foodType', '$foodBrand', '$calories', '$fat', '$cholesterol', '$sodium', '$carbs', '$protein')") or die($mysqli->error);

    $_SESSION['message'] = "Food has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: CalTracker.php");
}