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

        <h1>UPDATE</h1>
        <p>CRUD base, update recrod.</p>

        <form action="" method="GET">




            <?php
            include_once("../session/config.php");


            if ($_GET['id_inventario'] && !isset($_GET['nome_prodotto'])) {
                // FASE 1
                $id = $_GET['id_inventario'];
                $sqlQuery = "SELECT * FROM inventario WHERE id_inventario='$id'";
                $result = mysqli_query($conn, $sqlQuery);

                if ($result->num_rows == 1) {
                    // output prodotti
                    $row = $result->fetch_assoc();


                    echo "<input type='hidden' name='id_inventario' value='" . $row["id_inventario"] . "'>";
                    echo "<label for='nome_prodotto'>Nome prodotto:</label><br>";
                    echo "<input type='text' id='nome_prodotto' name='nome_prodotto' value='" . $row["nome_prodotto"] .  "'><br>";
                    echo "<label for='dob'>Descrizione:</label><br>";
                    echo "<input type='text' id='descrizione' name='descrizione' value='" . $row["descrizione"] . "'><br>";
                    echo "<label for='nome'>Tipo prodotto:</label><br>";
                    echo '<div class="form-check">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <input class="form-check-input" type="radio" name="materiali" value="1" id="flexRadioDefault1">Carta
                                        </label>
                                    </div>
                                    <div class="form-check">

                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <input class="form-check-input" type="radio" name="materiali" value="2" id="flexRadioDefault2">Busta
                                        </label>
                                    </div>
                                    <div class="form-check">

                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <input class="form-check-input" type="radio" name="materiali" value="3" id="flexRadioDefault2">Toner
                                        </label>
                                    </div>';

                    echo "<input type='submit' value='Aggiorna'>";
                }
            } elseif ($_GET['id_inventario'] && $_GET['nome_prodotto']) {
                // FASE 2

                $id = $_GET['id_inventario'];
                $nome_prodotto = $_GET['nome_prodotto'];
                $descrizione = $_GET['descrizione'];
                $tipo_prodotto = $_GET['materiali'];

                $sql = "UPDATE inventario SET nome_prodotto='$nome_prodotto', descrizione='$descrizione', data_inserimento = NOW(), tipo_prodotto='$tipo_prodotto' WHERE id_inventario='$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record aggiornato";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            $conn->close();
            ?>

        </form>


    </body>

    </html>