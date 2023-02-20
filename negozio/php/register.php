<?php

require_once("config.php");
//controllo escapes
$username = $connessione->real_escape_string($_POST["username"]);
$password = $connessione->real_escape_string($_POST["password"]);
$nome = $connessione->real_escape_string($_POST["nome"]);
$cognome = $connessione->real_escape_string($_POST["cognome"]);
$hashed_password = password_hash($password, PASSWORD_ARGON2I);

$sqlQuery = "INSERT INTO utenti (username, password, nome, cognome) VALUES (?, ?, ?, ?)";

//binding delle variabili come stringa
$insert_utenti = $connessione->prepare($sqlQuery);
if ($insert_utenti == true) {
    # code...  $connessione->error $insert_utenti
    $insert_utenti->bind_param("ssss", $username, $hashed_password, $nome, $cognome);
} else {
    die("Errore nella query SQL: " . $connessione->error);
}


if ($insert_utenti->execute() == true) {
    header("location: ../index.php");
} else {
    die("Errore registrazione utente $sql: " . $connessione->error);
}
