<!doctype html>
    <head>
		<link rel="stylesheet" href="css\all.min.css">
		<link rel="stylesheet" href="css\stylesheet.css">
        <title>Add Food</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

	<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: transparent;">
		<a class="navbar-brand">
			<img src="logo.png" alt="logo" style="width:308px;height:90px;">
		</a>
		<form action="search.php" method="GET">
			<input type="text" name="search" />
			<input type="submit" value="Search" />
   		</form>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item active">
					<a class = "navlink" href="MealMaker.php"><i class="fas fa-utensils"></i> My Meal</a>
				</li>
				<li class="nav-item">
					<a class = "navlink" href="FoodPicker.php"><i class="fas fa-hamburger"></i> Foods</a>
				</li>
			</ul>
		</div>
	</nav>

    <div class="container">
		<div class="row justify-content-center">
			<br><br>
			<form action="insert.php" method="POST">
				<br>
		
				<span style="float:left">Name</span>
				<span style="float:right">Type</span>
				<br>
				
				<span style="float:left"> <input type="text" name="name" class="form-control" placeholder="Enter name"> </span>
				<span style="float:right">
					<select class="form-control" name = "type" id="type">
					<option value="Fruit">Fruit</option>
					<option value="Vegetable">Vegetable</option>
					<option value="Meat">Meat</option>
					<option value="Grain">Grain</option>
					<option value="Dairy">Dairy</option>
					<option value="Junk">Junk</option>
					<option value="Ingredient">Ingredient</option>
					<option value="Other">Other</option>
					</select> 
				</span>
				<br><br>

				<div class="form-group">
					<label>Brand</label> <br>
					<input type="text" name="brand" class="form-control" placeholder="Enter brand">
				</div>

				<span style="float:left">Calories</span>
				<span style="float:right">Fat (g)</span>
				<br>

				<span style="float:left"> <input type="text" name="calories" class="form-control" placeholder="Enter calories"> </span>
				<span style="float:right"><input type="text" name="fat" class="form-control" placeholder="Enter fat"></span>
				<br><br>

				<span style="float:left">Cholesterol (mg)</span>
				<span style="float:right">Sodium (mg)</span>
				<br>
				
				<span style="float:left"> <input type="text" name="cholesterol" class="form-control" placeholder="Enter cholesterol"> </span>
				<span style="float:right"> <input type="text" name="sodium" class="form-control" placeholder="Enter sodium"> </span>
				<br><br>

				<span style="float:left">Carbs (g)</span>
				<span style="float:right">Protein (g)</span>
				<br>

				<span style="float:left"> <input type="text" name="carbs" class="form-control" placeholder="Enter carbs"> </span>
				<span style="float:right"> <input type="text" name="protein" class="form-control" placeholder="Enter protein"> </span>
				<br><br>

				<div class="form-group">
					<br>
					<button type="submit" class="btn btn-success" name="save">Save</button>
				</div>
			</form>
		</div>
		<div class="row justify-content-center">
			<script src="javascript/hideColumns.js"></script>

			<div id="checkbox_div">
				<input type="checkbox" value="hide" id="hideExtra" onchange="hide_show_table();">Hide Extra Columns
			</div>

			<table class="table" id="table">
					
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
					<th colspan="2">Action</th>
				</tr>

				<script src="javascript/validateAdmin.js"></script>

				<form action="MealMaker.php" method="post" id="addFood"></form>
				<form action="delete.php" method="post" id="deleteFood" onsubmit="return validateDelete()"></form>
				
				<?php
					require_once 'insert.php'; 
					require_once 'delete.php'; 
					$mysqli = new mysqli("SG-CalTracker-4216-mysql-master.servers.mongodirector.com", "AHelmick", "FunPassword1!", "CalTracker", 3306) or die(mysqli_error(mysqli));
					$result = $mysqli->query("SELECT * FROM foods ORDER BY foodName") or die($mysqli_error->error);
					while ($row = $result->fetch_assoc()) { ?>
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
								<button type="submit" name="addFood" form="addFood" value="<?= $row['foodID'] ?>"
									class="btn btn-info">Add</button>
								<button type="submit" name="deleteFood" form="deleteFood" value="<?= $row['foodID'] ?>"
									class="btn btn-danger">Delete</button>
							</td>
						</tr>
					<?php 
						}
					?>
				</table>
			</div>
    	</div>
    </body>
</html>
