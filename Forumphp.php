<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="assets/css/styl.css" rel="stylesheet">
   <title>Forumphp</title>
</head>

<body>
<?php
session_start();

                    try{
                         $user = 'root';
                         $password = ''; 
                         $serveur = 'localhost';
                         $connexion= new PDO("mysql:host=$serveur;dbname=messagerie",$user, $password);
                        
                         
                         $requete= $connexion->prepare( "SELECT * FROM tabletudiants, tablemessage WHERE tabletudiants.Matricule= tablemessage.Matricule");
                         $requete->execute();
                         $resultat= $requete->fetchall();

                           /* echo '<pre>';
                            print_r($resultat);
                            echo '</pre>'; */
                            
                         foreach($resultat as $valeur){

                            ?>

                           

                           
                  
                            <?php
                              if ($valeur[0]== $_SESSION['matricule']) {
                                 # code...
                           ?><div style=" background-color: aliceblue; width: 30%; margin-left: 65%; margin-top: 2%; border-radius: 10%">

                               <div>
                                  <p><?php echo $valeur[8]; ?></p>
                               </div>
                               <div style="padding-top: 5%">
                                  <p><?php echo $valeur[7]; ?>  à: <?php echo $valeur[6]; ?><br></p>
                            </div>
                               </div>
                                 <?php
                              }else{
                                 ?>
                                 <div style=" background-color: rgb(88, 161, 245); width: 40%; margin-left: 5%; margin-top: 2%; border-radius: 10%">
                                 <div>
                                 <table>
                                     <tr>
                                        <td> <img src= "<?php echo $valeur[4]; ?>" style=" width: 50px; height: 50px; border-radius: 50%"></td>
                                        <td><p style=" "><?php echo $valeur[1]; ?><br></p></td>
                                     </tr>
                                 </table>
                               </div>
                               <div>
                                  <p><?php echo $valeur[8]; ?></p>
                               </div>
                               <div style="padding-top: 5%;">
                                  <p><?php echo $valeur[7]; ?>  à: <?php echo $valeur[6]; ?><br></p>
                               </div>
                            </div>
                           <?php
                              }

                         }
                         
                    }catch(PDOException $e){
                        echo "Echec de la connexion...";
                    }

  ?>
   
</body>
</html>