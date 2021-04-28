<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = 'localhost';
            $dbname = 'astro';
            $user = 'root';
            $pass = '';
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE TABLE sign(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(30) NOT NULL,
                        date VARCHAR(50) NOT NULL,
                        description VARCHAR(255) NOT NULL,
                        element VARCHAR(50) NOT NULL)";
                
                $dbco->exec($sql);
                echo 'Table bien créée !';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>