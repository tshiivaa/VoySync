<?php
require "connexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Voysync</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body style="background-color: #1D548DFF;">
<nav class="navbar navbar-light justify-content-center fs-3 mb-5"
     style="background-color: #fbcd5a;color: #1D548DFF;">
    Users Dashboard
</nav>

<div class="container">
    <?php
    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center" style="background-color: #FBCD5AFF; color: #1D548DFF;">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">DateNais</th>
            <th scope="col">Password</th>
            <th scope="col">Phone</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $conn = configU::connexion();
        $sql = "SELECT * FROM utilisateurs";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["date_nais"] ?></td>
                <td><?php echo $row["password"] ?></td>
                <td><?php echo $row["phone"] ?></td>
                <td><?php echo $row["role"] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i
                                class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                    <a href="javascript:void(0)" onclick="confirmDelete(<?php echo $row['id']; ?>)"
                       class="link-dark"><i
                                class="fa-solid fa-trash fs-5"></i></a>
                </td>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<script>
    function confirmDelete(userId) {
        if (confirm("Are you sure for this operation?")) {
            window.location.href = "delete.php?id=" + userId;
        }
    }
</script>

</body>

</html>
<script src="../js/script.js"></script>
<script>
    document.getElementById("logout").addEventListener("click", function () {
        window.location.href = "../View/Front/inscriptionview.php";
    });
</script>