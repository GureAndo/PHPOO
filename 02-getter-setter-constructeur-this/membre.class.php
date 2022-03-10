<?php

class Membre{
    // La syntaxe ci-dessous sert d'exemple pour montrer quele get ne sert pas que à afficher, mais aussi a récupérer une valeur pourl'utiliser dans une requete SQL
    // public function insertUser(){
    //     $ajouterUser = $pdo->prepare("INSERT INTO membre (prenom, nom) VALUES (". $this->getPrenom(). ",". $this-getNom() . ") ");
    // }


    // ces 2 propriete sont private Ce sont les champs que vont remplir les user je doit les proteger pour que les info qui vont transiter ne soit pas differante de ce que j'attend 
    private $prenom;
    private $nom;
    // cette methode va servir a controler ce qui va transiter dans les champs du formulaire.
    //un setter sert de controller en POO(programation oriabnter object). le nom que je lui donne n'a pas d'importance ce n'est pas une function predefini Mais par convention, un setter commencera par le mot set suivi du nom du champs qu'il controle
    //Un setter roicoit egalement dans sa parentaise un argument (la donner qu'il doit controler )
    public function setPrenom($newPrenom){

        //la condition qui va verifier si la donnee recu (mon argument/$newPrenom) et bien un type string
        if(is_string($newPrenom)){
            //si la condition est verifier alors grace $this->la proriete $prenom de l'objet va recevoir la valeur vehicule dans $ newPrenom
            //$this represente toujours l'object en cours (celui qui vient d'etre cree , l'instance de ma classe)
            // il pointe donc avec -> pour atteindre la propriete de mon objet (celui en cours) 
            $this->prenom = $newPrenom;
        }else{
            // dans le cas ou la condition n'est pas respecter alors j'affiche un msg d'erreur a l'user pour lui dire qu'il doit ecrire autre chose 
            // ce msg est volontairment 'moche' j'aurais pu faire comm en procedural , un msg beacoups plus agreable a l'affichage 
            // je ne fait que montrer un autre maniere de generer un msg d'erreur 
            trigger_error('Cela ne correspond pas à ce qui est attendu pour ce champ',E_USER_DEPRECATED);
        };
    }
    public function setNom($newNom){
        if(is_string($newNom)){
            $this->nom = $newNom;
        }else{
            trigger_error('Cela ne correspond pas à ce qui est attendu pour ce champ',E_USER_DEPRECATED);
        };
    }

    public function getPrenom(){
       return $this->prenom;
    }

    public function getNom(){
       return $this->nom;
    }



}
//j'instancie ma class Membre en creean un object $Membre, $this va etre son represantant dans la classe (ligne 17 de ce fichier)
$Membre = new Membre;
var_dump($Membre);
echo '<pre>'; print_r(get_class_methods($Membre)); echo '</pre>';
//pour doner une valeur a la propriete$prenom de l'objet je doit utiliser la function/methode setPrenom je lui donne entre parentaise l'argument qu'elle attend obligatoirement . sinon erreur le code ne s'execute pas cette argument servira  de valeur, si la confition rest repecter 
$Membre -> setPrenom('Glen');
var_dump($Membre);
echo '<br>';
// nouvelle instance de ma class, et donc nouvelle object
$Membre2 = new Membre;
$Membre2 -> setPrenom('Yamato');
// le var_dump qui indique que la valeur precedamment envoyer n'impacte que l'objet $membre et non pas $membre2
var_dump($Membre2);
echo '<br>';

echo $Membre2 -> getPrenom() .'<br>';

$Membre2 -> setNom('Andô');
echo $Membre2 -> getNom() .'<br>';
echo "<Mon nom est>".  $Membre -> getPrenom()  .' '.$Membre2 -> getNom() . '<br>';
var_dump($Membre2);










