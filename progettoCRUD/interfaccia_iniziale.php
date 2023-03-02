<?php
session_start();
if (!isset($_SESSION['loggato']) || ($_SESSION['loggato']) !== true) {
    header("location: ../login_form.php");
    exit;
    echo $_SESSION['loggato'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("header.php"); ?>
    <title>Interfaccia principale</title>
</head>

<body>
    <!-- navbar -->
    <?php include("navbar.php"); ?>


    <!-- footer -->
    <?php include("footer.php"); ?>
</body>

</html>