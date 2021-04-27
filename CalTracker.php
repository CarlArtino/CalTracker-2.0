<!doctype html>
<html lang="en">
    <head>
        <title>Add Food</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <?php 
	
		if(!isset($_SESSION)){
			session_start();
		}
		
		require_once 'process.php'; 
		require_once 'delete.php'; 
	 ?>

    <?php

    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

	<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #ffcfc2;">
		<a class="navbar-brand" href="#">
			<img src="pictures/logo.png" alt="logo">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
    <form action="search.php" method="GET">
       <input type="text" name="search" />
       <input type="submit" value="Search" />
    </form>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item active">
					<a class="nav-link" href="MealMaker.php">Home</a>
				</li>
			</ul>
		</div>
	</nav>

    <div class="container">
		<?php
			$mysqli = new mysqli("SG-CalTracker-4216-mysql-master.servers.mongodirector.com", "AHelmick", "FunPassword1!", "CalTracker", 3306) or die(mysqli_error(mysqli));
			$result = $mysqli->query("SELECT * FROM foods ORDER BY foodName") or die($mysqli_error->error);
			//pre_r($result->fetch_assoc());

		?>
		<div class="row justify-content-center">
			<br><br>
			<form action="process.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<?php
							if ($update == false):
							?>
							<label>Name</label> <br>
							<input type="text" name="fName" class="form-control" placeholder="Enter name">
							<?php endif; ?>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<?php
							if ($update == false):
							?>
							<label for="exampleFormControlSelect1">Type</label>
							<select class="form-control" name = "fType" id="exampleFormControlSelect1">
							<option value="Fruit">Fruit</option>
							<option value="Vegetable">Vegetable</option>
							<option value="Meat">Meat</option>
							<option value="Grain">Grain</option>
							<option value="Dairy">Dairy</option>
							<option value="Junk">Junk</option>
							<option value="Ingredient">Ingredient</option>
							<option value="Other">Other</option>
							</select>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Brand</label> <br>
					<input type="text" name="fBrand" class="form-control" placeholder="Enter brand">
				</div>

				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<?php
							if ($update == false):
							?>
							<label>Calories</label> <br>
							<input type="text" name="fCalories" class="form-control" placeholder="Enter calories">
							<?php endif; ?>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<?php
							if ($update == false):
							?>
							<label>Fat (g)</label> <br>
							<input type="text" name="fFat" class="form-control" placeholder="Enter fat">
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<?php
							if ($update == false):
							?>
							<label>Cholesterol (mg)</label> <br>
							<input type="text" name="fCholesterol" class="form-control" placeholder="Enter cholesterol">
							<?php endif; ?>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<?php
							if ($update == false):
							?>
							<label>Sodium (mg)</label> <br>
							<input type="text" name="fSodium" class="form-control" placeholder="Enter sodium">
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="col">
						<div class="form-group">
							<?php
							if ($update == false):
							?>
							<label>Carbs (g)</label> <br>
							<input type="text" name="fCarbs" class="form-control" placeholder="Enter carbs">
							<?php endif; ?>
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<?php
							if ($update == false):
							?>
							<label>Protein (g)</label> <br>
							<input type="text" name="fProtein" class="form-control" placeholder="Enter protein">
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<br>
					<?php
					if ($update == true):
					?>
						<button type="submit" class="btn btn-info" name="update">Update</button>
					<?php else: ?>
						<button type="submit" class="btn btn-success" name="save">Save</button>
					<?php endif; ?>
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
						while ($row = $result->fetch_assoc()): ?>
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
									<button type="submit" name="ateFood" form="addFood" value="<?= $row['foodID'] ?>"
										class="btn btn-info">Add</button>
									<button type="submit" name="deleteFood" form="deleteFood" value="<?= $row['foodID'] ?>"
										class="btn btn-danger">Delete</button>
								</td>
							</tr>
						<?php endwhile; ?>
				</table>
			</div>
    	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
