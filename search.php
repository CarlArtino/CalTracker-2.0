<!doctype html>
<html lang="en">
    <head>
        <title>Help</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
      <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #ffcfc2;">
        <a class="navbar-brand" href="#">
			<img src="pictures/logo.png" alt="logo">
		</a>
		</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-md-auto">
            <li class="nav-item active">
              <a class="nav-link" href="MealMaker.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="CalTracker.php">Add Items</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container">
      <div class="row justify-content-center">
        <center>
          <script src="javascript/hideColumns.js"></script>

          <div id="checkbox_div">
          <input type="checkbox" value="hide" id="hideExtra" onchange="hide_show_table();">Hide Extra Columns
          </div>
        </center>
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
              <th colspan="2">Action</th>
            </tr>
		  
					<script src="validateAdmin.js"></script>

					<form action="MealMaker.php" method="post" id="addFood"></form>
					<form action="delete.php" method="post" id="deleteFood" onsubmit="return validateDelete()"></form>
      <?php
      //database connection
      $mysqli = new mysqli("SG-CalTracker-4216-mysql-master.servers.mongodirector.com", "AHelmick", "FunPassword1!", "CalTracker", 3306) or die(mysqli_error(mysqli));

      //getting search value
            $query = $_GET['search'];

            //find results from table

  		        $raw_results = $mysqli->query("SELECT * FROM foods
  			      WHERE (`foodName` LIKE '%".$query."%') ORDER BY foodName") or die(mysql_error());

            //display table of results
			     while ($row = $raw_results->fetch_assoc()):?>

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
			     <?php  endwhile; ?>
      </table>
    </div>

  </body>
</html>
