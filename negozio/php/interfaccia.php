<?php
session_start();
if (!isset($_SESSION['loggato']) || ($_SESSION['loggato']) !== true) {
    header("location: ../index.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaccia</title>
</head>

<body>
    <h1>Interfaccia</h1>

    <?php
    echo "Ciao " . $_SESSION['username'];

    ?>
    <br>




    <button id="area-utenti">Area utenti</button><br>


    <button id="area-inventario">Area inventario</button>







    <br>
    <a href="logout.php">Logout</a>
    <script src="../script/interfaccia.js"></script>
</body>

</html>