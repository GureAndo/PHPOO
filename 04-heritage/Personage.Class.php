<?php

class Personage{

    protected function deplacement(){
        return 'je me deplace tres vite !';
    }

    public function saut(){
        return 'je saute tres haut !';
    }

}
// avec le mot clef extends , Cloud herite de toutes les proprieter et methode de la classe personage 
// elle peut heriter de la methode protect , c'est au niveaux de la visibiler qui le permet . public aussi  qui est encore plus visible par contre pas  private
class Zack extends Personage {
    public $nom = 'Zack';
    public function quiSuisJe(){
        // je recupere dans cette affichage les methode dont a herité la class, meme la protected
        return 'Je suis ' . $this->nom . ' '.  $this->deplacement() . ' et ' .$this->saut(). '<br>' ;
    }
}
//j'instancie ma class
$zack = new Zack;
// petit print_r pour visualiser si je recupere tout le contenue de personage en heritage 
//la methode publique apparait, mais la protected non c'est un comportement normal , il ne peut pas l'afficher, mais la class herite tout de meme
echo '<pre>'; print_r(get_class_methods($zack));'</pre>';
// j'affiche le contenue de la methode codée a la ligne 20
echo $zack-> quiSuisJe();

// nouvelle classe qui hérite de Personnage
class Cloud extends Zack{

    public function quiSuisJe(){
        return 'Je suis cloud, ' .$this->deplacement() . ' et ' . $this->saut()  .'<br>';
    }

    // je redéfinis la méthode saut() (existante dans la classe Personnage) en retournant une nouvelle valeur. Je veux savoir si cela est possible ou si je vais avoir une erreur PHP
    public function saut(){
        return 'je ne saute pas très haut';
    }

}

// j'instancie ma classe
$zack = new Zack;
// un print_r pour visualiser si je récupère tout le contenu de Personnage en héritage
// la méthode publique apparait, mais la protected non. c'est un comportement normal, il ne peut l'afficher, mais la classe en hérite tout de même
echo '<pre>'; print_r(get_class_methods($zack)); echo '</pre>';

// j'affiche le contenu de la méthode codée à la ligne 19
echo $mario->quiSuisJe();

// j'instancie la classe Bowser pour créer un objet
$cloud = new Cloud;
// je fais unaffichage pour vérifier qu'elle valeur je récupère pour saut(). Celle de la classe mère, ou la nouvelle
echo $cloud->quiSuisJe();
// cela a fonctionné, je récupère la nouvelle valeur. J'ai surchargé la méthode saut() et cela a fonctionné.
// C'est une technique dont je pourrai avoir besoin de temps en temps