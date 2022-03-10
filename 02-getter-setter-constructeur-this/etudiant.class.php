<?php

class Etudiant{
    // proprieter privée qui va necessiter de declarer ses setter et getters. pour chaque proprieter privée je devrais le faire en plus de controler l'envoie de donnee dans le setter
    private $prenom;
    private $nom;
    //declaration du __construct qui attend un argument 
    //ce n'est pas oubliger dans le cardre d'un constructeur on ne peut donner aucun argument comme on peut en donner plusieur 
    //un construct s'auto exectute des que l'on instencie la class (cree un objet de cette class) le construct et unique 
    public function __construct($newPrenom,$newNom){
        //cette affichage montre que mon construct est bien executer
        echo"Durant l'instenciation, nous avons bien recu la valeur $newPrenom $newNom <br>";
        // le construct doit envoyer la donnéé (contenue dans l'argument  pour affecter la valeur dans le setter)
        $this->setPrenom($newPrenom);
        $this->setnom($newNom);
    }
    //le setter reoit la donnee il la controle (avec is is_string, par exemple)
    public function setPrenom($newPrenom){
        //si le setter valide la donnee , il affecte la proprieter de l'objet $prenom 
        $this->prenom = $newPrenom;
    }
    public function setnom($newNom){
        $this->nom = $newNom;
    }
    //le getter recupere la donnee dans la proprieter de l'objet $prenom .Elle est desormais disponible pour etre afficher ou autre
    public function getPrenom(){
        return $this->prenom;
    }
    public function getnom(){
        return $this->nom;
    }
}
//instanciation de la classe etudiant(en gros 1er objet de ma class)
$etudiant = new Etudiant('Glen','Andô');

echo 'je suis ' . $etudiant->getPrenom() . ' ' . $etudiant->getnom() .' <br>' ;
//un costruct est une methode magique, qui s'auto execute qui permet d'automatiser certaine taches.
//on peut le considerais comme un fichier init.php