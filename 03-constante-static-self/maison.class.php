<?php

class Maison{
    // une proprieter non static appartient a l'objet
    public $couleur = 'Blanc';
    //une proprieter static appartient a la classe
    public static $espaceTerrain = '500m²';
    // une proprietee static mais private
    private static $nbPieces = 7;
       //syntaxe pour definire un constante en procedural 
    // define('URL', 'sa valeur');
    //syntaxe pour declarer une const en POO
    //utilisation du mots clefs const suivi du nom en maj (convention) , puis on lui donne sa valeur
    //un const appartien automatiquement a la class
    const HAUTEUR = '10m';

    // je fait un getter pour recuperer sa valeur, mais pas besoin d'un setter car la valeur est deja affecter
    // le getter sera aussi static
    public static function getNbPiece(){
        //j'utilise self car c'est une proprieter qui appatiern a la class et non de l'object
        return self :: $nbPieces;
    }
    //syntaxe pour definire un constante en procedural 
    // define('URL', 'sa valeur');



}
// instenciation de la class, lobject  aura par defalt la couleur blanc
$maison= new Maison;
echo '<pre>';var_dump($maison); echo"</pre>";
// second object je veut que la couleur soit vert 
// la proprieter statique n'apparais pas dans le var_dump
$chambre = new Maison;
$chambre->couleur = 'vert';
echo '<pre>';var_dump($chambre); echo"</pre>";
//3e object , je ne precise rie nsa couleur sera blanc
$petitSalon = new Maison;
echo '<pre>';var_dump($petitSalon);echo ''.Maison::$espaceTerrain; echo"</pre>";
// pour afficher la valeur de la proprieter static je doit passer par la class
echo "l'espace terrain par defaut est de " .Maison::$espaceTerrain ; echo '<br>'; 
//je je veut lui modifier sa valeur Idem je doit passer par la class
Maison::$espaceTerrain = '50000000m²';
// cette nouvelle valeur ecrase la prsedente , elle va impacter tout les nouveaux object
echo "l'espace terrain par defaut est desormer de " .Maison::$espaceTerrain; echo '<br>'; 


echo "le nombre de piece par defaut est desormer de " .Maison::getNbPiece(); echo '<br>'; 
echo "le nombre de piece par defaut est desormer de " .$petitSalon->getNbPiece(); echo '<br>'; 
 

//syntaxe pour recuperer la valeur de la const qui appartien  obligatoirment a la class (pas besoin de preciser static)
echo 'Hauteur sous-plafond par defaut' .Maison :: HAUTEUR . '<br>';














//ces deux prochaine ne vont pas generer d'erreur 
echo $petitSalon->getNbPiece().'<br>';
//elle devrais generer une erreur car je pointe avec un object sur des methode et proprieter static , qui appartienne a la class
// c'est une trop grande permissiviter de php il aurais du les signaler en tant que erreur comme les 2 suivante
echo $petitSalon :: $espaceTerrain.'<br>';
//VA GENERER une erreur car je pointe une proprieter qui appartien a la class avec un objet 
echo $petitSalon->espaceTerrain .'<br>' ; 
// va generer une erreur car je pointe une proprieter qui appatien a l'object avec une class
echo Maison::$couleur.'<br>';
// Remarque: lorsque je pointe avec l'object vers une proprieter  $petitSalon ->couleur, je ne doit pas mettre de signe $ 
