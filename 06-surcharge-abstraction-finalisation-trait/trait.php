<?php
//pour declarer un trait on utilise le mot clef trait
// par convention pour declarer un trait son nom doit tjr commencer par un T majuscule 
trait TPanier{
    // tout le contenue du trait sera declare comme une class . la syntaxe sera  la meme
    public $nbProduit;

    public function afficheProduit(){
        return 'j\'affiche tout les produit';
    }  
}

trait TMembre{

    public function afficheMemebre(){
        return 'j\'affiche tout les membres';
    }  
}
// je declare uène class

class Produit{
    public $prix;
}


// les classe peuvent heriter d'une autre class, en plus de pouvoir heriter de plusieurs Trait
class Site extends Produit{
    //syntaxe avec une pour heriter des trait (pas de extends sa marche pas)
    use TPanier, TMembre;
}
//instanciation de la class
$site = new Site;
// var_dump et print_r pour verifier ce que contient mon objet $site
echo print_r(get_class_methods($site)).'<br>' ;
echo var_dump($site).' <br>';

// on ne peut pas instentier (cree d'objet) depuit un trais 
// $tmembre = new TMembre;


