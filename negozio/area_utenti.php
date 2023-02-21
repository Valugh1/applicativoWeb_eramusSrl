<?php
session_start();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>area utenti</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <style>
        .container {
            display: none;
        }
    </style>
</head>

<body>

    <h1>crea utente</h1><br>
    <button id="crea">crea utente</button><br>
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
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="login-or">
                            <hr class="hr-or">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <button onclick="window.location.href = 'php/search.php';">modifica utente</button>












    <ul>
        <li>pulsante inserimento nuovo utente che rimanda a registrazione</li>
        <li>
            <ul>
                <li>pulsante cerca che richiama utenti dal db in base alla ricerca effettuata</li>
                <li>pulsante crea che richiama il form registrazione</li>
                <li>pulsante elimina</li>
            </ul>
        </li>
    </ul>
    <script src="script/creaUtente.js"></script>
</body>

</html>