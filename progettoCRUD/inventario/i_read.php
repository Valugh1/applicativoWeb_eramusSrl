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
        <style>
            table,
            th,
            td {
                border: 1px solid;
            }


            .item>button {
                margin: 10px 0 10px 0;

            }

            .form_group>input {
                background-color: #f5f9fa;
            }

            /*
            .container {

                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }
*/
            /*
            .item {
                width: 100%;
                margin-bottom: 1em;
                justify-items: end;
            }

            .search-container {
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 20px;
            }

            .search {
                margin-bottom: 20px;
            }*/
        </style>
        <script>
            function showCarta() {
                let displayCarta = document.getElementById("tableCarta");
                if (displayCarta.style.display == "block") {
                    displayCarta.style.display = "none";
                } else {
                    displayCarta.style.display = "block";
                }
            }

            function showBuste() {
                let displayBuste = document.getElementById("tableBuste");
                if (displayBuste.style.display == "block") {
                    displayBuste.style.display = "none";
                } else {
                    displayBuste.style.display = "block";
                }
            }

            function showToner() {
                let displayToner = document.getElementById("tableToner");
                if (displayToner.style.display == "block") {
                    displayToner.style.display = "none";
                } else {
                    displayToner.style.display = "block";
                }
            }
        </script>
    </head>

    <body>
        <?php
        include("../navbar.php");
        ?>


        <!-- creazione nuovo prodotto-->
        <button class="btn btn-primary btn-sm" onclick="location.href='i_create.php'">Aggiungi nuovo prodotto</button>
        <!-- ricerca prodotti-->
        <div class="search">
            <h1>Ricerca prodotti</h1>
            <form action="" class="form_group" method="post">
                <input type="text" name="search" placeholder="inserisci la parola chiave">
                <button name="submit" class="btn btn-primary btn-sm">Cerca</button>
            </form>
        </div>



        <!-- tabella risultati-->

        <table class="table">



            <?php
            include_once("../session/config.php");

            //controllo ricerca
            if (isset($_POST['submit'])) {

                $search = $_POST['search'];
                //seleziona tutti i campi compreso il tipo di prodotto.
                $sqlQuery = "SELECT inventario.*, tipo_prodotto.tipo 
                            FROM inventario 
                            INNER JOIN tipo_prodotto 
                            ON inventario.tipo_prodotto = tipo_prodotto.id 
                            WHERE id_inventario like '%$search%' 
                            OR nome_prodotto like '%$search%' 
                            OR descrizione like '%$search%' 
                            OR data_inserimento like '%$search%'";

                $result = mysqli_query($conn, $sqlQuery);



                if ($result->num_rows > 0) {
                    //creo struttura iniziale
                    echo '<thead class="thead-light" >
                <tr >
                    <th scope="row">Id</th>
                    <th scope="row">Nome del prodotto</th>
                    <th scope="row">Descrizione</th>
                    <th scope="row">Data di inserimento</th>
                    <th scope="row">Tipo prodotto</th>
                    <th scope="row">Azioni</th>
                </tr>
                    </thead>';
                    // output data di ogni riga
                    while ($row = $result->fetch_assoc()) {
                        echo "<tbody>";
                        echo "<tr style='background: #f7f9fa'>";
                        echo "<td id='id_inventario'>" . $row["id_inventario"] . "</td>";
                        echo "<td id='nome_prodotto'>" . $row["nome_prodotto"] . "</td>";
                        echo "<td id='descrizione'>" . $row["descrizione"] . "</td>";
                        echo "<td id='data_inserimento'>" . $row["data_inserimento"] . "</td>";
                        echo "<td id='tipo_prodotto'>" . $row["tipo"] . "</td>";
                        echo "<td><button class='btn btn-secondary btn-sm' style='margin-bottom:2px;' onclick=\"location.href='i_update.php?id_inventario=" . $row["id_inventario"] . "'\">Edit</button> <a href='i_delete.php?id_inventario=" . $row["id_inventario"] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                        echo "</tr>";
                        echo "</tbody>";
                    }
                } else {
                    echo "Nessun valore trovato";
                }
            }


            ?>
        </table>









        <br>


        <!-- visualizzazione elementi "carta" -->
        <!--<div class="container">-->
        <div class="item">
            <button class="btn btn-primary btn-sm" onclick="showCarta()">Lista prodotti categoria 'CARTA'</button>

            <span id="tableCarta" style="display:none">
                <?php
                include("selectCarta.php");
                ?>
            </span>
        </div>
        <!-- visualizzazione elementi "carta" -->

        <div class="item">
            <button class="btn btn-primary btn-sm" onclick="showBuste()">Lista prodotti categoria 'BUSTE'</button>
            <span id="tableBuste" style="display:none">
                <?php
                include("selectBuste.php");
                ?>
            </span>
            <!-- visualizzazione elementi "carta" -->
        </div>
        <div class="item">
            <button class="btn btn-primary btn-sm" onclick="showToner()">Lista prodotti categoria 'TONER'</button>
            <span id="tableToner" style="display:none">
                <?php
                include("selectToner.php");
                ?>
            </span>
        </div>
        </div>
        <?php
        $conn->close();
        ?>

    </body>

    </html>