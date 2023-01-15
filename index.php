<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="css/style.css" />
		<title>ChatCord App</title>
	</head>

	<body>
		<div class="join-container">
			<header class="join-header">
				<h1><i class="fas fa-smile"></i>TO SOLOLA</h1>
			</header>
			<main class="join-main">
				<form action="" method="POST">
					<div class="form-control">
						<label for="matricul">Matricule</label>
						<input
							type="text"
							name="matricul"
							id="matricul"
							placeholder="Entrer Matricule..."
							required
						/>
					</div>
					
					<button type="submit" class="btn" id="bouton" name="bouton">Rejoindre chat</button>
				</form>
			</main>
		</div>

		<?php


if(isset($_POST['bouton'])){
    session_start();
 $_SESSION['matricule']= $_POST['matricul'];
 header("location:chat.php");
}
       ?>

<script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>

	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>



	</body>
</html>