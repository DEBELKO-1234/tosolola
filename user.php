<?php
session_start();

                    try{
                         $user = 'root';
                         $password = ''; 
                         $serveur = 'localhost';
                         $connexion= new PDO("mysql:host=$serveur;dbname=messagerie",$user, $password);
                        
                         
                         $requete= $connexion->prepare( "SELECT Noim FROM tabletudiants");
                         $requete->execute();
                         $resultat= $requete->fetchall();

                           /* echo '<pre>';
                            print_r($resultat);
                            echo '</pre>'; */
                            
                         foreach($resultat as $valeur){

                            ?>

                           

                           
                  
                            <?php
                              
                                 # code...
                           ?>

                               <div>
                                  <p><?php echo $valeur[0]; ?></p>
                               </div>
                                 <?php
                              }

                         
                         
                    }catch(PDOException $e){
                        echo "Echec de la connexion...";
                    }

  