<?php



class test{ 
    public $erreur404;
    //declaration d'un tableausans data
    public $tableau = array();    
    //declaration d'un tab avec data
    public $tabPersonage = array('Cloud', 'Zack', 'Sephiroth', 'Angeal', 'Genesis', 'Tifa', 'Aeris');  
    //le but de la fonction est de rechercher, dans un tableau (l'argument attendu) et (l'elements a lui fournir)
    public function recherche($tab, $elements){ 
        // si le 1er argument n'est pas un tableau, je genere un msg d'ErRoOr 
        if(!is_array($tab))
         //trow va permettre de envoyer le msg d'erreur sur le bloc catch que l'on a pas encore codee
         //la class exception genere un msg d'erreur de type particulier
            throw new Exception("ce n'est pas un tableau ERROR 404 NOT FOUND");
         //si le tableau ne contien pas les donner , je genere un autre msg d'erreur.
         //a la place de sizeof on autrais pu utiliser count()   
        if(sizeof($tab) == 0)
            throw new Exception('ce tableau est vide');
         // si $tab represente bien un tableau et si il n'est pas vide alor array_search va me retrouver cet element dans mon tableau, me donner son indice que je conserve dans $ position
        $position = array_search($elements, $tab);
         //je fait un return de $ position pour recuperer l'indice
        return $position;   
    }
    
    
}


$expeption = new test; 
$expeption ->tabPersonage ;
//print_r du segont table pour verifier les indice de nos perso 
echo"<pre>";print_r($expeption->tabPersonage);echo"</pre>";
//bloc try pour tester mon code
try{
    // je test mon code et je vois si il respecte les condition  de la methode recherche
    //celui ci fonctionne il me retourne l'indice de sephiroth
    echo'<br> Le personage sephiroth a l indice '.   $expeption-> recherche($expeption->tabPersonage, 'Sephiroth'). "<br>";
    // nouveau test avec le 1er table celui ci ne fonctionne pas car il est vide
    echo'<br> Le personage sephiroth a l indice '.   $expeption-> recherche($expeption->erreur404, 'sephiroth'). "<br>";
}
//block catch qui s'execute si le try ne respect pas les condition
catch(Exception $Erreur){
    // malgré que le second test n'a pas fonctionné, je n'ai pas reçu de message d'erreur
    // si je fais un print_r de $erreur, je m'aperçois que le message d'erreur codé à la ligne 15 a bien été récupéré dans l'argument $erreur
    // je dois en fait codr un message d'erreur dans mon bloc catch pour récupérer celui de la ligne 20

    //avec le get class method je vois que l'object $ erreura sa disposition un methode pour recuperer le message stocker (getMessage), recuperer la ligne ou l'erreur a ete comisent get line pour la ligne et et le getFile pour le fichier
    //je peut ainsi generer un msg plus precisz (a metre en forme dans le  fichier style.css en lui donnant par exemple  un BGColor red , centrant le texte ect.....) 
        //echo '<pre>';print_r($Erreur);echo'</pre>'; 
        //echo '<pre>';print_r(get_class_methods($Erreur));echo'</pre>'; 
   echo 'Error: ' . $Erreur->getMessage() . "<br> cela ne respecte pas le code a la ligne " . $Erreur->getLine() ." du fichier " . $Erreur->getFile() . '<br>';
}
//second exemple , je test dans le try, la conexion a ma BDD
try{
    // si elle est reussi le echo try va s'afficher
    $pdo = new PDO('mysql:host=localhost;dbname=voiure','root', '');
    echo'Connexion établie a la database';
}

catch(PDOException $Erreur){
    // echo '<pre>';print_r(get_class_methods($Erreur));echo'</pre>';
    // echo '<pre>';print_r($Erreur);echo'</pre>';

    //sinon ce msg va s'afficher, en me donnant la ligne ou j'ai tenter de le faire, que je devrais aller corriger 
    echo "Error DataBase UNKNOWN " . $Erreur->getMessage() . "<br> cela ne respecte pas le code a la ligne " . $Erreur->getLine() ." du fichier " . $Erreur->getFile() . '<br>';

}

