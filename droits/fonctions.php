<?php
require "../config/config.inc.php";
require WAY."/includes/head.inc.php";
?>
<script src="./js/fonction.js"></script>
<div class="row">
    <div class="header">
        <h3>Fonction</h3>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        Ajouter une fonction
    </div>


    <div class="panel-body">
        <form id="fonction_form" method="post">
            <!--nom-->
            <div class="form-group row">
                <label for="nom_fon" class="col-sm-2 col-form-label">
                    Nom
                </label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" id="nom_fnc" name="nom_fnc" placeholder="Nom de la fonction">
                </div>
            </div>
            <!--Abbr-->
            <div class="form-group row">
                <label for="abr_fnc" class="col-sm-2 col-form-label">
                    Abreviation de la fonction
                </label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" id="abr_fnc" name="abr_fnc" placeholder="Abreviation">
                </div>
            </div>
            <!--Description-->
            <div class="form-group row">
                <label for="desc_fnc" class="col-sm-2 col-form-label">
                    Description de la fonction
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="desc_fnc" name="desc_fnc" placeholder="Description"/>
                </div>
            </div>

            <!--boutons-->
            <div class="form-group row">
                <div class="col-sm-8"></div>

                <div class="col-sm-2">
                    <button class="btn btn-primary" id="submit_conf">Ajouter</button>
                </div>
                <div class="col-sm-2 ">
                    <button class="btn btn-warning" id="reset_conf">Annuler</button>
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