<?php

	$host = "304.itpwebdev.com";
	$user = "raguas_db_user";
	$pass = "Gyozasan02!";
	$db = "raguas_final_db";

	// 1. Establish MySQL Connection
	$mysqli = new mysqli($host, $user, $pass, $db);

	// Check for any connection errors
	if ($mysqli->connect_errno){
		echo $mysqli->connect_error;
		exit();
	}

	// 2. Submit SQL Statement
	$sql = "SELECT dish_name_id,
		dish_name.dish_names,
		types.type,
		origins.origin,
		dietary.dietary_restriction
		FROM dish_name
		LEFT JOIN types
		ON types.types_id = dish_name.types_id
		LEFT JOIN origins
		ON origins.origins_id = dish_name.origins_id
		LEFT JOIN dietary
		ON dietary.dietary_id = dish_name.dietary_id
		WHERE 1 = 1";

	if (isset($_GET['dish-name']) && trim($_GET['dish-name']) != ''){
		$dish_names = $_GET['dish-name'];
		$sql .= " AND dish_name.dish_names LIKE '%".$dish_names."%'";
	}

	if (isset($_GET['dish-type']) && trim($_GET['dish-type']) != ''){
		$dish_type = $_GET['dish-type'];
		$sql = $sql . " AND dish_name.types_id = $dish_type";
	}

	if (isset($_GET['dish-origin']) && trim($_GET['dish-origin']) != ''){
		$dish_origin = $_GET['dish-origin'];
		$sql = $sql . " AND dish_name.origins_id = $dish_origin";
	}

	if (isset($_GET['dish-diet']) && trim($_GET['dish-diet']) != ''){
		$dish_diet = $_GET['dish-diet'];
		$sql = $sql . " AND dish_name.dietary_id = $dish_diet";
	}

	$sql = $sql . ";";

	$random = "SELECT dish_name_id,
		dish_name.dish_names
		FROM dish_name
		ORDER BY RAND()";

	// debug
	// echo "<hr>$sql</hr>";

	$results = $mysqli->query($sql);

	 // Check for SQL errors.
	if ($results == false){
	 	echo $results->error;
	 	$mysqli->close();
	 	exit();
	 }

	// 3. Close the DB connection.
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

	.prompt{
		background-color: white;
		border-radius: 10px;
		padding: 8px;
		font-family: 'Quicksand', sans-serif;
		margin: 10px;
		margin-top: 30px;
	}

	.back-btn, .add-btn, .share-btn{
		text-align: center;
		padding: 12px;
		border-radius: 15px;
		background-color: #B2BF9F;
		font-family: 'Quicksand', sans-serif;
		margin: 20px;
		margin-bottom: 20px;
		margin-top: 30px;
		width: 20%;
		text-decoration: none;
		color: black;
	}

	.buttons{
		margin: 0px auto;
		padding: 0px;
		text-align: center;
		margin-bottom: 40px;
		margin-top: 34px;
	}

	img{
		height: 130px;
		margin: 18px;
		margin-left: auto;
		margin-right: auto;
		display: block;
	}

	h3{
		margin-top: 50px;
	}

	.results_table{
		width: 700px;
		color: black;
		text-align: center;
		margin-left: auto;
		margin-right: auto;
		text-align: left;
		margin-top: 30px;
		border: 2px solid #B2BF9F;
		padding: 20px;
		padding-left: 35px;
		padding-top: 10px;
	}

	th{
		font-weight: bolder;
		color: #D93823;
	}

	td{
		padding-left: 5px;
		padding-right: 30px;
	}

	.random h1{
		font-size: 25px;
	}

	.random p{
		color: black;
		text-align: center;
		font-size: 20px;
	}

	strong{
		color: #D95204;
		text-decoration: underline;
	}

	</style>
</head>

<body>
<div class="main">

	<img src="img/spaghetti.png" alt="spaghetti">

	<h1>dish recommendation search results</h1>

	<div class="buttons">
	<a href="home.php" role="button" class="back-btn">Back to Form</a>
	<a href="upload.php" role="button" class="add-btn">Upload Your Dish Pic</a>
	<a href="share.php" role="button" class="share-btn">Share This Form</a>
	</div> <!-- buttons -->

	<h3>showing <?php echo $results->num_rows; ?> out of 50 result(s).</h3>

	<div class="results">

		<table class="results_table">
			<thead>
				<tr>
					<th>dish name</th>
					<th>type</th>
					<th>origin</th>
					<th>dietary restrictions</th>
				</tr>
			</thead>
			<tbody>

				<?php while ($row = $results->fetch_assoc()) : ?>
					<tr>
						<td><?php echo $row['dish_names']; ?></td>
						<td><?php echo $row['type']; ?></td>
						<td><?php echo $row['origin']; ?></td>
						<td><?php echo $row['dietary_restriction']; ?></td>
					</tr>
				<?php endwhile; ?>

			</tbody>
		</table>

	</div> <!-- results -->

	<div class="random">
		<h1>still can't decide? i'll choose one for you!</h1>
		<p>the dish you should make is dish number <strong><?php echo (rand(1,3)); ?></strong> or <strong><?php echo (rand(4,20)); ?></strong>. i hope you enjoy it!</p>
	</div><!-- random -->

	<div class="footer">
	<p>© 2022 by Rianne Aguas</p>
	</div> <!-- footer -->

</div> <!-- main -->

<script>


</script>
		
</body>
</html>