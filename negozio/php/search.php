<?php
session_start();
require_once("config.php");
include("crud.php");

use database_crud\crud;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../register/style.css">

    <style>
        .contenitore {
            display: none;
        }
    </style>
    <title>search</title>
</head>

<body>

    <!--ricerca utente-->
    <div class="search">
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

                // $search = $_POST['search'];
                $crud = crud::read($_POST['search']);
                //  $query = "SELECT * FROM `utenti` WHERE id like '%$search%' OR username like '%$search%' OR nome like '%$search%' OR cognome like '%$search%'";

                //$result = mysqli_query($connessione, $query);
                if ($crud == true) {
                    if (/*mysqli_num_rows($crud) > 0*/$crud->num_rows > 0) {
                        echo '<thead>
                    <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di nascita</th>
                    </tr>
                    </thead>';
                        while ($row = /*mysqli_fetch_assoc($result)*/ $crud->fetch_assoc()) {
                            $id = $row["id"];
                            echo '<tbody>
                    <tr>
                        <td class="td td-id">' . $id . '</td>
                        <td class="td td-username">' . $row['username'] . '</td>
                        <td class="td td-nome">' . $row['nome'] . '</td>
                        <td class="td td-cognome">' . $row['cognome'] . '</td>
                        <td class="td td-dob">' . $row['data_di_nascita'] . '</td>
                        <td><button id="modifica" class="modificaAll">modifica</button><button id="elimina">Elimina</td>
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





    <!-- creazione nuovo utente-->
    <h1>crea utente</h1><br>
    <button id="crea">crea utente</button><br>
    <div class="contenitore crea">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-5">

                    <div class="card cardbox">
                        <div class="card-header">Registrazione</div>
                        <div class="card-body">

                            <div class="form-group">

                                <form action="../../negozio/php/register.php" id="login-nav" method="post" role="form" class="form" accept-charset="UTF-8">
                                    <!-- nome -->
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" name="nome" class="form-control" value="" placeholder="Nome" required>
                                    </div>

                                    <!-- cognome -->
                                    <div class="form-group">
                                        <label for="cognome">Cognome</label>
                                        <input type="text" name="cognome" class="form-control" value="" placeholder="Cognome" required>
                                    </div>

                                    <!-- username -->
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" value="" placeholder="Username" required>
                                    </div>

                                    <!-- password group -->
                                    <div class="form-group">

                                        <!-- password label -->
                                        <label class="sr-only">Password</label>
                                        <!-- password input -->
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control" data-placement="bottom" data-toggle="popover" data-container="body" data-html="true" value="" placeholder="Password" required>

                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-append1" onclick="togglePassword()">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- password progresbar -->
                                        <div class="progress mt-1" id="reg-password-strength">
                                            <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                            </div>
                                        </div>

                                        <!-- Password Rules -->
                                        <div id="reg_passwordrules" class="hide password-rule mt-2"><small>

                                                <ul class="list-unstyled">
                                                    <li class="">
                                                        <span class="eight-character"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                                        &nbsp; min 8 caratteri
                                                    </li>
                                                    <li class="">
                                                        <span class="low-upper-case"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                                        &nbsp; min 1 carattere maiuscolo & 1 carattere minuscolo
                                                    </li>
                                                    <li class="">
                                                        <span class="one-number"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                                        &nbsp; min 1 numero
                                                    </li>
                                                    <li class="">
                                                        <span class="one-special-char"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                                                        &nbsp; min 1 carattere speciale (!@#$%^&*)
                                                    </li>
                                                </ul>
                                            </small></div>

                                    </div>

                                    <!-- conferma password group -->
                                    <div class="form-group">

                                        <!-- conferma password label -->
                                        <label class="sr-only">Conferma Password</label>
                                        <!-- conferma password input -->
                                        <div class="input-group">
                                            <input type="password" id="passwordconfirm" class="form-control" data-placement="bottom" data-toggle="popover" data-container="body" data-html="true" placeholder="Conferma Password" required>

                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-append2" onclick="togglePasswordConfirm()">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </div>

                                        </div>
                                        <!-- conferma password error message -->
                                        <div class="help-block text-right">
                                            <small><span id="error-confirmpassword" class="hide pull-right block-help">
                                                    <i class="fa fa-info-circle text-danger" aria-hidden="true"></i>La
                                                    password non corrisponde</span></small>
                                        </div>

                                    </div>



                                    <!-- Submit -->
                                    <div class="form-group">
                                        <button id="reg_submit" name="submit" value="1" class="btn btn-block btn-primary" disabled="disabled">Crea utente</button>
                                        <div id="sign-up-popover" class="hide">
                                            <p>vuoto</p>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br>









        <script src="../script/crud.js"></script>





































        <?php
        /*
    // aggiungi il form di modifica
    ob_start();
    include("../formModifica.php");
    $content = ob_get_clean();

    //manda a schermo i dati della riga
    if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM `utenti` WHERE id like '%$search%' OR username like '%$search%' OR nome like '%$search%' OR cognome like '%$search%'";

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
                while ($row = mysqli_fetch_row($result)) {

                    echo '<tbody>
                <tr>
                <td>' . $row['0'] . '</td>
                <td>' . $row['1'] . '</td>
                <td>' . $row['3'] . '</td>
                <td>' . $row['4'] . '</td>
                <td>' . $row['5'] . '</td>
                <td><button id="edit-' . $row['0'] . ' class="edit-button">edit</button></td>
                </tr>
                </tbody>';
                    echo str_replace('{id}', $row['0'], $content); // stampa il form di modifica sostituendo l'id corrente
                }
            } else {
                echo '<p class="text-danger">data not found</p>';
            }
        }
    }
*/
        ?>
        <script>
            /*
        // seleziona tutti i bottoni "edit" e aggiungi un event listener per ascoltare l'evento di click
        var editButtons = document.querySelectorAll('.edit-button');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // seleziona la riga della tabella corrispondente al bottone cliccato
                var row = button.parentNode.parentNode;
                // seleziona l'ID dell'elemento corrente
                var id = button.getAttribute('id').split('-')[1];
                // mostra il form di modifica corrispondente
                showForm(id);
            });
        });

        // funzione per mostrare il form di modifica corrispondente all'ID passato come parametro
        function showForm(id) {
            // nasconde tutti i form di modifica
            hideForms();
            // seleziona il form di modifica corrispondente all'ID passato come parametro
            var form = document.getElementById('form-' + id);
            // mostra il form
            form.style.display = "block";
        }

        // funzione per nascondere tutti i form di modifica
        function hideForms() {
            var allForms = document.querySelectorAll('.modifica-form');
            allForms.forEach(function(form) {
                form.style.display = "none";
            });
        }
    */
        </script>
        <!-- scrpt del form -->
        <script src="../script/script1.js"></script>
</body>

</html>