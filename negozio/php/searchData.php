<?php
include "config.php";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>searchData</title>
</head>

<body>
    <?php

    $data = $_GET['data'];
    $querySelect = "SELECT * FROM utenti WHERE id= $data";
    $result = mysqli_query($connessione, $querySelect);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo '<div class="container">
        <div class="jumbotron">
            <h1 class="display-4"><b>' . $row['nome'] . '</b><br> qui si potra modificare i vari campi</h1>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>';
    } else {
        echo "errore nella query: " . $connessione->connect_error;
    }
    ?>

</body>

</html>