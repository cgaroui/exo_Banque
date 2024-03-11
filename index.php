<h1>exo banque </h1>
<?php

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name . '.php';
});
$titulaire1= new Titulaire("Garoui", "chaima", "08/08/1999", "Strasbourg");
$c1 = new Compte("compte courant",650.23,"euros",$titulaire1);
$c2 = new Compte("livret A",250.80,"euros",$titulaire1);
// $c1->crediter(1000);
// $c1->debiter(500);

echo $c1->getSolde()."<br>";
$c1->crediter(1000);
echo $c1->getSolde();
$c1->virement($c2, 500);
//echo "<br>".$c2->getSolde();
echo $titulaire1->afficherComptes();
//echo $titulaire1->getAge();
// echo $titulaire1->getInfos();

echo $titulaire1->getInfos();

