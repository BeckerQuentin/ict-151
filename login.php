<?php
require "./config/config.inc.php";
require WAY."/includes/head.inc.php";
?>
<script src="./js/login.js"></script>
<div class="row">
    <div class="header">
        <h3>Connexion</h3>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        Connexion au portail de jeux
    </div>


    <div class="panel-body">
        <form id="login_form" action="check.php" method="post">
            <!--email-->
            <div class="form-group row">
                <label for="email_log" class="col-sm-2 col-form-label">
                    E-mail
                </label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" id="email_log" name="email_log" placeholder="votre aresse e-mail">
                </div>
            </div>
            <!--mot de passe-->
            <div class="form-group row">
                <label for="password_log" class="col-sm-2 col-form-label">
                    Mot de passe
                </label>
                <div class="col-sm-10">
                    <input  type="password" class="form-control" id="password_log" name="password_log" placeholder="votre mot de passe">
                </div>
            </div>

            <!--boutons-->
            <div class="form-group row">
                <div class="col-sm-7"></div>

                <div class="col-sm-2">
                    <button class="btn btn-primary">Se connecter</button>
                </div>
                <div class="col-sm-1 ">
                    <button class="btn btn-warning">Annuler</button>
                </div>
                <div class="col-sm-1 ">
                    <button class="btn btn-secondary">S'inscrire</button>
                </div>
            </div>

        </form>
    </div>
    <div class="panel-footer">
    </div>

</div>
</div>
</body>
</html>