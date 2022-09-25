<?php
util::initPanier();
/**
 * @var PdoLafleur $pdo
 */

function voirCategories($pdo)
{
    $lesCategories = $pdo->getLesCategories();
    include("vues/v_categories.php");

}

function voirProduits($pdo)
{
    $lesCategories = $pdo->getLesCategories();
    include("vues/v_categories.php");
    $categorie = $_REQUEST['categorie'];
    $lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
    include("vues/v_produits.php");

}

function ajouterAuPanier($pdo)
{
    $idProduit = $_REQUEST['produit'];
    $categorie = $_REQUEST['categorie'];

    $ok = util::valideAjouterAuPanier($idProduit);
    if (!$ok) {
        $message = "Cet article est déjà dans le panier !!";
    } else {
        $message = "Cet article est enregistré dans le panier !!";
    }
    include("vues/v_message.php");
    $lesCategories = $pdo->getLesCategories();
    include("vues/v_categories.php");
    $lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
    include("vues/v_produits.php");
}



