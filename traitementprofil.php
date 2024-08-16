<?php
    require_once('connexion.php');
    session_start();

    extract($_POST);

    if (isset($email) && isset($motdepasse)) {
        $query = 'SELECT * FROM abonnes WHERE email = :email AND motdepasse = :motdepasse';
        $statement = $pdo->prepare($query);
        $statement->execute([
            ':email' => $email,
            ':motdepasse' => $motdepasse,
        ]);
        
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $_SESSION['user'] = $user;
            
            if ($user['idRole'] == 2) { 
                header("Location: listeabonnes.php");
            } else {
                
                header("Location: accueil.html.php");
            }
            exit();
        } else {
        
            echo "Identifiant ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
?>
