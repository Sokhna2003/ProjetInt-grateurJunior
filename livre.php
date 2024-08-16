<?php
    require_once('connexion.php');
    extract($_POST);
    $insert_Data = 'INSERT INTO livres (titre,auteur,idCategorie,datepublication,exemplaires)  
    VALUE (:titre,:auteur,:idCategorie,:datepublication,:exemplaires)';
        $envoi_Data = $pdo->prepare($insert_Data);
        // var_dump($envoi_Data);die;
        $envoi_Data->execute([
            ':titre'=>$titre,
            ':auteur'=>$auteur,
            ':idCategorie'=>$idCategorie,
            ':datepublication'=>$datepublication,
            ':exemplaires'=>$exemplaires
        ]);

        
    header("location:listelivres.php");        
?>