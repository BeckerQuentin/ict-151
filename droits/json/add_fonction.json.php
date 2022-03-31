<?php
session_start();
header('Content-type: application/json');

require("./../../config/config.inc.php");
require(WAY."/includes/autoload.inc.php");

$fnc = new Fonction();




if(!$fnc->check_abr($_POST['abr_fnc'])){


    $id = $fnc ->add($_POST);
    $fnc ->set_id($id);
    $fnc->init();


    $tab['reponse'] = true;
    $tab['message']['texte'] = "La fonction ".$fnc->get_nom()." (".$fnc->get_abr_fnc().") à bien été ajoutée";
    $tab['message']['type'] = "success";

}else{
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Un problème est survenu";
    $tab['message']['type'] = "danger";
}

echo json_encode($tab);
?>