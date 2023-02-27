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
        <style>
            table,
            th,
            td {
                border: 1px solid;
            }
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
        <a href="i_create.php">Aggiungi nuovo prodotto</a><br>
        <h1>Ricerca prodotti</h1><br>



        <!-- form ricerca -->
        <div class="search">
            <form action="" method="post">
                <input type="text" name="search" placeholder="inserisci la parola chiave">
                <button name="submit" class="btn btn-dark btn-sm">Cerca</button>
            </form>
        </div>

        <!-- tabella risultati-->
        <table>



            <?php
            include_once("../session/config.php");

            //controllo ricerca
            if (isset($_POST['submit'])) {

                $search = $_POST['search'];
                //seleziona tutti i campi compreso il tipo di prodotto ma solo se scritto per esteso
                $sqlQuery = "SELECT * FROM `inventario` 
                    WHERE id_inventario like '%$search%' 
                    OR nome_prodotto like '%$search%' 
                    OR descrizione like '%$search%' 
                    OR data_inserimento like '%$search%' 
                    OR tipo_prodotto like '%$search%'";

                $result = mysqli_query($conn, $sqlQuery);



                if ($result->num_rows > 0) {
                    //creo struttura iniziale
                    echo '<thead>
                <tr>
                    <th>Id</th>
                    <th>Nome del prodotto</th>
                    <th>Descrizione</th>
                    <th>Data di inserimento</th>
                    <th>Azioni: </th>
                </tr>
                    </thead>';
                    // output data di ogni riga
                    while ($row = $result->fetch_assoc()) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td id='id_inventario'>" . $row["id_inventario"] . "</td>";
                        echo "<td id='nome_prodotto'>" . $row["nome_prodotto"] . "</td>";
                        echo "<td id='descrizione'>" . $row["descrizione"] . "</td>";
                        echo "<td id='data_inserimento'>" . $row["data_inserimento"] . "</td>";
                        echo "<td> <a href='i_update.php?id_inventario="  . $row["id_inventario"] . "'>Edit</a>  <a href='i_delete.php?id_inventario="  . $row["id_inventario"] . "'>Delete</a></td>";
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
        <button onclick="showCarta()">Lista prodotti categoria "CARTA"</button>
        <span id="tableCarta" style="display: none">
            <?php
            include("selectCarta.php");
            ?>
        </span>
        <br>


        <!-- visualizzazione elementi "buste" -->
        <button onclick="showBuste()">Lista prodotti categoria "BUSTE"</button>
        <span id="tableBuste" style="display: none">
            <?php
            include("selectBuste.php");
            ?>
        </span>
        <br>


        <!-- visualizzazione elementi "toner" -->
        <button onclick="showToner()">Lista prodotti categoria "TONER"</button>
        <span id="tableToner" style="display: none">
            <?php
            include("selectToner.php");
            ?>
        </span>

        <?php
        $conn->close();
        ?>

    </body>

    </html>