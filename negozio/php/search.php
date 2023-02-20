<?php
session_start();
require_once("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>search</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <input type="text" name="search" placeholder="inserisci la ricerca">
            <button name="submit" class="btn btn-dark btn-sm">Search</button>
        </form>
    </div>
    <div class="container my-5">
        <table class="table">
            <?php
            //manda a schermo i dati della riga
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $query = "SELECT * FROM `utenti` WHERE id='$search' OR username='$search' OR nome='$search' OR cognome='$search'";
                $result = mysqli_query($connessione, $query);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<thead>
                    <tr>
                    <th> id no^</th>
                    <th>Username</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di nascita</th>
                    </tr>
                    </thead>';
                        $row = mysqli_fetch_row($result);
                        echo '<tbody>
                    <tr>
                        <td>' . $row['0'] . '</td>
                        <td>' . $row['1'] . '</td>
                        <td>' . $row['3'] . '</td>
                        <td>' . $row['4'] . '</td>
                        <td>' . $row['5'] . '</td>
                        <td><button>edit</button></td>
                    </tr>
                    </tbody>
                    ';
                    } else {
                        echo '<p class="text-danger">data not found</p>';
                    }
                }
            }

            ?>


        </table>
    </div>
</body>

</html>