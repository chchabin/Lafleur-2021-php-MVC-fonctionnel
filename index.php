<?php
session_start();
// Changer la variable Etat pour la production
const Etat = 'dev';
require_once("util/fonctions.inc.php");
require_once("util/class.pdoLafleur.inc.php");
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;
if (Etat=='dev'){
    //tests unitaires uniquement en development à supprimer en production
    include 'tests/fonctionTest.php';
}

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

if(isset($_REQUEST['action']))
$action = $_REQUEST['action'];

$pdo = PdoLafleur::getPdoLafleur();	 
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'voirProduits' :
		{include("controleurs/c_voirProduits.php");
		   $action($pdo);
		    break;}
	case 'gererPanier' :
		{ include("controleurs/c_gestionPanier.php");
            $action($pdo);
            break; }
	case 'administrer' :
	  { include("controleurs/c_gestionProduits.php");
          $action($pdo=null);
	      break;  }
}
include("vues/v_pied.php") ;


