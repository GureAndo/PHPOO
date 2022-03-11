<?php 
namespace controller;

use LDAP\Result;

class Controller{
    // propriété privé qui servira de lien entre ce qui sera codé dans le class EntityRepository et la class Controller
    //elle servira par exemple a récuupérer toutes les donée qui serviront à ce connecter a notre BDD
    private $dbEntityRepository;
    //construct de la class controller qui va instencier la class EntityRepository ,et cree donc un objet dbEntityRepository qui nous servira a recuperer toutes les proptieter et methode de la class EntityRepository
    public function __construct(){
        // echo "Instanciation de la class Controller OK^^";
        //je cree un object dbEntityRepository de ma class EntityRepository (en passant par son name space pour qu'elle soit disponible)
        $this->dbEntityRepository = new \model\EntityRepository;
    }
    //cette methode va permetre de gerer l'action de l'utilisateur 
    //cette utilisateur voudra t-il  ajouter un employer? voir sla fiche employer ? supprimer la fiche ect..
    // le controller avec cette methode va faire pivot entre la volonter de l'user(en fronte sur dans le dossier view) et les requete dont je vais avoir besoin , codée dans EntityRepository
    public function handleRequest(){
       //condition ternaire pour verifier si une donnees a transiter dans l url si c'est TRUE je declare un var $choixUser qui va contenir cette valeurs que je recupere dans l'url 
        $choixUser = isset($_GET ['choixUser'])? $_GET['choixUser'] : NULL;
        // segonde syntaxe de la condition
        // if(isset($_GET['choixUser'])){
        //     $choixUser = $_GET['choixUser'];
        // }
        try{
            //si loe user veut ajouter ou modifier la fiche d'un employer
            if($choixUser  == 'add' || $choixUser == 'update' ){
                //je code une methode save()
                $this->save($choixUser);
            //si le user veut voir la fiche d'un seul employer    
            }elseif($choixUser=='select'){
                //je code une methode select()
                $this->select();
            //si le user veut supprimer un employer    
            }elseif($choixUser=='delete'){
                //je code une methode delete 
                $this->delete();
            // si le user vient d'arriver sur la page et que dans l url le 'choixUser' = Null 
            }else{
                //je code un methode selectAll()
                $this->selectAll();
            }     
        }
        catch(\Exception $erreur){
            echo "Error 404 Not Found" . $erreur->getMessage() . "<br> cela ne respecte pas le code a la ligne " . $erreur->getLine() ." du fichier " . $erreur->getFile() . '<br>';
        }
    }
    //methode render qui va gerer l'affichage sur mon site
    //elle va gerer 3 paramtres
    //le layout: c'est l'affichage global de mon site, toutes les pages en auront besoin
    //les templates :  ca sera l'affichage particulier de chaque page  ils trouveront leur place dans le layout global
    //parametres/contenu : qui sera formé de divers donnees comme dans l'example de l'affichage d'un tableau on recuperera des donnes en bdd pour les afficher dans leur templates
    public function render($layout,$template,$parameters = array()){
        //extract est une function predefinie qui permet d'extraire les donnees d'un tableau sans passer par le nom du tableau puis de crocheter a l'indice voulue
        //$parameters['prenom'] deviendra $prenom  $parametres['nom'] deviendra $nom ect 
        extract($parameters);
        //mise en place d'un procedure pour envoyer les divers information sur une page je doit donc envoyer un layout, un template et des donnees . Comme toutes les information  ne s'affiche pas en méme temps(en tant que developper, par pour l'utilisateur. pour ce dernier tout s'affichera en meme temps)
        //--------------------------
        //ce processus de mise en memoire commence avec ob_start
        //je fait un require_once poure recuperer le template dont j'aurais besoin , pour l'inserer dans le layout gabarit
        ob_start();
        require_once("view/$template");
        //comme ce template ne va pas s'afficher en meme temps que mon layout, je le conserve dans une variable ($content)
        $content = ob_get_clean(); 
        //je recomence le processus de mise en memoire  pour le layout 
        ob_start();
        //je fait aussi appelle  a un require pour recupere de dossier view par contre pas besoin de le garder dans une var il sera deployer en 1er, immediatement 
        require_once("view/$layout");
        //je fait un return avec la function predefini ob_end_flush() pour liberer cette affichage dans le navigateur
        //c'est la fin du processus de mise en memoire de divers elemenjt necessaire a l'affichage de me page 
        return ob_end_flush();
    }
    //methode qui va permetre l'affichege du tableau regroupant les employer
    public function selectAll(){
        // echo' Methode selectALL() | Affichage de tout les employer';
        // $resultat = $this->dbEntityRepository->selectAllEntityRepo();
        // echo '<pre>';print_r($resultat);echo'</pre>';
        //j'utilise ma methode render()
        //je renseigne les argument dont elle a besoin c'est a dire le nom du layoute quelle doit utiliser et le nom du template
        //en dernier sous forme de tableau, differante donner. je declare un indice au quel j'affecte une valeur
        //je peut en declarer autant que je veut
        $this->render('layout.php', 'affichage-employes.php',[
            'title' => "Affiche tout les employer",'data' =>$this->dbEntityRepository->selectAllEntityRepo(),
            'fields' => $this->dbEntityRepository->getFields()
            
        ]);
    }
    //methode permmetant de selectionner de la fiche d'un seul employer
    public function select(){
        echo' Methode select() | Affichage d\' un seul employer';
    }
    //methode permetant l'affiche d'un formulaire d'ajout ou de modification d'un employer
    public function save(){
        echo' Methode save() | Affichage d\'un formulaire d\'ajout ou de modification';
    }
    //methode qui va permettre la supprtion d'un employer(demitionner, retraiter ect.....)
    public function delete(){
        echo' Methode delete() | suppresion de la fiche employer';
    }
}
