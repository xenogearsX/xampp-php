
        <?php
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT');
            header('Access-Control-Allow-Headers: Host, Connection, Accept, Authorization, Content-Type, X-Requested-With, User-Agent, Referer, Methods');
            if($_SERVER["REQUEST_METHOD"]== "OPTIONS"){
                echo "";die;
            }
            $servname = "localhost"; $dbname = "astro"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
                $sth = $dbco->prepare("SELECT * FROM sign");
                $sth->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                $keys = array_keys($resultat);
                /*print_r permet un affichage lisible des résultats,
                 *<pre> rend le tout un peu plus lisible*/
                print_r(json_encode($resultat));
                // for($i = 0; $i < count($resultat); $i++){ //résultat formatté
                //     $n = $i + 1;
                //     echo 'Signe astrologique n°' .$n. ' :<br>';
                //     foreach($resultat[$keys[$i]] as $key => $value){
                //         echo $key. ' : ' .$value. '<br>';
                //     }
                //     echo '<br>';
                // }
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
