<?php
require "../config/config.inc.php";
require WAY."/includes/head.inc.php";
?>
<script src="./js/Autorisation.js"></script>
<div class="row">
    <div class="header">
        <h3>Autorisation</h3>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        Ajouter une autorisation
    </div>


    <div class="panel-body">
        <form id="autorisation_form">
            <!--nom-->
            <div class="form-group row">
                <label for="nom_aut" class="col-sm-2 col-form-label">
                    Nom
                </label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" id="nom_aut" name="nom_aut" placeholder="Nom de l'autorisation">
                </div>
            </div>
            <!--Code-->
            <div class="form-group row">
                <label for="code_aut" class="col-sm-2 col-form-label">
                    Code de l'autorisation
                </label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" id="code_aut" name="code_aut" placeholder="Code de l'autorisation">
                </div>
            </div>
            <!--Abbr-->
            <div class="form-group row">
                <label for="desc_adm" class="col-sm-2 col-form-label">
                    Description de l'autorisation pour un administrateur
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="desc_adm" name="desc_adm" placeholder="Description"/>
                </div>
            </div>
            <!--Description-->
            <div class="form-group row">
                <label for="desc_usr" class="col-sm-2 col-form-label">
                    Description de l'autorisation pour un utilisateur
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="desc_usr" name="desc_usr" placeholder="Description">
                </div>
            </div>

            <!--boutons-->
            <div class="form-group row">
                <div class="col-sm-8"></div>

                <div class="col-sm-2">
                    <button class="btn btn-primary">Ajouter</button>
                </div>
                <div class="col-sm-2 ">
                    <button class="btn btn-warning">Annuler</button>
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