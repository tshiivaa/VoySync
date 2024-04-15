<?php
class Configuration
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=voysync',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
                // Removed echo statement
                // echo ("connected successfully");
            } catch (PDOException $e) { // Changed Exception to PDOException
                // Changed die to throw an exception
                throw new Exception('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

?>