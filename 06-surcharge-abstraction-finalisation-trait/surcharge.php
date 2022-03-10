<?php

use A as GlobalA;

class A{
    //quelque proprieter protected 
    protected $nb1;
    protected $nb2;
    protected $nb3;
    //une methode simple qui retourne une valeur 
    public function calc(){
        return 10;
    }
}
$a = new A;
echo $a->calc();
//class B qui herite de la classe A
class B extends A{
    //je surcharge la methode calc heriter de la class A
    //j'ai besoin d'affiner , comparer a sont compotement initial 
    //le nom de cette methode eput etre differant de cuile de la classe parent (A)
    public function calc(){
        // je recupere la valeur retourner par la methode calc(10) en utilisant la syntaxd parent ::calc()
        //j'affect a une variable $nbs 
        //ici le nom de la methode doit etre la meme que celle que l'on veut surcharger, modifier
        $nbs = parent::calc();

        // condition qui va tester la valeur contenue sans ma var $nbs
        //on peut ne pas mettre d'acolade pour ce if car dans leur block d'instruction il n'y a qu'un seul instruction dans ce cas de figure la syntaxd est bonne  
        if($nbs < 100){
            return "$nbs est inferieur a 100";
        }else{
            return "$nbs est superieur a 100";
        }
        

    }
}

$b =  new B;
echo "<pre>";var_dump($b) ;echo "</pre>";
// get_class_methods() pour voir ce que contient mon object $b
echo "<pre>";print_r(get_class_methods($b)) ;echo "</pre>";
// j'affiche le resultat de ma   function calc()(elle doit porter le nom de la methode de la class qui peut etre differant de celui de le methode heriter de la classe parent (A))
echo $b->calc();