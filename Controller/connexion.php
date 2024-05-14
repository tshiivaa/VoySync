<?php
class configU
{
    public static $conn=null;
    public static function connexion()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        try
        {
            self::$conn = new PDO("mysql:host=$servername;dbname=projetweb", $username, $password);
            //$conn = new mysqli($servername, $username, $password, "$dbname");
            //On définit le mode d'erreur de PDO sur Exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*echo 'Connexion réussie';*/
        }

        catch
        (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return self::$conn;
    }

}
?>