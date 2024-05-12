<!doctype html>
<html lang="en">
<head>
    <title>using FPDF</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width"/>
    <!-- *Note: You must have internet connection on your laptop or pc other wise below code is not working -->
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12" align="center">
            <br>
            <h5 align="center">using FPDF</h5>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>date_nais</th>
                    <th>password</th>
                    <th>phone</th>
                    <th>role</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once "../Controller/connexion.php";

                // Assuming config::connexion() returns a PDO connection object
                $conn = config::connexion();

                $display_query = "SELECT id, email, date_nais, password, phone, role FROM utilisateurs";
                $results = $conn->query($display_query);
                $count = $results->rowCount();

                if ($count > 0) {
                    while ($data_row = $results->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo $data_row['id']; ?></td>
                            <td><?php echo $data_row['email']; ?></td>
                            <td><?php echo $data_row['date_nais']; ?></td>
                            <td><?php echo $data_row['password']; ?></td>
                            <td><?php echo $data_row['phone']; ?></td>
                            <td><?php echo $data_row['role']; ?></td>
                            <td>
                                <a href="pdf_maker.php?user_id=<?php echo $data_row['id']; ?>&action=view" class="btn btn-success">
                                    <i class="fa fa-file-pdf-o"></i> View PDF
                                </a>
                                &nbsp;&nbsp;
                                <a href="pdf_maker.php?user_id=<?php echo $data_row['id']; ?>&action=download" class="btn btn-danger">
                                    <i class="fa fa-download"></i> Download PDF
                                </a>
                                &nbsp;&nbsp;
                                <a href="pdf_maker.php?user_id=<?php echo $data_row['id']; ?>&action=upload" class="btn btn-warning">
                                    <i class="fa fa-upload"></i> Upload PDF
                                </a>

                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<center>Developed by <a href="https://github.com/tshiivaa/VoySync.git">Tshiivaa</a></center>
</body>
</html>