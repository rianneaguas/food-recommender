<?php

	var_dump($_FILES);

	if ($_FILES['file_name']['size'] == 0) {
		// empty file
		$error = "Missing file.";
	} elseif ($_FILES['file_name']['error'] != 0) {
		// error
		$error = "File error # " . $_FILES['file_name']['error'];
	} else {
		// save it as the original file
		$file = $_FILES['file_name']['name'];

		// notes of things to do
		$file = uniqid() . "_" . $file;

		// in case user uses spaces instead of underscore in name
		$file = preg_replace('/\s/', '_', $file);

		// send to uploads folder
		$file = 'uploads/' . $file;

		// echo "<hr>";

		move_uploaded_file($_FILES['file_name']['tmp_name'], $file);
	}

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

	.prompt{
		background-color: white;
		border-radius: 10px;
		padding: 8px;
		font-family: 'Quicksand', sans-serif;
		margin: 10px;
		margin-top: 30px;
	}

	.footer{
		margin-top: 50px;
	}

	.return-btn{
		text-align: center;
		padding: 12px;
		border-radius: 15px;
		background-color: #B2BF9F;
		font-family: 'Quicksand', sans-serif;
		margin: 20px;
		margin-bottom: 20px;
		margin-top: 5px;
		width: 20%;
		text-decoration: none;
		color: black;
	}

	.buttons{
		margin: 0px auto;
		padding: 0px;
		text-align: center;
		margin-top: 50px;
	}


	</style>
</head>

<body>
<div class="main">

	<div class="welcome">
		<img src="img/spaghetti.png" alt="spaghetti">
		<h2>file confirmation</h2>

		<h3>your file was successfully uploaded <a href="<?php echo $file; ?>" target="_blank">here</a>.</h3>
	</div><!-- welcome -->


	<div class="buttons">
		<a href="home.php" role="button" class="return-btn">Return to Home</a>
	</div><!-- buttons -->


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