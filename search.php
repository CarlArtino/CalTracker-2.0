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
          </ul>
        </div>
      </nav>
      <div class="container">
      <span style="padding-left:20px">
      <div class="row justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Type</th>
              <th>Brand</th>
              <th>Calories</th>
              <th>Fat</th>
              <th>Cholesterol</th>
              <th>Sodium</th>
              <th>Carbs</th>
              <th>Protein</th>
              <th colspan="2">Action</th>
            </tr>
          </thread>
		  
					<script src="validateAdmin.js"></script>

					<form action="MealMaker.php" method="post" id="addFood"></form>
					<form action="delete.php" method="post" id="deleteFood" onsubmit="return validateDelete()"></form>
      <?php
      //database connection
      			$mysqli = new mysqli('localhost', 'root', '', 'isp') or die(mysqli_error(mysqli));

      //getting search value
            $query = $_GET['search'];

            //find results from table

  		        $raw_results = $mysqli->query("SELECT * FROM foods
  			      WHERE (`foodName` LIKE '%".$query."%')") or die(mysql_error());

            //display table of results
			     while ($row = $raw_results->fetch_assoc()):?>

      <tr>
        <td><?php echo $row['foodID'] ?></td>
        <td><?php echo $row['foodName'] ?></td>
        <td><?php echo $row['foodType'] ?></td>
        <td><?php echo $row['foodBrand'] ?></td>
        <td><?php echo $row['calories'] ?></td>
        <td><?php echo $row['fat'] ?></td>
        <td><?php echo $row['cholesterol'] ?></td>
        <td><?php echo $row['sodium'] ?></td>
        <td><?php echo $row['carbs'] ?></td>
        <td><?php echo $row['protein'] ?></td>

        <td>
          <button type="submit" name="ateFood" form="addFood" value="<?= $row['foodID'] ?>"
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
