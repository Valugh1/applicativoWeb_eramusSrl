<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>login</title>
</head>

<body>

</body>

</html>
<?php

require_once("config.php");

$username = $conn->real_escape_string($_POST["username"]);
$password = $conn->real_escape_string($_POST['password']);


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $sql_select = "SELECT * FROM utenti WHERE username = '$username'";
    if ($risultato = $conn->query($sql_select)) {
        if ($risultato->num_rows == 1) {
            $row = $risultato->fetch_array(MYSQLI_ASSOC);
            if (password_verify($password, $row['password'])) {
                session_start();

                //setto variabili utente nella sessione
                $_SESSION['loggato'] = true;
                $_SESSION['username'] = $row['username'];
                header("location: ../interfaccia_iniziale.php");
            } else {
                echo "<p class='text-danger'>la password non e' corretta</p> <pre>";
                print_r($_POST);
                echo " <br>" . $row['password'];
                echo "<br> " . $password;
            }
        } else {
            echo "username inesistente";
            // header("location: ../login_form.php?ui=username_inesistente");
        }
    } else {
        echo "errore in fase di login";
    }
    $conn->close();
}
