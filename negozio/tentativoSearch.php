<?php
session_start();
require_once("php/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="register/style.css">


    <title>tentativo search</title>
</head>

<body>


    <div class="container modifica">
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
                $query = "SELECT * FROM `utenti` WHERE id like '%$search%' OR username like '%$search%' OR nome like '%$search%' OR cognome like '%$search%'";

                $result = mysqli_query($connessione, $query);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<thead>
                    <tr>
                    <th>id no^</th>
                    <th>Username</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di nascita</th>
                    </tr>
                    </thead>';
                        while ($row = mysqli_fetch_row($result)) {

                            echo '<tbody>
                    <tr>
                    <td><a href="searchData.php?data=' . $row['0'] . '">' . $row['0'] . '</a></td>
                        <td>' . $row['1'] . '</td>
                        <td>' . $row['3'] . '</td>
                        <td>' . $row['4'] . '</td>
                        <td>' . $row['5'] . '</td>
                        <td><button id="edit-' . $row['0'] . '">edit</button></td>
                    </tr>
                    </tbody>';
                        }
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