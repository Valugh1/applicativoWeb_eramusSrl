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
    <script src="../script/script.js"></script>
    <title>Area privata</title>
</head>

<body>
    <h1>area privata.</h1>
</body>
<?php
echo "Ciao " . $_SESSION['username'];

?>
<br>
<a href="../area_utenti.php">accedi all'area utenti</a><br>
<a href="../area_inventario.php">accedi all'area inventario</a>







<br>
<a href="logout.php">Logout</a>

</html>