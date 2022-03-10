<?php


class D{
    // construct de la class A qui va s'auto load des que l'on va cree un objet de la class D
    public function __construct(){
        //affichage pour attester que le construc s'est exe
        echo 'instanciation de D ';
    }

    public function test(){
        echo'test r"ezrezrze';
    }
}
