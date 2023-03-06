    <?php
    session_start();
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <?php include("../header.php"); ?>
        <!--<link rel="stylesheet" href="../style/i_read.css">-->
        <style>
            #buttonContainer {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 30vh;
                width: 100%;
            }

            .bottone {
                margin: 0 10px;
            }

            #buttonContainerChild {
                display: flex;
                flex-direction: row;
                gap: 20px;
            }

            .search {
                text-align: center;
                margin-top: 60px;
                margin-bottom: 40px;
            }

            .tableDiv {
                width: 90%;
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                justify-items: center;
                align-items: center;
            }
        </style>
        <title>Trova prodotto</title>
    </head>

    <body>
        <!-- navbar -->
        <?php include("../navbar.php"); ?>

        <!-- ricerca prodotti-->
        <div class="search">
            <h2>Ricerca prodotti</h2>
            <form action="" class="form_group form_groupRead" method="post" style="display: inline-block">
                <input type="text" name="search" placeholder="inserisci la parola chiave" style="vertical-align: middle;">
                <button name="submit" class="btn btn-secondary btn-sm" style="vertical-align: middle">Cerca</button>
            </form>
        </div>

        <!-- tabella risultati-->
        <div class="tableDiv">
            <table class="table">
                <?php
                include_once("../session/config.php");

                //controllo ricerca
                if (isset($_POST['submit'])) {

                    $search = "%" . $_POST['search'] . "%";
                    //seleziona tutti i campi compreso il tipo di prodotto.
                    $sql = "SELECT inventario.*, tipo_prodotto.tipo 
                    FROM inventario 
                    INNER JOIN tipo_prodotto 
                    ON inventario.tipo_prodotto = tipo_prodotto.id 
                    WHERE id_inventario LIKE ?
                    OR nome_prodotto LIKE ? 
                    OR descrizione LIKE ? 
                    OR data_inserimento LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ssss', $search, $search, $search, $search);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        //creo struttura iniziale
                        echo '<thead>
                        
                <tr style="background: #81B0F3">
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
                            echo "<tr style='background: #d5e3f5'>";
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
                        // echo "Nessun valore trovato";
                        echo ("Nessun valore trovato");
                    }
                }
                ?>
            </table>
        </div>

        <br>


        <!-- bottoni per elementi categorie -->

        <div id="buttonContainer">
            <h2>Ricerca per tipo prodotto.</h2>
            <div id="buttonContainerChild">
                <button class="btn btn-secondary btn-sm mt-3 bottone" onclick="showCarta()">Lista prodotti categoria 'CARTA'</button>
                <button class="btn btn-secondary btn-sm mt-3 bottone" onclick="showBuste()">Lista prodotti categoria 'BUSTE'</button>
                <button class="btn btn-secondary btn-sm mt-3 bottone" onclick="showToner()">Lista prodotti categoria 'TONER'</button>
            </div>
        </div>




        <!-- span per le tabelle -->
        <!-- tabella carta -->

        <span id="tableCarta" style="display:none">
            <?php
            include("selectCarta.php");
            ?>
        </span>
        <!-- tabella buste -->
        <span id="tableBuste" style="display:none">
            <?php
            include("selectBuste.php");
            ?>
        </span>
        <!-- tabella toner -->
        <span id="tableToner" style="display:none">
            <?php
            include("selectToner.php");
            ?>
        </span>
        </div>
        <script src="../script/productTypeShower.js"></script>

        <?php
        $conn->close();
        ?>


        <!-- footer -->
        <?php include("../footer.php"); ?>
    </body>

    </html>