<?php


//je lui donne son name space
namespace General; 
// require_once pour importer le contenue de l'autre fichier
require_once ('nameSpace-commerce.php');
// use me sert a importer le contenue du ou des namespace inclus dans le fichier apper avec le require
use Commerce1, commerce2, Commerce3;
use Commerce1\Commande;

//la const magique  __NAMESPACE__ permet de savoir dans quel namespace onse trouve(ici dans le general)
echo __NAMESPACE__;
//la syntaxe ci-dessous ne va pas fonctionner car la class PDO n'existe pas dans ce name space 'General'
// $pdo = new PDO('mysql:host=localhost;dbname=voiture','root', '');

/*je veut veut l'utiliser pour me conecter a la BDD je vais devoir metre un antislash \ devant PDO  cela permmetra de sortir du name space global ou elle sera reconnue   */
$pdo = new \PDO('mysql:host=localhost;dbname=voiture','root', '');

//pour injstancier la class Commande je ne peut pas directement  $commande = new Commande;
//je doit le faire preceder de son namespace $commande = new Commerce1\Commande;
$commande = new Commande;
echo '<pre>';var_dump($commande) ;echo '</pre>';

//j'instence mes 3 autre classe
$produit = new Commerce2\Produit;
echo '<pre>';var_dump($produit) ;echo '</pre>';

$panier = new Commerce3\Panier;
echo '<pre>';var_dump($panier) ;echo '</pre>';

$produit = new Commerce3\Produits;
echo '<pre>';var_dump($produit) ;echo '</pre>';

class test extends Commerce3\Panier{
// class enfant de panier
}

$test = new test;

var_dump($test);