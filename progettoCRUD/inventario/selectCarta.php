<!DOCTYPE html>
<html lang="it">

<head>
    <?php include("../header.php"); ?>
    <!-- css tabelle -->
    <link rel="stylesheet" href="../style/tables.css">
    <title>Document</title>
</head>

<body>

    <div class="tableDiv">
        <?php
        include_once("../session/config.php");
        //seleziona tutti i campi appartenenti alla categoria carta


        $sql = "SELECT inventario.id_inventario, inventario.nome_prodotto, inventario.descrizione, inventario.data_inserimento, tipo_prodotto.tipo
        FROM inventario
        JOIN tipo_prodotto ON inventario.tipo_prodotto = tipo_prodotto.id
        WHERE tipo_prodotto.tipo = 'carta'";

        $result1 = mysqli_query($conn, $sql);


        if ($result1->num_rows > 0) {
            //creo struttura iniziale
            echo '<table class="table table-hover">
                <thead class="thead">
                <tr style="background: #81B0F3">
                    <th scope="col">ID</th>
                    <th scope="col">Nome del prodotto</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Data di inserimento</th>
                    <th scope="col">Tipo prodotto</th>
                    <th scope="col">Azioni</th>
                </tr>
                    </thead>';
            // output data di ogni riga
            while ($row = $result1->fetch_assoc()) {
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
            echo "</table>";
        } else {
            echo "Nessun valore trovato";
        }

        ?>
    </div>

</body>

</html>