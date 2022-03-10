<?php

abstract class vehicule{
    public $model;
    final public function Demarrer(){
        return 'demarrer';
    }
    abstract function carburant();

    public function nombreTestsObligatoires(){
        return 100;
    }
}

class Renault extends Vehicule{
    public $model = 'renault';
    public function nombreTestsObligatoires(){
        return 30 + parent::nombreTestsObligatoires();
        //autre facon de la codée 
        //return 130;
    }
    public function carburant(){
        return 'diesel';
    }
}

class Peugot extends Vehicule{
    public $model = 'peugot';
    public function nombreTestsObligatoires(){
        // autre facon de la codeé 
        //return 70 + parent::nombreTestsObligatoires();
        return 100 + 70;
    }
    public function carburant(){
        return 'essence';
    }


}


$renault = new Renault;
$peugot = new Peugot;
/*-------------------var_dump et print-r---------------------------*/
echo "<pre>";print_r(get_class_methods($peugot)) ;echo "</pre>";
echo "<pre>";print_r(get_class_methods($renault)) ;echo "</pre>";
echo "<pre>";var_dump($renault) ;echo "</pre>";
echo "<pre>";var_dump($peugot) ;echo "</pre>";
/*------------------------les echos--------------------------------*/
echo'les ' . $renault->model." doivent executer " . $renault->nombreTestsObligatoires().' test et carbure au ' .$renault->carburant().' pour pouvoir '.$renault->demarrer(). '<br>';

echo 'les '. $peugot->model  .' doivent executer '. $peugot->nombreTestsObligatoires().' test et carbure à '. $peugot->carburant() .' pour pouvoir '.$peugot->demarrer().  '<br>';