<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("header.php"); ?>
    <!-- style -->
    <link rel="stylesheet" href="style/form.css">
    <title>Login</title>

</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
                <div class="card cardbox">
                    <div class="form_header card-header">Log in</div>
                    <div class="card-body form_color">

                        <div class="form-group">

                            <form action="./session/login.php" id="login-nav" method="POST" role="form" class="form" accept-charset="UTF-8">

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
                                                <i class="fa-solid fa-eye"></i>
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

    <script src="script/passValidation.js"></script>
    <?php include("footer.php"); ?>
</body>

</html>