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

    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="../View/images/logo.png" alt="">
        </div>
        <div class="search_bar">
            <input type="text" placeholder="Search">
        </div>
        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <i class='bx bx-bell'></i>
            <img src="../View/images/profiled.jpg" alt="" style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; " class="profile">
        </div>
    </nav>
    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title menu_dahsboard"></div>
                <li class="item">
                    <div href="index.html" class="nav_link submenu_item">
                <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
                </span>
                        <span class="navlink">Home</span>
                    </div>
                </li>
                <li class="item">
                    <a href="../View/Back/Depenses_back.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bx-wallet'></i>
                </span>
                        <span class="navlink">Pochette de voyage</span>
                    </a>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bxs-magic-wand"></i>
                        </span>
                        <span class="navlink">Itineraire magique</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="../View/Back/backofficeDestination.php" class="nav_link sublink">Destinations</a>
                        <a href="../View/Back/backofficeTransport.php" class="nav_link sublink">Transport</a>
                    </ul>
                </li>
                <li class="item">
                    <a href="../View/Back/afficherBlogBack.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bxs-chat'></i>
                </span>
                        <span class="navlink">Blog</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../View/Back/HomePage.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bx-map-alt'></i>
                </span>
                        <span class="navlink">Missions</span>
                    </a>
                </li>
                <li class="item">
                    <a href="index.php" class="nav_link">
                <span class="navlink_icon">
                <i class='bx bxs-user-account'></i>
                </span>
                        <span class="navlink">Compte</span>
                    </a>
                </li>
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                        <i class='bx bx-wallet'></i>
                        </span>
                        <span class="navlink">Offre</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="../View/Back/ListLogement.php" class="nav_link sublink">Logement</a>
                        <a href="../View/Back/ListVol.php" class="nav_link sublink">Vol</a>
                        <a href="../View/Back/ListReservation.php" class="nav_link sublink">Reservation</a>
                    </ul>
                </li>
            </ul>

            <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span> Expand</span>
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span> Collapse</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </div>
        </div>
    </nav>
<div class="main_body">

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