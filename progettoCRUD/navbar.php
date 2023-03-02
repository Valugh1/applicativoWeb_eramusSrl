<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #userBadge {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        #userIcon {
            margin-right: 0.4em;
        }
    </style>

</head>

<body>

    <!-- navbar -->
    <!-- messaggio benvenuto -->
    <nav id="navigazione" class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand"><span>
                <!-- user -->
                <div id="userBadge"><i class="fa-solid fa-user" id="userIcon"></i><span><?php echo $_SESSION['username']; ?> </span></div>

            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- Home -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php get_home_directory() ?>">Home</a>
                </li>
                <!-- area utenti -->
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Area Utenti
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<? get_read_directory(); ?>">Ricerca</a>
                        <a class="dropdown-item" href=" <? get_create_directory() ?>">Aggiungi</a>
                    </div>
                </li>
                <!-- area inventario -->
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Area Inventario
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<? get_i_read_directory() ?>">Ricerca</a>
                        <a class="dropdown-item" href="<? get_i_create_directory() ?>">Aggiungi</a>
                        <!-- <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
            </ul>

            <button class="btn btn-outline-dark" id="logout">Logout</button>
            <script>
                logout.addEventListener("click", function() {
                    location.href = "<? get_logout_directory() ?>";
                });
            </script>
        </div>
    </nav>
</body>

</html>
<?php

function get_home_directory()
{
    $read_file_path = '';
    switch (true) {
        case is_file("../interfaccia_iniziale.php"):
            $read_file_path = "../interfaccia_iniziale.php";
            echo $read_file_path;
            break;
        case is_file("interfaccia_iniziale.php"):
            $read_file_path = "interfaccia_iniziale.php";
            echo $read_file_path;
            break;
        default:
            echo "directory non trovata.";
            break;
    }
}

function get_read_directory()
{
    $read_file_path = '';
    switch (true) {
        case is_file("../utenti/read.php"):
            $read_file_path = "../utenti/read.php";
            echo $read_file_path;
            break;
        case is_file("utenti/read.php"):
            $read_file_path = "utenti/read.php";
            echo $read_file_path;
            break;
        case is_file("read.php"):
            $read_file_path = "read.php";
            echo $read_file_path;
            break;
        default:
            echo "directory non trovata.";
            break;
    }
}

function get_create_directory()
{
    $read_file_path = '';
    switch (true) {
        case is_file("../utenti/create.php"):
            $read_file_path = "../utenti/create.php";
            echo $read_file_path;
            break;
        case is_file("utenti/create.php"):
            $read_file_path = "utenti/create.php";
            echo $read_file_path;
            break;
        case is_file("create.php"):
            $read_file_path = "create.php";
            echo $read_file_path;
            break;
        default:
            echo "directory non trovata.";
            break;
    }
}

function get_i_read_directory()
{
    $read_file_path = '';
    switch (true) {
        case is_file("../inventario/i_read.php"):
            $read_file_path = "../inventario/i_read.php";
            echo $read_file_path;
            break;
        case is_file("inventario/i_read.php"):
            $read_file_path = "inventario/i_read.php";
            echo $read_file_path;
            break;
        case is_file("i_read.php"):
            $read_file_path = "i_read.php";
            echo $read_file_path;
            break;
        default:
            echo "directory non trovata.";
            break;
    }
}

function get_i_create_directory()
{
    $read_file_path = '';
    switch (true) {
        case is_file("../inventario/i_create.php"):
            $read_file_path = "../inventario/i_create.php";
            echo $read_file_path;
            break;
        case is_file("inventario/i_create.php"):
            $read_file_path = "inventario/i_create.php";
            echo $read_file_path;
            break;
        case is_file("i_create.php"):
            $read_file_path = "i_create.php";
            echo $read_file_path;
            break;
        default:
            echo "directory non trovata.";
            break;
    }
}

function get_logout_directory()
{
    $read_file_path = '';
    switch (true) {
        case is_file("../session/logout.php"):
            $read_file_path = "../session/logout.php";
            echo $read_file_path;
            break;
        case is_file("session/logout.php"):
            $read_file_path = "session/logout.php";
            echo $read_file_path;
            break;
        case is_file("logout.php"):
            $read_file_path = "logout.php";
            echo $read_file_path;
            break;
        default:
            echo "directory non trovata.";
            break;
    }
}
