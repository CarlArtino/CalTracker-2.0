<?php session_start();?>

<!doctype html>
<html lang="en">
    <head>
        <title>Meal Maker</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

	<body>
		<?php
			// Database Connection
			
			$mysqli = new mysqli("localhost", "id16688663_ahelmick", "~)qh]P#6X0B!#lg)", "id16688663_caltracker", 3306) or die(mysqli_error(mysqli));
			
            // Test isset for session array. set if not

		    $setArray = isset($_SESSION["currentMeal"]);
		    if (!$setArray) $_SESSION["currentMeal"] = array();

		    // Test if session variable from caltracker isset. append and null if so.

		    $adding = isset($_POST["ateFood"]);
		    if ($adding) {
		    	array_push($_SESSION["currentMeal"], $_POST["ateFood"]);
		    }

			// Remove an entry from the table
			if (isset($_POST["removeFood"]))
			{
				unset($_SESSION["currentMeal"][$_POST["removeFood"]]);

				//This reorders the array so there will not be empty indicies
				$_SESSION["currentMeal"] = array_values($_SESSION["currentMeal"]);
			}

			// Clear entries from table if user clicked button
			$setClear = isset($_POST["clearTable"]);
			if($setClear)
			{
				$_SESSION["currentMeal"] = array();
			}

		?>

	<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #ffcfc2;">
		<a class="navbar-brand" href="#">
			<img src="pictures/logo.png" alt="logo">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item active">
					<a class="nav-link" href="MealMaker.php">Home</a>
				</li>
			</ul>
		</div>
	</nav>

	<span style="padding-left:20px">
    <div class="container">

    	<h2> Your Current Meal </h2>
		<center>
			<script src="javascript/hideColumns.js"></script>

			<div id="checkbox_div">
			<input type="checkbox" value="hide" id="hideExtra" onchange="hide_show_table();">Hide Extra Columns
			</div>
		</center>
        <div class="row justify-content-center">
            <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Calories</th>
                        <th>Fat</th>
						<th id="fat_col_head">Fat (g)</th>
						<th id="cholesterol_col_head">Cholesterol (mg)</th>
						<th id="sodium_col_head">Sodium (mg)</th>
						<th id="carbs_col_head">Carbs (g)</th>
						<th id="protein_col_head">Protein (g)</th>
						<th colspan="2"></th>
                    </tr>

				<form action="MealMaker.php" method="post" id="removeFood"></form>

				<?php
				    // Add code to print list under here

				    if ($setArray || $adding) // Tests if it has a list to display.
				    {
				    	$totCal = 0;   // init total calories
		                $totFat = 0;   // init total fat
		                $totChol = 0;  // init total cholesterol
		                $totSod = 0;   // init total sodium
		                $totCarb = 0;  // init total carbs
		                $totProt = 0;  // init total protein

				    	for ($i=0; $i<count($_SESSION["currentMeal"]); $i++){

				    		$mealIndex = $_SESSION["currentMeal"][$i];
				    		$result = $mysqli->query("SELECT * FROM foods WHERE foodId=$mealIndex") or die($mysqli_error->error); // must get specific row every time
				    		$row = mysqli_fetch_array($result);

				    		// Increment totals
				    		$totCal += $row['calories'];
				    		$totFat += $row['fat'];
				    		$totChol += $row['cholesterol'];
				    		$totSod += $row['sodium'];
				    		$totCarb += $row['carbs'];
				    		$totProt += $row['protein'];
				    		?>

				    		<tr>
								<td><?php echo $row['foodName'] ?></td>
								<td><?php echo $row['foodType'] ?></td>
								<td><?php echo $row['foodBrand'] ?></td>
								<td><?php echo $row['calories'] ?></td>
								<td class="fat_col"><?php echo $row['fat'] ?></td>
								<td class="cholesterol_col"><?php echo $row['cholesterol'] ?></td>
								<td class="sodium_col"><?php echo $row['sodium'] ?></td>
								<td class="carbs_col"><?php echo $row['carbs'] ?></td>
								<td class="protein_col"><?php echo $row['protein'] ?></td>
								<td>
									<button type="submit" name="removeFood" form="removeFood" value="<?= $i ?>"
										class="btn btn-info">Remove</button>
								</td>
							</tr>
							<?php
				    	} ?>
				    	<tr>
							<td>Total</td>
							<td></td>
							<td></td>
							<td><?php echo $totCal ?></td>
							<td class="fat_col"><?php echo $totFat ?></td>
							<td class="cholesterol_col"><?php echo $totChol ?></td>
							<td class="sodium_col"><?php echo $totSod ?></td>
							<td class="carbs_col"><?php echo $totCarb ?></td>
							<td class="protein_col"><?php echo $totProt ?></td>
						</tr>
				    	<?php
				    }
				?>
            </table>
        </div>
        <form action="CalTracker.php" method="post" id="addFood"></form>

		<button type="submit" class="btn btn-success" form="addFood" value="Submit">Add another food</button>

		<div align="right">
			<form onsubmit="return confirm('Do you really want to clear the table?');" action="MealMaker.php" method="post" id="clearTable"></form>

			<button type="submit" form="clearTable" name="clearTable" value="True" class="btn btn-danger">Clear the table</button>
		</div>
    </div>
	</body>

</html>
