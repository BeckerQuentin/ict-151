<pre>
<?php
require("./class/Personne.class.php");

$per = new Personne();
$per->set_nom("🍞");
$per->set_prenom("Bread");
$per->set_email("bread.pain@php.net");
$per->set_password("Pa\$\$w0rd");
$per->set_news_letter(1);

echo $per;
?>
</pre>
