<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Toner</title>
</head>

<body>


    <?php
    include_once("../session/config.php");
    //seleziona tutti i campi appartenenti alla categoria carta


    $sql = "SELECT * 
    FROM `inventario` 
    WHERE `tipo_prodotto` IN (
        SELECT `id` 
        FROM `tipo_prodotto` 
        WHERE `tipo` = 'toner'
    )";

    $result1 = mysqli_query($conn, $sql);


    if ($result1->num_rows > 0) {
        //creo struttura iniziale
        echo '<table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome del prodotto</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Data di inserimento</th>
                    <th scope="col">Azioni</th>
                </tr>
                    </thead>';
        // output data di ogni riga
        while ($row = $result1->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td id='id_inventario'>" . $row["id_inventario"] . "</td>";
            echo "<td id='nome_prodotto'>" . $row["nome_prodotto"] . "</td>";
            echo "<td id='descrizione'>" . $row["descrizione"] . "</td>";
            echo "<td id='data_inserimento'>" . $row["data_inserimento"] . "</td>";
            echo "<td><button class='btn btn-secondary btn-sm' style='margin-bottom:2px;' onclick=\"location.href='i_update.php?id_inventario=" . $row["id_inventario"] . "'\">Edit</button> <a href='i_delete.php?id_inventario=" . $row["id_inventario"] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    } else {
        echo "Nessun valore trovato";
    }




    ?>
</body>

</html>