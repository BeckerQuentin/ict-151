<pre>
<?php
session_start();



require("./config/config.inc.php");
require(WAY."/includes/autoload.inc.php");


$per = new Personne(50);
/*
$per->set_nom("🍞");
$per->set_prenom("Bread");
$per->set_email("bread.pain@php.net");
$per->set_password("Pa\$\$w0rd");
$per->set_news_letter(1);
*/

echo $per;
$per->check_login("Rasmus.Lerdorf@php.com","Passw0rd");

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$per = new Personne($_SESSION['id']);
if($per->check_connect()){
    echo "Logué";
}else{
    echo "Pas logué";
}
?>
<a href="./controle_login.php">Logué ? </a>

</pre>
