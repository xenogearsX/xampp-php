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
                
                $dbco->beginTransaction();
                
                $sql = "CREATE TABLE sign(
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(30) NOT NULL,
                    date VARCHAR(50) NOT NULL,
                    description VARCHAR(255) NOT NULL,
                    element VARCHAR(50) NOT NULL,
                    constellation VARCHAR(500) NOT NULL)";
                    $dbco->exec($sql);

                $sql1 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Bélier ♈','21 mars - 20 avril','Le bélier est le premier signe du zodiaque. Il symbolise l\'impulsion, la virilité, le courage, l\'énergie et l\'indépendance.','feu','http://www.astronoo.com/images/constellations/belier.jpg')";
                $dbco->exec($sql1);
                
                $sql2 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Taureau ♉','21 avril - 21 mai','Le signe du taureau se situe entre l\'équinoxe du printemps et le solstice d\'été. Il est généralement associé à une grande puissance de travail, la sensualité ainsi qu\'à une tendance exagérée pour les plaisirs.','terre','http://www.astronoo.com/images/constellations/taureau.jpg')";
                $dbco->exec($sql2);

                $sql3 = "INSERT INTO sign(name,date,description,element,constellation)
                         VALUES('Gémeaux ♊','22 mai - 21 juin','Généralement représenté sous la forme de deux enfants se tenant par la main, le troisième signe du zodiaque symbolise les contacts humains, les transports, les communications ainsi que la polarité.','air','http://www.astronoo.com/images/constellations/gemeaux.jpg')";
                $dbco->exec($sql3);

                $sql4 = "INSERT INTO sign(name,date,description,element,constellation)
                         VALUES('Cancer ♋','22 juin - 22 juillet','Le signe du cancer se situe juste après le solstice d\'été. Il a pour signification le retrait sur soi, la timidité, la ténacité ainsi que la sensibilité.','eau','http://www.astronoo.com/images/constellations/cancer.jpg')";
                $dbco->exec($sql4);

                $sql5 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Lion ♌','23 juillet - 22 août','Ce signe situé en plein milieu de l\'été a pour symbole la joie de vivre, l\'ambition, l\'élévation et l\'orgueil.','feu','http://www.astronoo.com/images/constellations/lion.jpg')";
                $dbco->exec($sql5);

                $sql6 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Vierge ♍','23 août - 22 septembre','Le signe de la vierge se place avant l\'équinoxe d\'automne. Il est symbole de travail, de moisson, de dextérité manuelle et de minutie.','terre','http://www.astronoo.com/images/constellations/vierge.jpg')";
                $dbco->exec($sql6);

                $sql7 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Balance ♎','23 septembre - 22 octobre','Lorsqu\'il entre dans ce signe, le soleil est au point médian de l\'année astronomique. Il représente l\'équilibre, la justice, la mesure.','air','http://www.astronoo.com/images/constellations/balance.jpg')";
                $dbco->exec($sql7);

                $sql8 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Scorpion ♏','23 octobre - 22 novembre','Le huitième signe du zodiaque est associé à la résistance. Il est présenté comme le signe le plus passionné du zodiaque. À tendance sombre, le scorpion peut avoir une tendance à l\'autodestruction.','eau','http://www.astronoo.com/images/constellations/scorpion.jpg')";
                $dbco->exec($sql8);

                $sql9 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Sagittaire ♐','23 novembre - 21 décembre','Le signe du sagittaire se place juste avant le solstice d\'hiver. Il a pour symbole le mouvement, les réflexes vifs, les instincts nomades ainsi que l\'indépendance.','feu','http://www.astronoo.com/images/constellations/sagittaire.jpg')";
                $dbco->exec($sql9);

                $sql10 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Capricorne ♑','22 décembre - 20 janvier','Le signe du capricorne commence au solstice d\'hiver. Il est le symbole de la fin d\'un cycle mais aussi de la naissance d\'un cycle nouveau. Il est associé à la patience, la persévérance, la prudence, la réalisation ainsi que le sens du devoir.','terre','http://www.astronoo.com/images/constellations/capricorne.jpg')";
                $dbco->exec($sql10);

                $sql11 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Verseau ♒','21 janvier - 19 février','Le signe du verseau a pour symbole la fraternité, l\'indifférence aux choses matérielles, la coopération et la solidarité collective.','air','http://www.astronoo.com/images/constellations/verseau.jpg')";
                $dbco->exec($sql11);

                $sql12 = "INSERT INTO sign(name,date,description,element,constellation)
                        VALUES('Poissons ♓','20 février - 20 mars','Le dernier signe du zodiaque symbolise l\'émotivité, l\'hypersensibilité, l\'angoisse ou encore l\'imagination.','eau','http://www.astronoo.com/images/constellations/poissons.jpg')";
                $dbco->exec($sql12);

                $dbco->commit();
                echo 'Entrées ajoutées dans la table';
            }
            
            catch(PDOException $e){
                $dbco->rollBack();
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>