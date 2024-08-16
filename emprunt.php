<?php
    session_start();
    require_once('connexion.php');
    
    if (!isset($_SESSION['user'])) {
        echo "
        <script>
            alert('Veuillez vous inscrire pour emprunter un livre.');
            if (confirm('Voulez-vous vous inscrire maintenant ?')) {
                window.location.href = 'abonnes.php';
            } else {
                window.history.back();
            }
        </script>";
        exit;
    }

    $user = $_SESSION['user'] ;
    extract($_POST);

    $insert_Data = 'INSERT INTO emprunts (isbnLivre,idAbonner,dateemprunt,dateretour,dateretourreelle)  
    VALUE (:isbnLivre,:idAbonner,:dateemprunt,:dateretour,:dateretourreelle)';
        $envoi_Data = $pdo->prepare($insert_Data);
        // var_dump($envoi_Data);die;
        $envoi_Data->execute([
            ':isbnLivre'=>$isbnLivre,
            ':idAbonner'=>$user["idAbonner"],
            ':dateemprunt'=>date('Y-m-d'),    
            ':dateretour'=>date('Y-m-d', strtotime('+14 days')),
            ':dateretourreelle'=>0000-00-00
        ]);
        header("location:listeemprunts.php");      
?>
  