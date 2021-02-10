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
	<style>
		.jumbotron {
			background-color:#ffefeb !important; 
		}
	</style>
	
    <body>
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
              <a class="nav-link" href="http://localhost/isp/CalTracker/MealMaker.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/isp/CalTracker/help.php">Help</a>
            </li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/isp/CalTracker/about.php">About</a>
			</li>
          </ul>
        </div>
      </nav>

	
	<div class="mx-auto" style="width: 1200px;">
	
	<br>
    <div class="jumbotron">
		<div class="container">
			<h1 class="display-4">Help Page</h1>
			<p class="lead">Instructions for understanding the basic functionality of CalTracker</p>
		</div>
	</div>

      <h4> Getting Started </h4>
        <p> To enter a meal, please add foods one at a time.
        You can either enter existing foods from the database, or input your own.
        On the home page, click "Add another food" to get started</p>
        <img src="pictures/addFood.PNG" alt="Add another food" width="500">
	  
	  <br>
      <h4> Adding New Foods </h4>
        <p>To add a new food, fill out the form under the table, then click "save"</p>
        <img src="pictures/addNew.PNG" alt="Save" width="500">
		
	  <br>
	  <br>
      <h4> Adding existing foods </h4>
        <p> To add a food from the table to your meal, click the "add" buton, next to the food you wish to add
            <br> You can also use the search bar to find foods you are looking for.</p>
        <img src="pictures/addExisting.PNG" alt="Add" width="500">

	  <br>
	  <br>
	  <h4> Deleting existing foods </h4>
        <p> To delete a food from the table permanently, click the "delete" buton, next to the food you wish to delete.
            <br> You can also use the search bar to find foods you are looking for and delte them from there.
			<br> You will need a password to do this. </p>
        <img src="pictures/deleteExisting.PNG" alt="delete" width="500">

	  <br>
	  <br>
      <h4> Removing food </h4>
        <p> To remove a food from your meal, just click the "remove" button to the right of the food,
           or to clear the whole meal, click "clear the table" </p>
          <img src="pictures/removeClear.PNG" alt="Remove" width="500">

	  <br>
      <h4> Calculated Nutritional Information </h4>
        <p> When you're done, the "Your Current Meal" table will display all the foods you entered, the nutritional information
           for each food, and the total calculated values for each inputted nutritional value </p>
	</div>
    </body>
</html>
