<!DOCTYPE html>
<html lang="en">
	<head>
            <meta charset="utf-8">
			<link rel="shortcut icon" href="assets/img/ico/favicon.ico">
			
			<link href="assets/css/style.css" rel="stylesheet">
			<link href="assets/css/styl.css" rel="stylesheet">
			<link href="assets/css/dede.css" rel="stylesheet">
			
			<link href="assets/css/animate.css" rel="stylesheet">
            <link href="assets/css/plugins.css" rel="stylesheet">

		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
			
		/>
		<link rel="stylesheet" href="css/style.css" />
		<title>ChatCord App</title>
	</head>
	<body>
		<div class="join-container">
			<header class="join-header">
				<h1><i class="fas fa-smile"></i>TO SOLOLA</h1>
			</header>
			<main class="join-main">
				<form method="POST" action="" enctype="multipart/form-data">
					<div class="form-control">
						<label for="matricule">Matricule</label>
						<input
							type="text"
							name="matricule"
							id="matricule"
							placeholder="Enter matricule..."
							required
						/>
					</div>
                    <div class="form-control">
						<label for="nom">Nom</label>
						<input
							type="text"
							name="nom"
							id="nom"
							placeholder="Enter nom..."
							required
						/>
					</div>
                    <div class="form-control">
						<label for="prenom">Prenom</label>
						<input
							type="text"
							name="prenom"
							id="prenom"
							placeholder="Enter prenom.."
							required
						/>
					</div>
                    <div class="form-control">
						<label for="filiere">Filiere</label>
						<input
							type="text"
							name="filiere"
							id="filiere"
							placeholder="Enter filiere..."
							required
						/>
					</div>
					<div>
							<label>photo</label>
							<input type="file" name="txtphoto" placeholder="Choisir une photo" id="txtphoto" required data-validation-required-message="Please enter your name.">
						</div>
					</div>
					<button type="submit" class="btn btn-default" name="botton" id="botton">S'inscrire</button>
				</form>
			</main>
		</div>


		<?php
					if(isset($_POST['botton'])){ 
					session_start();
					$_SESSION['matricule']= $_POST['matricule'];
					$_SESSION['nom']= $_POST['nom'];
					$_SESSION['prenom']= $_POST['prenom'];
					$_SESSION['filiere']= $_POST['filiere'];

			try{
				$user = 'root';
				$password = ''; //To be completed if you have set a password to root
				$serveur = 'localhost';
                $connexion= new PDO("mysql:host=$serveur;dbname=messagerie",$user, $password);
				
				$image=$_FILES['txtphoto']['tmp_name'];
				$chemin=$_FILES['txtphoto']['name'];
				move_uploaded_file($image,$chemin);
				
				$statement= $connexion->prepare ("INSERT INTO tabletudiants (Matricule, Noim , Prenom, Filiere, Photo) VALUES (:matricule, :nom, :prenom, :filiere, :photo)");
				$statement->bindParam(':matricule',$_POST['matricule']);
				$statement->bindParam(':nom',$_POST['nom']);
				$statement->bindParam(':prenom',$_POST['prenom']);
				$statement->bindParam(':filiere',$_POST['filiere']);
				$statement->bindParam(':photo',$chemin);
				$statement->execute();
				
				
				

				if($statement!= ""){
					header("location:index.php");
					}
					
					}catch(PDOException $e){
                    echo"Echec : ";
                }
				}
			?>
					
			
	
	 <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>



	</body>
</html>