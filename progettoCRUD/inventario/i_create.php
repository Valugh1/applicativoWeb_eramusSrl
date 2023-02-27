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

    <h1>Creazione indice prodotto</h1>

    <div class="contenitore crea">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    <div class="card cardbox">
                        <div class="card-header">Nuovo prodotto</div>
                        <div class="card-body">

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
                            </div>


                            <!-- Submit -->
                            <div class="form-group">
                                <button type="submit" value="1" class="btn btn-block btn-primary" name="submit">Crea utente</button>
                            </div>

                            </form>
                        </div>

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
        $sql = "INSERT INTO inventario (nome_prodotto, descrizione, data_inserimento, tipo_prodotto)
        VALUES ('$prod_name', '$descrizione', NOW(), '$materiali')";
        if (mysqli_query($conn, $sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>

</body>

</html>