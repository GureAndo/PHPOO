<?php

class Voiture{

    // propriété private qui va necessiter de coder les setter et getter
    private $litresEssence;
    public  $plein;
    // le setter reçoit en argument une valeur (le nombre de litres d'essence)
    public function setLitresEssence($litres){
        // si la valeur reçue est validée (avec un if que l'on a pas codé), alors cette valeur va aller affecter la propriété de l'objet $litresEssence
        $this->litresEssence = $litres;
    }

    // le getter pour récupérer la valeur stockée dans ^litresEssence
    public function getLitresEssence(){
        // pour récupérer la valeur, je pointe avec $this vers la propriété de l'objet $litresEssence
        return $this->litresEssence;
    }

}

// la classe pompe hérite de la classe Voiture
class Pompe extends Voiture{
    //dans cette methode , qui appartient a la class pompe, je donne deux argument : le 1er c'est le nom de la classe(voiture) dont sera issu l'objet a relier. ($impala67) le second argument , $vehicule, sera le represeentant de cet objet 
    public function donnerLitresEssence(Voiture $vehicule){
        // petit calcule facile pour savoir combien de litre d'essance seront envoyer dans le reservoir  de l'objet $impala67 (representer par $vehicule) 
        // je fait en 1er appele a setLitreEssence pour modifier la valeur du nombre de litres dans la pompe 
        //pour modifier je, je doit savoir combien il ya (je le sais avec le getter)
        //je vais donc soustraire aux 500litres actuel ce que je doit donner au resevoir de la voiture
        //je le sais ce que je retitr au reservoir de la pompe c'est 50(pour faire le plein )- ce qu'il ya dans le resevoir de la voiture pour que sa ne deborde pas je sais ce qu'il ya dans la voiture grace a sont getter . c'est 5 litre 
        //ceci me donnra le calcule suivant 500 litre - 50 litres - 5 litre 
        // 500 litre - 45 litre qui me laisse dans le reservoir de la pompe 455 litres
        $this->setLitresEssence($this->getLitresEssence() - ($vehicule->plein - $vehicule->getLitresEssence()));
        //calcule pour faire le plein du reservoir de la voiture je fait apelle a $vehicule  qui represente l'object $impala67 je passe oar son setter pour modifier la valeur contenue dans le reservoir de la voiture 
        //pour savoir combien de litres je doit, je/ je peut envoyer dans le reservoir de la voiture je doit savoir au prealable combien il ya dans le reservoir de la voiture je le sais grace a son getter (5)
        // a présent, je sais que je peux envoyer 50 litres, moins ce qu'il ya déjà dans le reservoir (5 litres)
        // 50 - 5 = 45 litres            
        $vehicule->setLitresEssence($vehicule->getLitresEssence() + ($vehicule->plein - $vehicule->getLitresEssence()));
        echo '<pre>'; var_dump($vehicule); echo '</pre>';

        // double affichage conventionnel de ce que contiennet les réservoirs de la voiture et de a pompe
        echo "J'ai désormais dans le réservoir de ma voiture: " . $vehicule->getLitresEssence() . ' litres <br>';
        echo 'il me reste dans ma pompe ' .$this->getLitresEssence(). ' litres';
    }



}

// je crée un objet $voiture, de ma classe Voiture. c'est une instance de ma classe Voiture
$impala67 = new Voiture;
$impala67 ->plein = 50;
// j'execute ma méthode setLitresEssence en lui donnant en argument le nombre de litres d'essence
$impala67->setLitresEssence(5);
// j'affiche cette même valeur en executant ma méthode
echo 'Ma voiture a dans son reservoir ' . $impala67->getLitresEssence() . " litres d'essence <br>";

$pompe = new Pompe;
$pompe->setLitresEssence(500);
echo 'Ma pompe a dans son reservoir ' . $pompe->getLitresEssence() . " litres d'essence <br>";

$pompe->donnerLitresEssence($impala67);



