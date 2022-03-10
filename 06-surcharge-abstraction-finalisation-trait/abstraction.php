<?php
// cette methode est abstraite car j'ai declarer a l'interieur deux methodes abstraite si je n'ecrit pas abstract class j'aurais un Erreur PHP
abstract class Joueur{
    protected $pseudo;
    protected $age;

    //methode pour s'inscrire qui doit faire apelle a une methode etreMajeur (si on n'est pas majeur on peut pas s'inscrire pour jouer en ligne) 
    public function inscription(){
        return $this->etreMajeur();
    }
    // methode abstaite pour savoir si on est  majeur
    abstract function etreMajeur();
    // methode abstraite pour determiner la devise que on va utiliser pour jouer en ligne selon le pays 
    abstract function devise();

}

// je declare la classe JoueurFR qui herite de joueur
class JoueurFR extends Joueur{
    // he suis obliger d'implementer les 2 class abstraite dont a heriter la classe Joueur FR
    // tout du moin  je suis obliger de declarer meme si je ne leur donne aucune instruction a executer
    public function etreMajeur(){
        return 18;
    }

    public function devise(){
        return'€';
    }
}

class JoueurUS extends Joueur{

    public function etreMajeur(){
       return 21;
    }

    public function devise(){
        return'$';
    }
}
// je ne peut pas instencier une class abstraite (Joueur) je ne pourais cree d'objet que des classe heritiere
$joueur = new JoueurFR;
$joueur2 = new JoueurUS;
echo "en France l'age l'egale pour s'inscrire sur un site de jeux en ligne est de " .$joueur->etreMajeur(). ' ans <br>';

echo "Pour jouer sur un site de jeux en ligne, en France  on doit utiliser des " . $joueur->devise(). '<br>';


echo "in USA for play Online Game you need have " .$joueur2->etreMajeur(). ' Year Old <br>';

echo "in USA the devise is  " . $joueur2->devise(). '<br>';
