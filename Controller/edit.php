<?php
include '../Controller/inscriptioncontroller.php';
$utilisateurC = new utilisateurc();
$list = $utilisateurC->listUtilisateurs();
$toemaildErr = "";
$ancienEmailErr = "";
$nouveauEmailErr = "";
$validForm = true;
if (isset($_POST['delete'])) {

    $GLOBALS['validForm'] = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["toemaild"])) {
            $GLOBALS['toemaildErr'] = "Email is required";
            $GLOBALS['validForm'] = false;
        } else {
            $toemaild = htmlspecialchars($_POST["toemaild"]);
            if (!filter_var($toemaild, FILTER_VALIDATE_EMAIL)) {
                $GLOBALS['toemaildErr'] = "Invalid email format";
                $GLOBALS['validForm'] = false;
            }
        }

        if ($GLOBALS['validForm']) {
            $toemaild = $_POST['toemaild'];
            $utilisateurC->deleteUtilisateurs($toemaild);
        }
    }
}

if (isset($_POST['update'])) {

    if (empty($_POST["ancienEmail"])) {
        $GLOBALS['ancienEmailErr'] = "Ancien email is required";
        $GLOBALS['validForm'] = false;
    } else {
        $ancienEmail = htmlspecialchars($_POST["ancienEmail"]);
        if (!filter_var($ancienEmail, FILTER_VALIDATE_EMAIL)) {
            $GLOBALS['ancienEmailErr'] = "Invalid email format";
            $GLOBALS['validForm'] = false;
        }
    }

    if (empty($_POST["nouveauEmail"])) {
        $GLOBALS['nouveauEmailErr'] = "Nouveau email is required";
        $GLOBALS['validForm'] = false;
    } else {
        $nouveauEmail = htmlspecialchars($_POST["nouveauEmail"]);
        if (!filter_var($nouveauEmail, FILTER_VALIDATE_EMAIL)) {
            $GLOBALS['nouveauEmailErr'] = "Invalid email format";
            $GLOBALS['validForm'] = false;
        }
    }

    if ($GLOBALS['validForm']) {
        $ancienEmail = $_POST['ancienEmail'];
        $nouveauEmail = $_POST['nouveauEmail'];
        $utilisateurC->updateUtilisateurs($nouveauEmail, $ancienEmail);
    }

}

?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="edit.css"/>
</head>
<body>
<nav class="navbar">
    <div class="logo_item">
        <img src="../back/images/logo.png" alt="">Voysync
    </div>
</nav>
</body>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update utilisateur</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">

                <div class="form-group">
                    <label for="email">Ancient</label>
                    <input type="email" value="<?= isset($utilisateurs) ? $utilisateurs->email : ''; ?>"
                           name="ancienEmail"
                           id="email" class="form-control">
                </div>
                
                <div class="error"><?php if (!empty($ancienEmailErr)) echo $ancienEmailErr; ?></div>

                <div>
                    <label for="email">New</label>
                    <input type="email" value="<?= isset($utilisateurs) ? $utilisateurs->email : ''; ?>"
                           name="nouveauEmail"
                           id="email" class="form-control">
                </div>

                <div class="error"><?php if (!empty($nouveauEmailErr)) echo $nouveauEmailErr; ?></div>

                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-info">Update utilisateur</button>
                </div>
            </form>
        </div>


    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h2>Delete utilisateur</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?= isset($utilisateurs) ? $utilisateurs->email : ''; ?>" name="toemaild"
                           id="email" class="form-control">
                </div>

                <div class="error"><?php if (!empty($toemaildErr)) echo $toemaildErr; ?></div>

                <div class="form-group">
                    <button type="submit" name="delete" class="btn btn-info">Delete utilisateur</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <h2>Liste des utilisateurs</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>email</th>
                    <th>date_nais</th>
                    <th>password</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $utilisateurs): ?>
                    <tr>
                        <td><?= $utilisateurs['email']; ?></td>
                        <td><?= $utilisateurs['date_nais']; ?></td>
                        <td><?= $utilisateurs['password']; ?></td>
                        <td>
                            <button class="edit-button">edit</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-button');

        editButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                const row = event.target.closest('tr');
                const ancienEmail = row.cells[0].innerText;
                document.getElementById('email').value = ancienEmail;

            });
        });
    });
</script>

