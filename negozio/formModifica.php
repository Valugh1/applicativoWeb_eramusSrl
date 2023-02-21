<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            <div class="jumbotron">
                <div class="card cardbox">
                    <div class="card-header">modifica</div>
                    <div class="card-body">

                        <div class="form-group">

                            <form action="modUtenti.php" id="login-nav" method="post" role="form" class="form" accept-charset="UTF-8">
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

                                <!-- Submit -->
                                <div class="form-group">
                                    <button id="reg_submit" name="submit" value="1" class="btn btn-block btn-primary" disabled="disabled">modifica
                                        utente</button>
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
    <!--<script src="../script/script1.js"></script>-->