<?php
// je declare une methode qui va prendre  un argument 
function inclutionAuto($nomDeClass){
    //je fait un var_dump de l'argument $nomDeClass je dit qu'il a bien receptionner la lettre A
    // echo'<pre>'; var_dump($nomDeClass); echo'</pre>';
    // echo 'sa marche, ';
    // require_once 'A.class.php';
    //le require_once ci -dessous me permet de recuperer le fichier ou est declarer la class A pour ecer l'erreur UNcaugth error : Class 'A' not found
    // le require_once ci-dessou me permet de recupererla totaliter des fichier.class grace a la concatenation du $nomDeClass + .class.php 
    require_once($nomDeClass . '.class.php');
}
// la fonction predefini spl_autoload_register est programmée pour faire 2 chose 
//- s'exectuter des qu'un object est instencier (des suelle lis le new dans notre projet)
//- stocker en mémoire tout ce qui suis le mot new(dans cette exemple la lettre A mais cela peut etre un nom de class, un namespace + sa class ect ....)
//-Je donne en argument a spl_autoload_register le nom de ma function
// ainsi, ma function va recuperer dans son argument ce que a stoker spl_autoload_register apres le mot new
spl_autoload_register('inclutionAuto');
// $A = new A;
// $A = new B;
// $A = new C;
// $A = new D;