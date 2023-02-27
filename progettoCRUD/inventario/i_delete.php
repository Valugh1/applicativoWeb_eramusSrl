    <?php
    session_start()
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

        <link rel="stylesheet" href="../style/style.css">
    </head>

    <body>

        <h1>Elimina prodotto</h1>
        <!-- form conferma eliminazione -->
        <form action="" method="GET">

            <?php
            include_once("../session/config.php");

            if ($_GET['id_inventario'] && !isset($_GET['conferma'])) {
                //Fase 1
                $id = $_GET['id_inventario'];
                echo $id;
                $sqlQuery = "SELECT * FROM inventario WHERE id_inventario='$id'";
                $result = mysqli_query($conn, $sqlQuery);

                if ($result->num_rows == 1) {
                    // output data of each row --- $row["id"]
                    $row = $result->fetch_assoc();
                    echo "Id: " . $row["id_inventario"] . "<br>";
                    echo "<input type='hidden' name='id_inventario' value='" . $row["id_inventario"] . "'>";
                    echo "Username:" . $row["nome_prodotto"] .  "<br>";
                    echo "Sei sicuro di eliminare questo prodotto?<br>";
                    echo "<input type='hidden' name='conferma' value='SI'>";
                    echo "<input type='submit' value='SI'>";
                }
            } elseif ($_GET['id_inventario'] && $_GET['conferma']) {
                // Fase 2
                $id = $_GET['id_inventario'];
                $sqlDelete = "DELETE FROM inventario WHERE id_inventario='$id' ";
                if (mysqli_query($conn, $sqlDelete) === TRUE) {
                    echo "Record eliminato";
                } else {
                    echo "Errore nella query di eliminazione: " . $sqlDelete . "<br>" . $conn->error;
                }
            }
            $conn->close();
            ?>

        </form>


    </body>

    </html>