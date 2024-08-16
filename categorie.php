<?php
    require_once('connexion.php');
    extract($_POST);


    $insert_Data = 'INSERT INTO categories (nomCategorie)  
    VALUE (:nomCategorie)';
        $envoi_Data = $pdo->prepare($insert_Data);
        // var_dump($envoi_Data);die;
        $envoi_Data->execute([
            ':nomCategorie'=>$nomCategorie
        ]);

      
    header("location:listecategories.php");        
?>