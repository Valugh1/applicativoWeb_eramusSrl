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

require("config.php");


echo $username;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $sql = "SELECT * FROM utenti WHERE username = ?";
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST['password']);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
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
        $field_count = $result->fetch_assoc();
        echo '<pre>';
        print_r($field_count);
        // header("location: ../login_form.php?ui=username_inesistente");
    }
} else {
    echo "errore in fase di login";

    $conn->close();
}
