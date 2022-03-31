<?php
session_start();
header('Content-type: application/json');

require("./../config/config.inc.php");
require(WAY."/includes/autoload.inc.php");

$per = new Personne();

$tab = array();

if(!$per->check_email($_POST['email_per'])){
    $per->add($_POST);
    $tab['reponse'] = true;
    $tab['message']['texte'] = "Bienvenue, utilisez vos identifiants pour vous connecter";
    $tab['message']['type'] = "success";
    
}else{
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Cet email est déjà utilisé !!";
    $tab['message']['type'] = "danger";
}

echo json_encode($tab);
?>