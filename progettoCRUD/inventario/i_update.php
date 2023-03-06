    <?php
    session_start()
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <?php include("../header.php"); ?>
        <link rel="stylesheet" href="../style/form.css">
        <style>
            .container {
                text-align: center;
                text-align: center;
                margin: 0 auto;
            }
        </style>
        <title>Modifica prodotto</title>
    </head>

    <body>
        <!-- navbar -->
        <?php include("../navbar.php"); ?>

        <!-- form modifica prodotto -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card cardbox">
                        <div class="card-header form_header">Modifica prodotto</div>
                        <div class="card-body  form_color">
                            <div class="form-group">
                                <form action="" method="GET">




                                    <?php
                                    include_once("../session/config.php");


                                    if ($_GET['id_inventario'] && !isset($_GET['nome_prodotto'])) {
                                        // FASE 1
                                        $id = $_GET['id_inventario'];
                                        $sql = "SELECT * FROM inventario WHERE id_inventario= ?";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param('i', $id);
                                        $stmt->execute();
                                        $result = $stmt->get_result();


                                        if ($result->num_rows == 1) {
                                            // output prodotti
                                            $row = $result->fetch_assoc();

                                            echo "<div class='form-group'>";
                                            echo "<input type='hidden' name='id_inventario' value='" . $row["id_inventario"] . "'></div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='nome_prodotto'>Nome prodotto:</label><br>";
                                            echo "<input type='text' id='nome_prodotto' name='nome_prodotto' value='" . $row["nome_prodotto"] .  "'></div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='dob'>Descrizione:</label><br>";
                                            echo "<input type='text' id='descrizione' name='descrizione' value='" . $row["descrizione"] . "'></div>";
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

                                            echo "<button class='btn btn-success' type='hidden' value=''>Aggiorna</button>";
                                        }
                                    } elseif ($_GET['id_inventario'] && $_GET['nome_prodotto']) {
                                        // FASE 2

                                        $id = $_GET['id_inventario'];
                                        $nome_prodotto = $_GET['nome_prodotto'];
                                        $descrizione = $_GET['descrizione'];
                                        $tipo_prodotto = $_GET['materiali'];

                                        $sql = "UPDATE inventario SET nome_prodotto= ?, descrizione= ?, tipo_prodotto= ? WHERE id_inventario= ?";

                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param('sssi', $nome_prodotto, $descrizione, $tipo_prodotto, $id);
                                        $stmt->execute();
                                        if ($stmt->execute()) {
                                            echo "Prodotto aggiornato!";
                                        } else {
                                            $errorInfo = $conn->error;
                                            echo "Errore SQL: " . $errorInfo[2];
                                        }
                                    }
                                    $conn->close();
                                    ?>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- bottone "indietro" -->
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <button class="btn btn-secondary" onclick=' location.href="i_read.php"'>Indietro</button>
                    </div>
                </div>
                <!-- footer -->
                <?php include("../footer.php"); ?>
    </body>

    </html>