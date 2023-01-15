<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="css/style.css">
  <title>ChatCord App</title>
</head>
<body>
  <div class="chat-container">
    <header class="chat-header">
      <h1><i class="fas fa-smile"></i> TO SOLOLA</h1>
      <a href="fich1"class="btn" id="fichi">Voir les fichierts</a>
    </header>
    <main class="chat-main">
      <div class="chat-sidebar" id="user">
      
        <h3><i></i>Users</h3>
        <ul id="users">
          <li></li>


          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <Li></Li>
          <li></li>
        </ul>
      </div>
      <section id="re" class="chat-messages" style="overflow-y: auto;
                                          height: 100%">
               
     </section>
      
    </main>
    <div class="chat-form-container">
    
      <form id="chat-form" method="Post" action="" enctype="multipart/form-data">
        <input id="txtphoto" name="txtphoto" type="file">
        <input
          id="msg"
          type="text"
          name="msg"
          placeholder="Entrer le Message"
          required
        />
        <button type="submit" class="btn" class="fas fa-paper-plane" id="envoy" name="envoy">Envoyer</button>
      </form>
    </div>
  </div>

<?php
  if(isset($_POST['envoy'])){
    session_start();
            $_SESSION['message']= $_POST['msg'];
        try{
                 $user = 'root';
                 $password = ''; 
                 $serveur = 'localhost';
                 $connexion= new PDO("mysql:host=$serveur;dbname=messagerie",$user, $password);
                 
                $message= nl2br(htmlspecialchars($_SESSION['message']));
                $matricule= htmlspecialchars($_SESSION['matricule']);
                $date= date('y-m-d');
                $heure= date('H:i');
                
                $reque= $connexion->prepare( "INSERT INTO tablemessage (Matricule, Heure, Date, Message) VALUES ( ?,?,?,?)");
                $reque->execute(array($matricule, $heure, $date, $message));
             
                
				$image=$_FILES['txtphoto']['tmp_name'];
				$chemin=$_FILES['txtphoto']['name'];
				move_uploaded_file($image,$chemin);
        
        $statement= $connexion->prepare("INSERT INTO fich1(fichiers) VALUES(:photo)");
        $statement->bindParam(':photo',$chemin);
				$statement->execute();
           
        }catch(PDOException $e){
            echo "Erreur de connexion...";
        }
  
      }
?>

  <script>
  document.getElementById('envoy').addEventListener('click', test1);
  function test1() {
    <?php $i=1; ?>
        setInterval(function() {
            $('#re').load('Forumphp.php');
        }, 20);
    }

    setInterval(function() {
            $('#re').load('Forumphp.php');
        }, 20);

   
        setInterval(function() {
            $('#users').load('user.php');
        }, 20);


</script>




           
<script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
     
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>
          

</body>
</html>