<?php
session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("../header.php"); ?>
    <link rel="stylesheet" href="../style/form.css">
    <title>Crea prodotto</title>
</head>

<body>
    <!-- navbar -->
    <?php include("../navbar.php"); ?>

    <!-- creazione indice prodotto -->
    <h1 style="text-align:center">Creazione indice prodotto</h1>

    <div class="container" style="position: absolute; left:10%">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
                <div class="card cardbox">
                    <div class="card-header form_header">Nuovo prodotto</div>
                    <div class="card-body  form_color">
                        <div class="form-group">
                            <form action="" method="POST" id="login-nav" role="form" class="form">

                                <!--Nome Prodotto-->
                                <div class="form-group">
                                    <label for="prod_name">Nome Prodotto:</label>
                                    <input type="text" id="prod_name" name="prod_name" class="form-control" value="" placeholder="Nome Prodotto" required>
                                </div>

                                <!-- Descrizione -->
                                <div class="form-group">
                                    <label for="descrizione">Descrizione prodotto:</label>
                                    <textarea rows="5" id="descrizione" name="descrizione" class="form-control" value="" placeholder="Aggiungi una descrizione del prodotto." required></textarea>
                                </div>

                                <!-- Tipo prodotto -->

                                <p>Scegli un tipo di prodotto: </p>

                                <div class="form-check">

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
                                </div>

                                <!-- Submit -->
                                <div class="form-group">
                                    <button type="submit" value="1" class="btn btn-block btn-primary" name="submit">Aggiungi prodotto</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>











    <?php
    include_once("../session/config.php");



    //identificazione variabili
    if (isset($_POST['prod_name'])) {

        $prod_name =  $conn->real_escape_string($_POST['prod_name']);
        $descrizione = $conn->real_escape_string($_POST['descrizione']);
        $materiali = $_POST["materiali"];

        // query creazione prodotto
        $sql = "INSERT INTO inventario (nome_prodotto, descrizione, tipo_prodotto)
        VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $prod_name, $descrizione, $materiali);
        $stmt->execute();
        /*
        if (mysqli_query($conn, $sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        */
    }

    $conn->close();
    ?>
    <!-- footer -->
    <?php include("../footer.php"); ?>
</body>

</html>