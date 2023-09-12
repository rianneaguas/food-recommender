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
		margin-top: 20px;
	}


	</style>
</head>

<body>
<div class="main">

	<div class="welcome">
		<img src="img/spaghetti.png" alt="spaghetti">
		<h2>share this form</h2>
		<h3>thank you for wanting to share my page!</h3>
	</div><!-- welcome -->

	<form action="share_confirmation.php" method="POST">

		<div class="questions">
			<label for="email-id">enter an email to share with:</label>
				<input type="text" class="prompt" id="email-id" name="email">
		</div><!-- questions -->

		<div class="buttons">
			<button type="submit" class="share-btn">Share</button>
			<!-- <a href="add.php" role="button" class="share-btn">Share</a> -->
			<a href="home.php" role="button" class="return-btn">Return to Home</a>
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