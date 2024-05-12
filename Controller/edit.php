<?php
require "connexion.php";
$conn = config::connexion();
$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $date_nais = $_POST['date_nais'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE `utilisateurs` SET `email`=:email, `date_nais`=:date_nais, `password`=:password, `phone`=:phone, `role`=:role WHERE id = :id");

        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date_nais', $date_nais);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id', $id);

        // Execute the statement
        $stmt->execute();

        // Redirect after successful update
        header("Location: index.php?msg=Data updated successfully");
        exit();
    } catch (PDOException $e) {
        // Handle errors
        echo "Failed: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <title>Users Dashboard</title>
</head>

<body style="background-color: #1D548DFF;">
<nav class="navbar navbar-light justify-content-center fs-3 mb-5"
     style="background-color: #FBCD5AFF; color: #1D548DFF;">
    Users Dashboard
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3 style="color: #FBCD5AFF;">Add New User</h3>
        <p class="text-muted" style="color: #FBCD5AFF;">Complete the form below to add a new user</p>
    </div>


    <?php
    $conn = config::connexion();

    $sql = "SELECT * FROM `utilisateurs` WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>


    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
                <label class="form-label" style="color: #FBCD5AFF;">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com"
                       value="<?php echo isset($row['email']) ? $row['email'] : '' ?>">
            </div>
            <div class="error"><?php if (!empty($emailErr)) echo $emailErr; ?></div>

            <div class="mb-3">
                <label class="form-label" style="color: #FBCD5AFF;">Date of Birth:</label>
                <input type="date" class="form-control" name="date_nais"
                       value="<?php echo isset($row['date_nais']) ? $row['date_nais'] : '' ?>">
            </div>
            <div class="error"><?php if (!empty($dateErr)) echo $dateErr; ?></div>

            <div class="mb-3">
                <label class="form-label" style="color: #FBCD5AFF;">Password:</label>
                <input type="password" class="form-control" name="password"
                       value="<?php echo isset($row['password']) ? $row['password'] : '' ?>">
            </div>
            <div class="error"><?php if (!empty($passwordErr)) echo $passwordErr; ?></div>


            <div class="mb-3">
                <label class="form-label" style="color: #FBCD5AFF;">Phone:</label>
                <input type="text" class="form-control" name="phone" placeholder="123456789"
                       value="<?php echo isset($row['phone']) ? $row['phone'] : '' ?>">
            </div>
            <div class="error"><?php if (!empty($phoneErr)) echo $phoneErr; ?></div>

            <div class="mb-3">
                <label style="color: #FBCD5AFF;">Role:</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="role" id="admin"
                       value="Admin"<?php echo (isset($row['role']) && $row['role'] == 'Admin') ? " checked" : "" ?>>
                <label for="admin" class="form-input-label" style="color: #FBCD5AFF;">Admin</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="role" id="client"
                       value="Client"<?php echo (isset($row['role']) && $row['role'] == 'Client') ? " checked" : "" ?>>
                <label for="client" class="form-input-label" style="color: #FBCD5AFF;">Client</label>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</body>

</html>