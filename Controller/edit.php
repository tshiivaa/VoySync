<?php
include '../Controller/inscriptioncontroller.php';
$utilisateurC = new utilisateurc();
$list = $utilisateurC->listUtilisateurs();

if (isset($_POST['delete'])) {
    $toemaild = $_POST['toemaild'];
    $utilisateurC->deleteUtilisateurs($toemaild);
}

if (isset($_POST['update'])) {
    $ancienEmail = $_POST['ancienEmail'];
    $nouveauEmail = $_POST['nouveauEmail'];
    $utilisateurC->updateUtilisateurs($nouveauEmail, $ancienEmail);
}

?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
</head>
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

                <div>
                    <label for="email">New</label>
                    <input type="email" value="<?= isset($utilisateurs) ? $utilisateurs->email : ''; ?>"
                           name="nouveauEmail"
                           id="email" class="form-control">
                </div>
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

