
<?php
/**
 * @var PdoLafleur $pdo
 */

    function connecter()
    {
        include 'vues/v_connexion.php';

    }
    function valider($pdo)
    {
        $login=$_REQUEST['login'];
        $mdp=$_REQUEST['mdp'];
        $val=$pdo->countLogin($login,$mdp);
        $message=($val[0]==0)?"connexion invalide":"connexion réussie";
        echo $message;
    }








