<?php 


//le nom d'un fichier doit avoir le meme nom que la class mais contrairement a java pas besoin de respecter la majuscule en debut de nom de fichier.il doit y avoir par convention 1 fichier par class
class panier {
    // j'inisialise une proprieter de visibiliter 'public'
    // en poo(programation orienter objet), une proprieter et le le nom de substitution de variable en gros proprieter = variable
    public $nbProduit;
    // je declare ma 1er methode , visibliliter publique qui retourne une string (methode = function)
    public function ajouterpanier( ){
        return "le prorduit a bien été ajouter <br>";
    }
    // je declare une 2nd methode , visibiliter protect, qui retourne aussi un string
    protected function retirerDuPanier(){
        return "le prorduit a bien été retiré du panier <br>";
    }
    //je declare une 3em methode , visibiliter private , qui aussi retourne une string
    private function afficherProduit(){
        return "voici la page qui affiche les produits <br>";
    }
    //ces 3 methode differante de visibilité permette de proteger (ou pas) le code. je devrais donc selon les cas de figure , utiliser une syntaxe specifique pour utiliser mes proprieter/ methode selon leur visibiliter

    public function getDelete(){
        return $this -> retirerDuPanier();
    }

    public function getAfficher(){
        return $this -> afficherProduit();
    }
    
}
//je ne peut apeller ainsi, directement, une proprieter ou une methode de ma class 
//pour exploiter le contenu de ma classe je doit instencier cette dite class avec un object ex = $panier = new panier
$panier = new panier;
// le var_dump de mon objet m'indique que c'est donc bien un object de ma class panier . qui lui a ete atribuer  l'id #1 . qu'il contient un proriteter et que cette prorieter  ne recoit pour l'instant aucune valeur (NULL) 
echo '<pre>'; var_dump($panier); echo '</pre>';
//mon print_r m'indique que mon objet contien une methode (qui a l'indice 0) il ne peut me pas me montrer les 2 autre methode car elles ont une viisibiliter preotect et private
echo '<pre>'; print_r(get_class_methods($panier)); echo '</pre>';
echo $panier -> ajouterpanier();
// pour affecter une valeur a la propieter nbProduit de l'objet $panier  je pointe -> l'objet vers cette proprietrer et je lui affecte une valeur avec le = 
//j'ai affecter la valeur de la proprieter de l'objet et pas celle de la class . LA CLASS NE DOIT JAMAIS ETRE MODIFIER 
echo $panier -> nbProduit = 5;
echo '<pre>'; var_dump($panier); echo '</pre>';
// desormer sa valeur ne sera plus NULL
//je cree un nouvel objet de lma class panier  son var_dump  m'indique que aucune valeur  a ete affectere a $nbProduit (NULL) c'est la preuvent que la valeur 5 affecté tout a l'heure  a impacter la proprieter est rester inisialiser mais tjr sans aucune valeur  
$test = new panier; 
echo '<pre>'; var_dump($test); echo '</pre>';
echo 'il ya ' . $panier -> nbProduit = 5 ; echo' produits <br>';
// je peut recuperer  le contenue de cette methode ; en dehort de la classe car elle a une visibiliter public
// visibiliter public permet d'y acceder  dans la class dans une classe qui herite et en degors de la classe
echo $panier -> ajouterpanier();
// je ne peut pas acceder en dehors de la classe 'panier aux deux autre methode 
//la visibiliter protect permet d'y acceder a linterieur de la classe et dans une classe qui en a heriter 
// echo $panier -> retirerDuPanier ();
// la visibiliter private permet dy acceder uniquement a l'interieur de la class (pas en dehor et pas dans une classe qui a heriter)
// echo $panier -> afficherProduit();
echo $panier -> getDelete();
echo $panier -> getAfficher();
//extend me permet de dire que la classe produit herite de ma class panier
class Produit extends Panier{
    // ma methode protect fonctionne bien avec ma classe qui a heriter 
}
$produit = new Produit;
echo $produit -> getDelete();









