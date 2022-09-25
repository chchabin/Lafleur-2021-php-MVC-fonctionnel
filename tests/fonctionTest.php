<?php

function ajouterAuPanierTest(){
    $testProduit=[
        [
            'nom'=>"l'identifiant du produit est déjà dans la variable session",
            'produit'=>'c02',
            'session'=>true,
            'retour'=>false

        ],
        [
            'nom'=>"L'identifiant du produit n'a pas été trouvé",
            'produit'=>'c02',
            'session'=>false,
            'retour'=>true
        ]

    ];
    $_SESSION['produits']=array();
   foreach ($testProduit as $test){
       if ($test['session']){
           $_SESSION['produits'][]=$test['produit'];
           if($test['retour']===util::valideAjouterAuPanier($test['produit'])){
               echo '<h6 style="color: green;">Test : '. $test['nom'] .' OK</h6>';
           }
           else{
               echo '<h6 style="color: red;">Test : '. $test['nom'] .' KO</h6>';
           }
       }

    }
    unset($_SESSION['produits']);
}
