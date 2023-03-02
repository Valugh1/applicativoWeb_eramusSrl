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
        <title>Elimina prodotto</title>
    </head>

    <body>
        <!-- navbar -->
        <?php include("../navbar.php"); ?>

        <!-- form conferma eliminazione -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card cardbox">
                        <div class="card-header form_header">Elimina prodotto</div>
                        <div class="card-body  form_color">
                            <div class="form-group">
                                <form action="" method="GET" id="login-nav" role="form" class="form">

                                    <?php
                                    include_once("../session/config.php");

                                    if ($_GET['id_inventario'] && !isset($_GET['conferma'])) {
                                        //Fase 1
                                        $id = $_GET['id_inventario'];

                                        $sqlQuery = "SELECT * FROM inventario WHERE id_inventario='$id'";
                                        $result = mysqli_query($conn, $sqlQuery);

                                        if ($result->num_rows == 1) {
                                            // output data of each row --- $row["id"]
                                            $row = $result->fetch_assoc();
                                            echo "<div class='form-group'>";
                                            echo "<label for='id_inventario'>Id prodotto:</label><br>";
                                            echo "<span  name='nome_prodotto' style='font-weight: bold'>" . $row["id_inventario"] .  "</span></div>";

                                            echo "<label for='nome_prodotto'>Nome prodotto:</label><br>";
                                            echo "<span  name='nome_prodotto' style='font-weight: bold'>" . $row["nome_prodotto"] .  "</span></div>";

                                            echo "Sei sicuro di eliminare questo prodotto?<br>";
                                            echo "<input type='hidden' name='conferma' value='Elimina'>";
                                            echo "<button class='btn btn-danger' type='submit' value=''>Si</button>";
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
                            </div>
                        </div>
                    </div>
                </div><!-- bottone "indietro" -->
                <button class="btn btn-secondary" style="margin-top:20px" onclick=' location.href="i_read.php"'>Indietro</button>
            </div>

            <!-- footer -->
            <?php include("../footer.php"); ?>
    </body>

    </html>