<html>
<head>
<title> Exemple Dynamique </title>
</head>
<body>
La date d'aujourd'hui est le :
<?php
// Affichage de la date
echo date("d/m/Y");
?>

<?php echo "Some text"; ?>
No newline
<?= "But newline now" ?>

<?php
echo "a"; echo "b"; echo "c";
#The output will be "abc" with no errors
$a = "Hello ";
$b = $a . "World !";
echo $b; //Affiche : "Hello World !"
echo 3*4;
function afficher( $texte, $saut = 1 ) {
    echo $texte;
    for( $i = 0 ; $i < $saut ; $i++)
    echo "\n";
    }
    afficher ("Yo tout",3);
    afficher ("le monde",2);
    afficher ("c'est Squeezie",1);
    afficher("Hello", 0);
    afficher(" World !");
    
?>


</body>
</html>