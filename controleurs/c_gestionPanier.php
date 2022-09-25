<?php

function voirPanier($pdo)
{
    $n = util::nbProduitsDuPanier();
    if ($n > 0) {
        $desIdProduit = util::getLesIdProduitsDuPanier();
        $lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
        include("vues/v_panier.php");
    } else {
        $message = "panier vide !!";
        include("vues/v_message.php");
    }
}

function supprimerUnProduit($pdo)
{
    $idProduit = $_REQUEST['produit'];
    util::retirerDuPanier($idProduit);
    $desIdProduit = util::getLesIdProduitsDuPanier();
    $lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
    include("vues/v_panier.php");

}

function passerCommande($pdo)
{
    $ok = util::ajouterQuantites($_REQUEST);
    $n = util::nbProduitsDuPanier();
    if ($n > 0) {
        $nom = '';
        $rue = '';
        $ville = '';
        $cp = '';
        $mail = '';
        include("vues/v_commande.php");
    } else {
        $message = "panier vide !!";
        include("vues/v_message.php");
    }
}

function confirmerCommande($pdo)
{
    $nom = $_REQUEST['nom'];
    $rue = $_REQUEST['rue'];
    $ville = $_REQUEST['ville'];
    $cp = $_REQUEST['cp'];
    $mail = $_REQUEST['mail'];
    $msgErreurs = util::getErreursSaisieCommande($nom, $rue, $ville, $cp, $mail);
    if (count($msgErreurs) != 0) {
        include("vues/v_erreurs.php");
        include("vues/v_commande.php");
    } else {
        $lesIdProduit = util::getLesIdProduitsDuPanier();
        $pdo->creerCommande($nom, $rue, $cp, $ville, $mail, $lesIdProduit);
        $message = "Commande enregistrée";
        util::supprimerPanier();
        include("vues/v_message.php");
    }
}






