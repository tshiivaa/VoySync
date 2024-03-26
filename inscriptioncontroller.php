<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'connexion.php';
include 'utilisateurs.php';
$emailErr = "";
$dateErr = "";
$passwordErr = "";
$validForm = true;

class utilisateurc
{
    function testAndSave()
    {
        $GLOBALS['validForm']  = true;
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

            if (isset($_POST['email']) && $GLOBALS['validForm']) {
                $sql = "INSERT INTO utilisateurs (email,date_nais,password) VALUES (:email, :date_nais, :password)";
                $stmt = $GLOBALS['conn']->prepare($sql);
                $utilisateur = new utilisateurs($_POST["email"], $_POST["date_nais"], $_POST["password"]);
                $stmt->execute([':email' => $utilisateur->getEmail(), ':date_nais' => $utilisateur->getdate_nais(), ':password' => $utilisateur->getpassword()]);
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
                $GLOBALS['passwordErr'] = "password is required";
                $GLOBALS['validForm'] = false;
            } else {
                $password = htmlspecialchars($_POST["password"]);
                if (strlen($password) < 8) {
                    $GLOBALS['passwordErr'] = "Invalid 8 characters min";
                    $GLOBALS['validForm'] = false;
                }
            }
            if ( $GLOBALS['validForm']) {
                $sql = "SELECT email, password FROM utilisateurs WHERE email = :email AND password = :password";
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute([':email' => $_POST["email"], ':password' => $_POST["password"]]);
                if ($stmt->fetch()) {

                    header("Location: premier.php");
                    exit();
                } else {
                    $GLOBALS['loginErr'] = "Identifiants incorrects";
                }
                $stmt = null;
            }


        }
    }


}

?>
</tbody>
</table>

</body>
</html>