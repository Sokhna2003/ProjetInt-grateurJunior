<?php
    require_once('connexion.php');
    extract($_POST);

        $stmt = $pdo->prepare("SELECT * FROM abonnes WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            echo "
            <script>
                if (confirm('Vous êtes déjà inscrit avec cet email. Souhaitez-vous mettre à jour votre profil ?')) {
                    window.location.href = 'profil.php?id=".$existingUser['idAbonner']."'; 
                } else {
                    window.location.href = 'abonnes.php';
                }
            </script>";
            exit;
        }

    $idRole = $pdo->query("SELECT idRole FROM `role` WHERE libelleRole='user'")->fetchColumn();

    $insert_Data = 'INSERT INTO abonnes (nom,prenom,adresse,telephone,email,motdepasse,idRole)  
    VALUE (:nom,:prenom,:adresse,:telephone,:email,:motdepasse,:idRole)';
        $envoi_Data = $pdo->prepare($insert_Data);
        // var_dump($envoi_Data);die;
        $envoi_Data->execute([
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':adresse'=>$adresse,
            ':telephone'=>$telephone,
            ':email'=>$email,
            ':motdepasse'=>$motdepasse,
            ':idRole'=>$idRole
        ]);

        
    header("location:profil.php");        
?>
  