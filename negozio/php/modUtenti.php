<?php
include("config.php");

$vecchioUsername = $connessione->real_escape_string($_POST["vecchioUsername"]);
$nuovoUsername = $connessione->real_escape_string($_POST["nuovoUsername"]);

$sqlId = "SELECT id FROM utenti WHERE id = '$vecchioUsername'";
$result = $connessione->query($sqlId);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
} else {
    echo "errore nel recupero id";
}
//$nome = $connessione->real_escape_string($_POST["nome"]);
//$cognome = $connessione->real_escape_string($_POST["cognome"]);









//query SQL per modifica tabella utenti lato db
$sql = "UPDATE utenti SET username='$nuovoUsername' WHERE id='$vecchioUsername'";


try {
    $connessione->query($sql);
    header("location: search.php");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>









/*
if (isset($_POST['submit'])) {
// $id = $_POST['id'];
// $nome = $_POST['nome'];
// $cognome = $_POST['cognome'];
$username = $_POST['username'];

$sql = "UPDATE utenti SET nome='$nome', cognome='$cognome', username='$username' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
echo "Record modificato con successo";
} else {
echo "Errore nella modifica del record: " . $conn->error;
}
}*/