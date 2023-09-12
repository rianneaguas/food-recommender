<?php

	$email = $_POST['email'];
	$subject = "Dish Recommendation Site";
	$message = "<h1>Hello there!/h1> <div style='font-weight: strong; color: brown;'>Your email was shared with me to recommend you my food recommendation site. It's a webpage I've worked hard on, I hope you check it out and enjoy my recommendations! Please check it out on the ITP304 home page under 'Rianne Aguas.' Thank you!</div>";

	$headers = [
		"Content-Type" => "text/html",
		"Reply-To" => "no-reply@usc.edu",
		"From" => "raguas@usc.edu"
	];

	mail($email, $subject, $message, $headers);

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

	.share-btn, .return-btn{
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
		margin-top: 50px;
	}


	</style>
</head>

<body>
<div class="main">

	<div class="welcome">
		<img src="img/spaghetti.png" alt="spaghetti">
		<h2>thank you!</h2>
		<h3>my page was shared with the email.<br>i appreciate your support! :)</h3>
	</div><!-- welcome -->

		<div class="buttons">
			<a href="share.php" role="button" class="share-btn">Return to Form</a>
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