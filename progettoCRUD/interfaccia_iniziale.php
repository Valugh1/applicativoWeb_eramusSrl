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
    <style>
        .container {
            display: flex;
            justify-content: space-between;

        }

        .riconoscimento {
            text-align: center;
            margin-top: 20px;
            margin-left: 50%;
        }
    </style>
    <title>Interfaccia principale</title>
</head>

<body>
    <div class="riconoscimento">
        <?php
        echo "Benvenuto, " . $_SESSION['username'] . "!";
        ?>
        <button class="btn btn-warning" id="logout" onclick='location.href="session/logout.php"'>Logout</button>
    </div>
    <br>
    <div class="container">
        <!-- area utenti -->
        <button class='btn btn-secondary btn-sm' id="area-utenti">Area utenti</button><br>
        <!-- area inventario -->
        <button class='btn btn-secondary btn-sm' id="area-inventario">Area inventario</button>
    </div>



    <script src="script/interfaccia.js"></script>
</body>

</html>