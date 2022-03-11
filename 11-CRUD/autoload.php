<?php

class Autoload{
    //du fait qu'elle soit static cette méthode appartient a la class et non à un object créé de cette meme class. Elle ne sera oas modifiable via l'instance de la class, mais seulment par sa class
    public static function inclusionAuto($classname){
        // la constante magic __DIR__ me recupere le chemain vers mon fichier
        // elle recupere l'intergaliter du chamain vers mon project , qu'il soit en local ..... comme plus tard en ligne ce qui sera tres interessant. je n'aurais de modification a faire lors de ce changement là.
        require_once __DIR__.'/'. str_replace('\\', '/', $classname . '.php');
        // echo " require_once . __DIR__.'/'.  $classname . '.php <br>";
       
    }
}

spl_autoload_register(array('Autoload','inclusionAuto'));

// $conroller = new controller\Controller;

// echo __DIR__;