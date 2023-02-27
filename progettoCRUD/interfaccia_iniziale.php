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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <title>Interfaccia principale</title>
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
    <a href="session/logout.php">Logout</a>
    <script src="script/interfaccia.js"></script>
</body>

</html>