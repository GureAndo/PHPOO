<?php


class C{
    // construct de la class A qui va s'auto load des que l'on va cree un objet de la class C
    public function __construct(){
        //affichage pour attester que le construc s'est exe
        echo 'instanciation de C <hr>';
    }
}
