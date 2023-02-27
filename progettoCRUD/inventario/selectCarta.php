<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        WHERE `tipo` = 'carta'
    )";

    $result1 = mysqli_query($conn, $sql);


    if ($result1->num_rows > 0) {
        //creo struttura iniziale
        echo '<table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome del prodotto</th>
                    <th>Descrizione</th>
                    <th>Data di inserimento</th>
                </tr>
                    </thead>';
        // output data di ogni riga
        while ($row = $result1->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td id='id_inventario'>" . $row["id_inventario"] . "</td>";
            echo "<td id='nome_prodotto'>" . $row["nome_prodotto"] . "</td>";
            echo "<td id='descrizione'>" . $row["descrizione"] . "</td>";
            echo "<td id='data_inserimento'>" . $row["data_inserimento"] . " <a href='update.php?id="  . $row["id_inventario"] . "'>Edit</a>  <a href='delete.php?id="  . $row["id_inventario"] . "'>Delete</a></td>";
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