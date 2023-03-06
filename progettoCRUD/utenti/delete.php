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
        <title>Elimina utente</title>
    </head>

    <body>
        <!-- navbar -->
        <?php include("../navbar.php"); ?>

        <!-- eliminazione utente -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card cardbox">
                        <div class="card-header form_header">Elimina prodotto</div>
                        <div class="card-body  form_color">
                            <div class="form-group">
                                <form action="" method="GET">

                                    <?php
                                    include_once("../session/config.php");

                                    if ($_GET['id'] && !isset($_GET['conferma'])) {
                                        // FASE 1
                                        $id = $_GET['id'];
                                        $sql = "SELECT * FROM utenti WHERE id=?";

                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param('i', $id);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if ($result->num_rows == 1) {
                                            // output data of each row --- $row["id"]
                                            $row = $result->fetch_assoc();
                                            echo "<div class='form-group'>";
                                            echo "<label for='id'>Id utente:</label><br>";
                                            echo "<span  name='id' style='font-weight: bold'>" . $row["id"] .  "</span></div>";
                                            echo "<label for='username'>Username:</label><br>";
                                            echo "<span  name='username' style='font-weight: bold'>" . $row["username"] .  "</span></div>";
                                            echo "Sei sicuro di eliminare questo utente?<br>";
                                            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                                            echo "<input type='hidden' name='conferma' value='y'>";
                                            echo "<button class='btn btn-danger' type='submit' value=''>Si</button>";
                                        }
                                    } elseif ($_GET['id'] && $_GET['conferma'] == "y") {
                                        // FASE 2
                                        $id = $_GET['id'];
                                        $sqlDelete = "DELETE FROM utenti WHERE id=? ";
                                        $stmt = $conn->prepare($sqlDelete);
                                        $stmt->bind_param('i', $id);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        echo "Utente eliminato con successo!";
                                    } else {
                                        echo "Errore " . $stmt->error();
                                    }

                                    $conn->close();
                                    ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- bottone "indietro" -->
                <button class="btn btn-secondary" style="margin-top:20px" onclick=' location.href="read.php"'>Indietro</button>
            </div>
            <!-- footer -->
            <?php include("../footer.php"); ?>
    </body>

    </html>