<?php

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=voysyncbd", $username, $password);
            //$conn = new mysqli($servername, $username, $password, "$dbname");
            //On définit le mode d'erreur de PDO sur Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*echo 'Connexion réussie';*/
        }

        catch
        (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

?>