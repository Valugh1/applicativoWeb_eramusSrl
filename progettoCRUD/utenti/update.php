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
        <title>Aggiorna utente</title>
    </head>

    <body>
        <!-- navbar -->
        <?php include("../navbar.php"); ?>
        <h1>Modifica utente</h1>
        <!-- form modifica utente -->
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


                                    if ($_GET['id'] && !isset($_GET['username'])) {
                                        // FASE 1
                                        $id = $_GET['id'];
                                        $sql = "SELECT * FROM utenti WHERE id='$id'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows == 1) {
                                            // output data of each row --- $row["id"]
                                            $row = $result->fetch_assoc();

                                            echo "<div class='form-group'>";
                                            echo "<input type='hidden' name='id' value='" . $row["id"] . "'></div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='username'>username:</label><br>";
                                            echo "<input type='text' id='username' name='username' value='" . $row["username"] .  "'></div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='dob'>Data di nascita:</label><br>";
                                            echo "<input type='text' id='dob' name='dob' value='" . $row["dob"] . "'></div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='nome'>Nome:</label><br>";
                                            echo "<input type='text' id='nome' name='nome' value='" . $row["nome"] .  "'><div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='cognome'>Cognome:</label><br>";
                                            echo "<input type='text' id='cognome' name='cognome' value='" . $row["cognome"] .  "'></div>";
                                            echo "<button class='btn btn-success' type='hidden' value=''>Aggiorna</button>";
                                        }
                                    } elseif ($_GET['id'] && $_GET['username']) {
                                        // FASE 2

                                        $id = $_GET['id'];
                                        $username = $_GET['username'];
                                        $dob = $_GET['dob'];

                                        $sql = "UPDATE utenti SET username='$username', dob='$dob' WHERE id='$id'";
                                        if ($conn->query($sql) === TRUE) {
                                            echo "Record aggiornato";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }
                                    }
                                    $conn->close();
                                    ?>

                                </form>
                            </div>
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