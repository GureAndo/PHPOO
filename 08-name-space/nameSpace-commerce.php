<?php
//1er maniere de déclarer une nameSmapce, la plus habituelle
//1fichier = 1 namespacce comme pour les class
namespace Commerce1;
//seconde facon de declarer un namespace, moins utiliser , avec des acoladepuis a l'interieurtout le dde conserner par le name space
/*-----------------------------------------------------------*/
// namespace Commerce1{

//     class Boutique{

//     }

// };
/*------------------------------------------------------------*/
//class commande qui apartient au namespace = Commerce1
class Commande{

    public  $nbCommandes = 3;
}
// pour l'exemple on ouvre un 2eme namespace je ne suis plus dans celui Commerce 1 la class Produit appartien au namespace Commande2 
namespace commerce2;

class Produit{
    public $nbProduits = 22;
}

// declaration d'un 3e namespace

namespace Commerce3;

class Panier{
    public $nbProduitPanier = 4;
}
// cette class a le meme nom que celle qui est dans le namespace Commerce2 mais cela ne pose aucun probleme TAnt qu'elle ne sont pas declarer dans le meme namespace
class Produits{
    public $nbProduits = 5;
}