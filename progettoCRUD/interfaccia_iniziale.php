<?php
session_start();
if (!isset($_SESSION['loggato']) || ($_SESSION['loggato']) !== true) {
    header("location: ../login_form.php");
    exit;
    echo $_SESSION['loggato'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <!-- min Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->


    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <style>
        body {
            padding: 0;
            margin: 0;
            background: rgb(217, 245, 254);
            background: linear-gradient(0deg, rgba(217, 245, 254, 1) 0%, rgba(244, 255, 255, 1) 100%);
            height: 200vh;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .riconoscimento {
            display: flex;
            justify-content: right;
            margin-top: 20px;
            margin-left: 50%;
        }

        .riconoscimento>span {
            margin-right: 100px;
            margin-left: 10px;
        }

        .riconoscimento>button {
            margin-right: 20px;
        }

        #welcome {
            display: inline-block;
            line-height: 200px;
            vertical-align: middle;
        }

        #navigazione {
            background-color: #81B0F3 !important;
        }
    </style>
    <title>Interfaccia principale</title>
</head>

<body>
    <!-- navbar -->
    <!-- messaggio benvenuto -->
    <nav id="navigazione" class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"><span>
                <?php
                echo "Benvenuto, " . $_SESSION['username'] . ".";
                ?>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- Home -->
                <li class="nav-item active">
                    <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- area utenti -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="utenti/read.php">Utenti</a>
                        <!-- <a class="dropdown-item" href="utenti/create.php">Crea</a>
                        <a class="dropdown-item" href="utenti/update.php">Crea</a>
                        <a class="dropdown-item" href="utenti/delet.php">Crea</a> -->
                    </div>
                </li>
                <!-- area inventario -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="inventario/i_read.php">inventario</a>
                        <!-- <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
            </ul>

            <button class="btn btn-outline-dark" id="logout">Logout</button>
            <script>
                logout.addEventListener("click", function() {
                    location.href = "session/logout.php";
                });
            </script>
        </div>
    </nav>
    <!-- resto -->

    <!-- <p id="welcome">Cosa vuoi fare oggi?</p> -->

</body>

</html>