<?php
function chargerClasse($classe){
require (WAY."/class/". $classe.".class.php");

}

spl_autoload_register('chargerClasse');
?>