<?php
session_start();
header('Content-type: application/json');

require("./../../config/config.inc.php");
require(WAY."/includes/autoload.inc.php");

$aut = new Autorisation();
$usr = new Autorisation();




if(!$aut->check_code($_POST['code_aut'])){

 $TableauDeDonneesPourUneAutorisation = array();
 $TableauDeDonneesPourUneAutorisation['nom_aut'] = $_POST['nom_aut'];
 $TableauDeDonneesPourUneAutorisation['code_aut'] = "ADM_".strtoupper($_POST['code_aut']);
 $TableauDeDonneesPourUneAutorisation['desc_aut'] = $_POST['desc_adm'];

 $DeuxiemeTableauDeDonneesPourUneAutorisation = array();
 $DeuxiemeTableauDeDonneesPourUneAutorisation['nom_aut'] = $_POST['nom_aut'];
 $DeuxiemeTableauDeDonneesPourUneAutorisation['code_aut'] = "USR_".strtoupper($_POST['code_aut']);
 $DeuxiemeTableauDeDonneesPourUneAutorisation['desc_aut'] = $_POST['desc_usr'];

    $id = $aut ->add($TableauDeDonneesPourUneAutorisation);
    $id = $usr ->add($DeuxiemeTableauDeDonneesPourUneAutorisation);
    $aut ->set_id($id);
    $usr ->set_id($id);
    $usr->init();
    $aut->init();


    $tab['reponse'] = true;
    $tab['message']['texte'] = "L'autorisation ".$aut->get_nom()." (".$aut->get_desc_aut().") à bien été ajoutée";
    $tab['message']['type'] = "success";

}else{
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Un problème est survenu";
    $tab['message']['type'] = "danger";
}

echo json_encode($tab);
?>