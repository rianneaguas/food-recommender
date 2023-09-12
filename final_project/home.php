<?php

	$host = "304.itpwebdev.com";
	$user = "raguas_db_user";
	$db = "raguas_final_db";

	// 1. Establish MySQL Connection
	$mysqli = new mysqli($host, $user, $pass, $db);

	// Check for any connection errors
	if ($mysqli->connect_errno){
		echo $mysqli->connect_error;
		exit();
	}

	// 2. Submit SQL statement

	// DISH NAMES
	$sql_dishes = "SELECT * FROM dish_name;";
	$results_dishes = $mysqli->query($sql_dishes);

	// Check for any SQL errors
	if ($results_dishes == false){
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	// DISH TYPES
	$sql_types = "SELECT * FROM types;";
	$results_types = $mysqli->query($sql_types);

	if ($results_types == false){
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	// DISH ORIGINS
	$sql_origins = "SELECT * FROM origins;";
	$results_origins = $mysqli->query($sql_origins);

	if ($results_origins == false){
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}	

	// DISH DIETARY RESTRICTIONS
	$sql_dietary = "SELECT * FROM dietary;";
	$results_dietary = $mysqli->query($sql_dietary);

	if ($results_dietary == false){
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	// 3. Close the DB connection
	$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

	<meta charset="UTF-8">

	<title>Final Project | Rianne Aguas</title>

	<style>
	body{
		font-family: 'Quicksand', sans-serif;
	}

	img{
		height: 130px;
		margin: 18px;
		margin-left: auto;
		margin-right: auto;
		display: block;
	}

	.welcome h1{
		margin: 10px;
		font-size: 50px;
	}

	.questions{
		color: black;
		text-align: center;
	}

	form{
		margin-bottom: 20px;
	}

	.prompt{
		background-color: white;
		border-radius: 10px;
		padding: 8px;
		font-family: 'Quicksand', sans-serif;
		margin: 10px;
		margin-top: 30px;
	}

	.search-btn, .reset-btn{
		text-align: center;
		padding: 12px;
		border-radius: 15px;
		background-color: #B2BF9F;
		font-family: 'Quicksand', sans-serif;
		margin: 20px;
		margin-bottom: 20px;
		margin-top: 30px;
		width: 20%;
	}

	.buttons{
		margin: 0px auto;
		padding: 0px;
		text-align: center;
	}


	</style>
</head>

<body>
<div class="main">

	<div class="welcome">
		<h1>hello!</h1>
		<img src="img/spaghetti.png" alt="spaghetti">
		<h2>looking for a recommendation for a new dish?</h2>
		<h3>a college foodie presents to you some suggestions based on the below information:</h3>
	</div><!-- welcome -->

		<form action="results.php" method="GET">

		<!-- Question 1 -->
		<div class="questions">
		<label for="dish-name">type a dish name:</label>
			<input type="text" class="prompt" id="dish-name" name="dish-name">
		</div> <!-- questions -->

		<!-- Question 2 -->
		<div class="questions">
		<label for="dish-type">select a dish type:</label>
			<select name="dish-type" class="prompt" id="dish-type">
				<option value="" selected>-- Select One --</option>

				<?php while ($row = $results_types->fetch_assoc()): ?>
					<option value="<?php echo $row['types_id'];?>">
					<?php echo $row['type']; ?>
					</option>
				<?php endwhile; ?>

			</select>
		</div> <!-- questions -->

		<!-- Question 3 -->
		<div class="questions">
		<label for="dish-origin">select a dish origin:</label>
			<select name="dish-origin" class="prompt" id="dish-origin">
				<option value="" selected>-- Select One --</option>

				<?php while ($row = $results_origins->fetch_assoc()): ?>
					<option value="<?php echo $row['origins_id'];?>">
					<?php echo $row['origin']; ?>
					</option>
				<?php endwhile; ?>

			</select>
		</div> <!-- questions -->

		<!-- Question 4 -->
		<div class="questions">
		<label for="dish-diet">select a dietary/restriction:</label>
			<select name="dish-diet" class="prompt" id="dish-diet">
				<option value="" selected>-- Select One --</option>

				<?php while ($row = $results_dietary->fetch_assoc()): ?>
					<option value="<?php echo $row['dietary_id'];?>">
					<?php echo $row['dietary_restriction']; ?>
					</option>
				<?php endwhile; ?>

			</select>
		</div> <!-- questions -->


		<div class="buttons">
			<button type="submit" class="search-btn">Search</button>
			<button type="reset" class="reset-btn">Reset</button>
		</div><!-- buttons -->

		</form>

		<div class="footer">
		<p>© 2022 by Rianne Aguas</p>
		</div> <!-- footer -->

</div> <!-- main -->

<script>

// when search button is clicked

	
// when reset button is clicked
document.querySelector('.reset-btn').onclick = function(){
	document.querySelector('#dish-name').innerHTML = "";

	document.querySelector('#dish-name').value = "";
}

</script>
		
</body>
</html>
