<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>password errata</title>
</head>

<body>

</body>

</html>
<?php

require_once("config.php");

$username = $connessione->real_escape_string($_POST["username"]);
$password = $connessione->real_escape_string($_POST["password"]);


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $sql_select = "SELECT * FROM utenti WHERE username = '$username'";
    if ($risultato = $connessione->query($sql_select)) {
        if ($risultato->num_rows == 1) {
            $row = $risultato->fetch_array(MYSQLI_ASSOC);
            if (password_verify($password, $row['password'])) {
                session_start();

                //setto variabili utente nella sessione
                $_SESSION['loggato'] = true;
                $_SESSION['username'] = $row['username'];
                header("location: area-privata.php");
            } else {
                echo "<p class='text-danger'>la password non e' corretta</p>";
            }
        } else {
            echo "username inesistente";
            header("location: ../index.php?ui=username_inesistente");
        }
    } else {
        echo "errore in fase di login";
    }
    $connessione->close();
}
