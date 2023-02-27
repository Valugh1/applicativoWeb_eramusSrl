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

        <h1>UPDATE</h1>
        <p>CRUD base, update recrod.</p>

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
                    echo "<pre>";
                    print_r($row);
                    echo "</pre>";

                    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                    echo "<label for='username'>username:</label><br>";
                    echo "<input type='text' id='username' name='username' value='" . $row["username"] .  "'><br>";
                    echo "<label for='dob'>Data di nascita:</label><br>";
                    echo "<input type='text' id='dob' name='dob' value='" . $row["dob"] . "'><br>";
                    echo "<label for='nome'>Nome:</label><br>";
                    echo "<input type='text' id='nome' name='nome' value='" . $row["nome"] .  "'><br>";
                    echo "<label for='cognome'>Cognome:</label><br>";
                    echo "<input type='text' id='cognome' name='cognome' value='" . $row["cognome"] .  "'><br>";
                    echo "<input type='submit' value='AGGIORNA'>";
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


    </body>

    </html>