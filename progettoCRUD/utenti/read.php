    <?php
    session_start()
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <?php include("../header.php"); ?>
        <style>
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
        <title>Trova utente</title>
    </head>

    <body>

        <!-- navbar -->
        <?php include("../navbar.php"); ?>

        <!-- form ricerca -->
        <div class="search">
            <h2>Ricerca utenti</h2>
            <form action="" method="post">
                <input type="text" name="search" class="form_group" placeholder="inserisci la parola chiave">
                <button name="submit" class="btn btn-secondary ">Search</button>
            </form>
        </div>

        <!-- tabella risultati-->
        <div class="tableDiv">
            <table class="table">
                <?php
                include_once("../session/config.php");

                //controllo e compiutazione ricerca
                if (isset($_POST['submit'])) {

                    $search = "%" . $_POST['search'] . "%";

                    $sql = "SELECT * FROM `utenti` 
                    WHERE id like ? 
                    OR username like ? 
                    OR nome like ? 
                    OR cognome like ?";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ssss', $search, $search, $search, $search);
                    $stmt->execute();
                    $result = $stmt->get_result();



                    if ($result->num_rows > 0) {
                        //creo struttura iniziale
                        echo '<thead>
                <tr style="background: #81B0F3">
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>NOME</th>
                    <th>COGNOME</th>
                    <th>DATA DI NASCITA</th>
                    <th>Azioni</th>
                </tr>
                    </thead>';
                        // output data di ogni riga
                        while ($row = $result->fetch_assoc()) {
                            echo "<tbody>";
                            echo "<tr style='background: #d5e3f5'>";
                            echo "<td id='id'>" . $row["id"] . "</td>";
                            echo "<td id='username'>" . $row["username"] . "</td>";
                            echo "<td id='nome'>" . $row["nome"] . "</td>";
                            echo "<td id='cognome'>" . $row["cognome"] . "</td>";
                            echo "<td id='dob'>" . $row["dob"] . "</td>";
                            echo "<td><button class='btn btn-secondary btn-sm' style='margin-bottom:2px;' onclick=\"location.href='update.php?id=" . $row["id"] . "'\">Edit</button> <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>";
                            echo "</tr>";
                            echo "</tbody>";
                        }
                    } else {
                        echo "Nessun valore trovato";
                    }
                }

                $conn->close();
                ?>
            </table>
        </div>

        <!-- footer -->
        <?php include("../footer.php"); ?>
    </body>

    </html>