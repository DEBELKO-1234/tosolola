<?php
   session_start();

   try{
        $user = 'root';
        $password = ''; 
        $serveur = 'localhost';
        $connexion= new PDO("mysql:host=$serveur;dbname=messagerie",$user, $password);
       
        
        $requete= $connexion->prepare( "SELECT * FROM fich1 ");
        $requete->execute();
        $resultat= $requete->fetchall();

          /* echo '<pre>';
           print_r($resultat);
           echo '</pre>'; */
           
        foreach($resultat as $valeur){

           ?>

          

          
 
           <?php
            
                # code...
          ?><div style=" background-color: aliceblue; width: 30%; margin-left: 65%; margin-top: 2%; border-radius: 10%">

              
                 <img src="<?php echo $valeur[0]; ?>" alt="">
              </div>
              

                <?php
             
        }
        
   }catch(PDOException $e){
       echo "Echec de la connexion...";
   }

?>
