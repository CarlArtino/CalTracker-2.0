<?php session_start();?>

<!doctype html>
    <head>
		<link rel="stylesheet" href="css\stylesheet.css">
        <title>Meal Maker</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

	<body>
		<?php
						
						$mysqli = new mysqli("SG-CalTracker-4216-mysql-master.servers.mongodirector.com", "AHelmick", "FunPassword1!", "CalTracker", 3306) or die(mysqli_error(mysqli));

		    $setArray = isset($_SESSION["currentMeal"]);
		    if (!$setArray) $_SESSION["currentMeal"] = array();

		    $adding = isset($_POST["addFood"]);
		    if ($adding) {
		    	array_push($_SESSION["currentMeal"], $_POST["addFood"]);
		    }

			if (isset($_POST["removeFood"]))
			{
				unset($_SESSION["currentMeal"][$_POST["removeFood"]]);
				$_SESSION["currentMeal"] = array_values($_SESSION["currentMeal"]);
			}

			$setClear = isset($_POST["clearTable"]);
			if($setClear)
			{
				$_SESSION["currentMeal"] = array();
			}

		?>

<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: transparent;">
		<a class="navbar-brand" >
			<img src="logo.png" alt="logo" style="width:308px;height:90px;">
		</a>
		<form action="search.php" method="GET">
			<input type="text" name="search" />
			<input type="submit" value="Search" />
   		</form>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-md-auto">
					<li class="nav-item active">
						<a class = "navlink" href="MealMaker.php">My Meal</a>
					</li>
					<li class="nav-item">
						<a class = "navlink" href="CalTracker.php">Foods</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container">
		
			<p class="h1"> Your Current Meal </p>
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
							<th id="fat_col_head">Fat (g)</th>
							<th id="cholesterol_col_head">Cholesterol (mg)</th>
							<th id="sodium_col_head">Sodium (mg)</th>
							<th id="carbs_col_head">Carbs (g)</th>
							<th id="protein_col_head">Protein (g)</th>
							<th colspan="2"></th>
						</tr>

					<form action="MealMaker.php" method="post" id="removeFood"></form>

					<?php
						$totCal = 0;
						$totFat = 0;
						$totChol = 0;
						$totSod = 0;
						$totCarb = 0;
						$totProt = 0;

						for ($i=0; $i<count($_SESSION["currentMeal"]); $i++){

							$entry = $_SESSION["currentMeal"][$i];
							$result = $mysqli->query("SELECT * FROM foods WHERE foodId=$entry") or die($mysqli_error->error);
							$row = mysqli_fetch_array($result);

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
						}
						?>
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
							<td></td>
						</tr>
				</table>
			</div>
			<form action="CalTracker.php" method="post" id="addFood"></form>

			<button type="submit" class="btn btn-success" form="addFood" value="Submit">Add another food</button>

			<div align="right">
				<form onsubmit="return confirm('Are you sure you want to clear the table?');" action="MealMaker.php" method="post" id="clearTable"></form>

				<button type="submit" form="clearTable" name="clearTable" value="True" class="btn btn-danger">Clear the table</button>
			</div>
		</div>
	</body>
</html>