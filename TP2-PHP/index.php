<?php
// Définit le fuseau horaire par défaut à utiliser.
date_default_timezone_set('UTC');

// Affichage de quelque chose comme : Monday 8th of August 2005 03:12:46 PM
echo date('l jS \of F Y h:i:s A');

// Affiche : July 1, 2000 is on a Saturday
echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

// Affichage de quelque chose comme : Wed, 25 Sep 2013 15:28:57 -0700
echo date(DATE_RFC2822);

$tab = array(1,2,3,4,5,6);
echo "valeurs dans tab : ";
for( $i = 0 ; $i<count($tab) ; $i++){
echo $tab[$i]."\n";
}
// les fonctions max et min existent
echo "nb min = ".min($tab)."\n";
echo "nb max = ".max($tab)."\n";
?>
