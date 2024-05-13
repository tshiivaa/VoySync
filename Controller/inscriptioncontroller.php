<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require 'connexion.php';
//require '../../Model/utilisateurs.php';
include "C:\Users\INFOKOM\Documents\github\VoySync\Model\utilisateurs.php";
$emailErr = "";
$dateErr = "";
$passwordErr = "";
$phoneErr = "";
$validForm = true;

class utilisateurc
{
    function testAndSave()
    {
        $GLOBALS['validForm'] = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
                $GLOBALS['emailErr'] = "Email is required";
                $GLOBALS['validForm'] = false;
            } else {
                $email = htmlspecialchars($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $GLOBALS['emailErr'] = "Invalid email format";
                    $GLOBALS['validForm'] = false;
                }
            }

            if (empty($_POST["date_nais"])) {
                $GLOBALS['dateErr'] = "date is required";

                $GLOBALS['validForm'] = false;
            } else {
                $date = htmlspecialchars($_POST["date_nais"]);
                // You may need additional validation for the date of birth
                if (!strtotime($date)) {
                    $GLOBALS['dateErr'] = "Invalid date format";
                    $GLOBALS['validForm'] = false;
                }
            }

            if (empty($_POST["phone"])) {
                $GLOBALS['phoneErr'] = "Phone number is required";
                $GLOBALS['validForm'] = false;
            } else {
                $phone = htmlspecialchars($_POST["phone"]);
            }


            if (empty($_POST["password"])) {
                $GLOBALS['passwordErr'] = "password is required";
                $GLOBALS['validForm'] = false;
            } else {
                $password = htmlspecialchars($_POST["password"]);
                if (strlen($password) < 8) {
                    $GLOBALS['passwordErr'] = "Invalid 8 characters min";
                    $GLOBALS['validForm'] = false;
                }
            }

            /*if (isset($_POST['email']) && $GLOBALS['validForm']) {
                $sql = "INSERT INTO utilisateurs (email, date_nais, password, phone) VALUES (:email, :date_nais, :password, :phone)";
                $stmt = configU::connexion()->prepare($sql);
                $utilisateur = new utilisateurs($_POST["email"], $_POST["date_nais"], $_POST["password"], $_POST["phone"]);
                $stmt->execute([':email' => $utilisateur->getEmail(), ':date_nais' => $utilisateur->getDateNaissance(), ':password' => $utilisateur->getPassword(), ':phone' => $utilisateur->getPhone()]);
                $stmt = null;
            }*/
            if (isset($_POST['email']) && $GLOBALS['validForm']) {
                $sql = "INSERT INTO utilisateurs (email, date_nais, password, phone) VALUES (:email, :date_nais, :password, :phone) ON DUPLICATE KEY UPDATE date_nais = VALUES(date_nais), password = VALUES(password), phone = VALUES(phone)";
                $stmt = configU::connexion()->prepare($sql);
                $utilisateur = new utilisateurs($_POST["email"], $_POST["date_nais"], $_POST["password"], $_POST["phone"]);
                $stmt->execute([':email' => $utilisateur->getEmail(), ':date_nais' => $utilisateur->getDateNaissance(), ':password' => $utilisateur->getPassword(), ':phone' => $utilisateur->getPhone()]);
                $stmt = null;
            }


        }
    }

    function testAndConnect()
    {
        $GLOBALS['validForm'] = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
                $GLOBALS['emailErr'] = "Email is required";
                $GLOBALS['validForm'] = false;
            } else {
                $email = htmlspecialchars($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $GLOBALS['emailErr'] = "Invalid email format";
                    $GLOBALS['validForm'] = false;
                }
            }

            if (empty($_POST["password"])) {
                $GLOBALS['passwordErr'] = "Password is required";
                $GLOBALS['validForm'] = false;
            } else {
                $password = htmlspecialchars($_POST["password"]);
                if (strlen($password) < 8) {
                    $GLOBALS['passwordErr'] = "Password must be at least 8 characters long";
                    $GLOBALS['validForm'] = false;
                }
            }
            if ($GLOBALS['validForm']) {
                $sql = "SELECT id, email, password, role FROM utilisateurs WHERE email = :email AND password = :password";
                $stmt = configU::connexion()->prepare($sql);
                $stmt->execute([':email' => $_POST["email"], ':password' => $_POST["password"]]);
                $user = $stmt->fetch();

                if ($user) {
                    // Récupérer l'ID et le rôle de l'utilisateur
                    $id = $user['id'];
                    $role = $user['role'];

                    // Redirection en fonction du rôle avec l'ID dans l'URL
                    if ($role == 'Admin') {
                        header("Location: ../Back/indexb.html?id=$id");
                        exit();
                    } elseif ($role == 'Client') {
                        header("Location: ../Front/indexf.php?id=$id");
                        exit();
                    } else {
                        // Si le rôle n'est ni "Admin" ni "Client", vous pouvez rediriger vers une page par défaut ou afficher un message d'erreur.
                        $GLOBALS['loginErr'] = "Role not recognized";
                    }
                } else {
                    $GLOBALS['loginErr'] = "Incorrect email or password";
                }
                $stmt = null;
            }
        }
    }

    function showUtilisateur($id)
    {
        $sql = "SELECT * FROM utilisateurs WHERE id = :id";
        $db = configU::connexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);

            $utilisateurs = $query->fetch();
            return $utilisateurs;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


}

?>
</tbody>
</table>

</body>
</html>