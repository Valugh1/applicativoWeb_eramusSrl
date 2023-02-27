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

    <h1>CREATE</h1>

    <div class="contenitore crea">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-5">

                    <div class="card cardbox">
                        <div class="card-header">Registrazione</div>
                        <div class="card-body">

                            <div class="form-group">
                                <form action="" method="POST" id="login-nav" role="form" class="form">

                                    <!--Username-->
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" id="username" name="username" class="form-control" value="" placeholder="Username" required>
                                    </div>

                                    <!-- Nome -->
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" id="nome" name="nome" class="form-control" value="" placeholder="Nome" required>
                                    </div>

                                    <!-- Cognome -->
                                    <div class="form-group">
                                        <label for="cognome">Cognome</label>
                                        <input type="text" name="cognome" class="form-control" value="" placeholder="Cognome" required>
                                    </div>

                                    <!-- Data di nascita-->
                                    <div class="form-group">
                                        <label for="dob">Data di nascita:</label>
                                        <input type="date" id="dob" name="dob" class="form-control" value="" placeholder="Data di nascita" required>
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
                                        <button type="submit" value="1" id="reg_submit" class="btn btn-block btn-primary" disabled="disabled" name="submit">Crea utente</button>
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
    </div>








    <?php
    include_once("../session/config.php");



    //identificazione variabili
    if (isset($_POST['username'])) {
        $username =  $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $nome = $conn->real_escape_string($_POST['nome']);
        $cognome = $conn->real_escape_string($_POST['cognome']);
        $dob = $conn->real_escape_string($_POST['dob']);

        // query creazione utente
        $sql = "INSERT INTO utenti (username, password, nome, cognome, dob)
    VALUES ('$username','$password' , '$nome' , '$cognome' , '$dob')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>

    <script src="../script/script.js"></script>
</body>

</html>