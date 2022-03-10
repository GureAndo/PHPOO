<?php 

//jouvre une session(pour recuperer ce qu'il ya dans le panier)
session_start();
// si une action est passer dans url et qu'elle  est egale a delete alors je vide la panier avec unset()
// si l'etats actuelle ce code est bien organiser mais il il aurais etais plus bas alors j'aurais du faire un double click sur videe le panier pour que l'affichage du tableau soit retirer et que le button  cree le panier s'affiche a nouveau
if(isset($_GET['action']) && $_GET['action']== "delete"){
    unset($_SESSION['panier']);
}
// si quelqu'un click sur cree le panier (ce que je recupere dans l'url un action  = create) ou si une session panier est deja existante alors j'affiche le contenue dsdu panier(les indice 26 27 28 separer par un tiré dans mon implod()). j'aimerais aussu un lien qui vide le panier
if(isset($_GET['action'])&& $_GET['action']== "create" || isset($_SESSION['panier']) ){

    $_SESSION['panier'] = array(26,27,28);
    echo "indice des produit pressent dans le panier :" . implode(' - ', $_SESSION['panier']) . '<br>';

    echo "<a href ='?action=delete'>Vider le panier</a>";

}else{
    //si par contre personne n'a clicqer sur le lien crée et qu'aucune session n'existe alors j'affiche le lien cree panier
    //c'est le cas l'orsque on affiche la premiere fois la page 
    echo "<a href ='?action=create'>Creer le panier</a>";
}

