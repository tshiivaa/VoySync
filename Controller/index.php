<!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Users Dashboard</title>
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
            $sql = "SELECT * FROM `utilisateurs`";
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