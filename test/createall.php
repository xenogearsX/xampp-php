<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $createDB = "CREATE DATABASE cours";
                $dbco->exec($createDB);
                
                //On utilise la base tout juste créée pour créer une table dedanss
                $createTb = "use cours";
                $dbco->exec($createTb);
                
                $createTb = "CREATE TABLE users(
                  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  prenom VARCHAR(30) NOT NULL,
                  nom VARCHAR(30) NOT NULL,
                  mail VARCHAR(50),
                  dateInscrit TIMESTAMP)";
                $dbco->exec($createTb);
                
                $sth = $dbco->prepare("
                  INSERT INTO users(prenom, nom, mail)
                  VALUES (:prenom, :nom, :mail)
                ");
                $sth->bindParam(':prenom', $prenom);
                $sth->bindParam(':nom', $nom);
                $sth->bindParam(':mail', $mail);
                
                $prenom = "Pierre"; $nom = "Giraud"; $mail = "pierre.giraud@edhec.com";
                $sth->execute();
                $prenom = "Victor"; $nom = "Durand"; $mail = "v.durand@edhec.com";
                $sth->execute();
                $prenom = "Julia"; $nom = "Joly"; $mail = "july@gmail.com";
                $sth->execute();
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>