<?php
namespace model;
//entity rprésente une table sql (table en bdd) et repository represente les classes qui vont contenir les requete dont aura besoin le site 
class EntityRepository{
    //propriété priver qui va stocker tout les infos lieés à la conenxion avec la BDD
    private $pdo;
    //propriété public qui permettra de stocker le nom de la table dont on aura besoin pour faire nos requetes
    public $table;
    // méthode qui va permmettre de récupérer les information dans le private $pdo au dessus 
    public function getPdo(){

        //elle va d'abord vérifiersi on  n'est pas connecé (!this->pdo .... ne pointe pas vers la propriéte $pdo)
        if(!$this->pdo){
            // dans ce cas la, on va devoir se connecter aà la BDD
            //je vais tester la connexion à ma BDD dans un try / catch
            //cela me permet de cibler + vite pourquoi je n'ai pas reussi a ma connecter à la BDD
            try{
                $xml = simplexml_load_file('app/config.xml');
                // echo "<pre>";print_r($xml);echo"</pre>";
                //je recuperer la valeur de table dans config.xml pour l'affecter a ma public protieter table (en pointent vers elle avec $this)
                $this->table = $xml->table;

                try{
                    $this->pdo = new \PDO("mysql:host=$xml->host;dbname=$xml->dbname","$xml->user","$xml->password", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,  \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    // echo'connexion etablie';
                }

                catch(\PDOException $erreur){
                    echo "Error DataBase UNKNOWN " . $erreur->getMessage() . " le probleme vient peut etre du fichier.xml verifier les donnees contenue<br> cela ne respecte pas le code a la ligne " . $erreur->getLine() ." du fichier " . $erreur->getFile() . '<br>';
                }
            }
            //si la connexion ne reussi pas, je recupere un message dans le block catch
            // je recupere une erreur de type exception et je pourais recuperer diverse infos(tels que le nom du fichier , le numero de la ligne ou le bug s'est produits ect...)
            // je mets un anti slash devant Exception , sinon il ne la reconnais pas Elle vu quel ne se trouve pas dans le namespace // et le \; je retourne dans l'space globale, ou elle sera reconue 
            catch(\Exception $erreur){
                echo "imposible de recuperer le contenue du fichier Xml. Error " . $erreur->getMessage() . "<br> il ya une erreur a la ligne " . $erreur->getLine() ." du fichier " . $erreur->getFile() . '<br>';
            }
        }
        // si on est deja conneté (le else) va retourner les informations contenue dans $pdo
        return $this->pdo;
    }

    public function selectAllEntityRepo(){
        $data = $this->getPdo()->query("SELECT * FROM  $this->table");
        // equivalent a la snytaxe php procedural ($this->getPdo =$pdo)
        // $data = $pdo->query('SELECT * FROM employe');

        // apres avoir fait le query je fait obligatoirementle fetch
        $afficheTousLesEmployes = $data->fetchAll(\PDO::FETCH_ASSOC);
        // je retourne le resultat
        return $afficheTousLesEmployes;
    }
    
    public function selectEntityRepo(){
        ;
    }

    public function saveEntityRepo(){
       ;
    }
    
    public function deleteEntityRepo(){
        ;
    }

    public function getFields(){
        $data =$this->getPdo()->query("DESC " . $this->table);
        $afficheEntetes = $data->fetchAll(\PDO::FETCH_ASSOC);
        return $afficheEntetes;
    }

}
$et = new EntityRepository;
$et->getPdo();