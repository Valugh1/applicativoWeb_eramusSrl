<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <title>Login</title>

</head>

<body>
    <div class="row" style="margin-top: 12%;">


        <div class="container">

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    <div class="card cardbox">
                        <div class="card-header">Log in</div>
                        <div class="card-body">

                            <div class="form-group">

                                <form action="session/login.php" id="login-nav" method="POST" role="form" class="form" accept-charset="UTF-8">

                                    <!-- username -->
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" value="" placeholder="Username" required>
                                    </div>

                                    <!-- password -->
                                    <div class="form-group">

                                        <!-- password label -->
                                        <label for="password">Password</label>
                                        <!-- password input -->
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control" data-placement="bottom" data-toggle="popover" data-container="body" data-html="true" value="" placeholder="Password" required>

                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-append1" onclick="togglePassword()">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="form-group">
                                        <button name="submit" type="submit" value="login" class="btn btn-block btn-primary">Log in
                                        </button>
                                    </div>

                                </form>
                            </div>

                            <!-- Links -->
                            <div class="bottom text-center">
                                Non hai ancora un account? <a href="register/register_form.html"><b>Registrati</b></a>
                                <?php
                                if (isset($_GET["ui"]) && ($_GET["ui"] == "username_inesistente")) { ?>

                                    <script>
                                        alert("Username inesistente!");
                                        window.open("location: login.php", "target=_self");
                                    </script>



                                <?php };

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="script/script.js"></script>
</body>

</html>