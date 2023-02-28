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
        <button class="btn btn-dark btn-sm" onclick="location.href='create.php'">Aggiungi nuovo prodotto</button>
        <h1>Ricerca utenti</h1><br>



        <!-- form ricerca -->
        <div class="search">
            <form action="" method="post">
                <input type="text" name="search" placeholder="inserisci la parola chiave">
                <button name="submit" class="btn btn-dark btn-sm">Search</button>
            </form>


            <!-- tabella risultati-->
            <table class="table">



                <?php
                include_once("../session/config.php");

                //controllo e compiutazione ricerca
                if (isset($_POST['submit'])) {

                    $search = $_POST['search'];

                    $sqlQuery = "SELECT * FROM `utenti` WHERE id like '%$search%' OR username like '%$search%' OR nome like '%$search%' OR cognome like '%$search%'";

                    $result = mysqli_query($conn, $sqlQuery); // $conn->query($sqlQuery);



                    if ($result->num_rows > 0) {
                        //creo struttura iniziale
                        echo '<thead class="thead-light">
                <tr>
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
                            echo "<tbody >";
                            echo "<tr>";
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



    </body>

    </html>