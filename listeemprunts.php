<?php
    require_once('connexion.php');

    // Requête SQL pour récupérer tous les emprunts avec les informations sur les livres, les abonnés et les catégories
    $sql = "SELECT e.*, l.titre AS titreLivre, l.auteur AS auteurLivre, l.datepublication, l.exemplaires, 
            a.nom AS nomAbonner, a.prenom AS prenomAbonner, 
            c.nomCategorie AS categorieLivre
        FROM emprunts e
        INNER JOIN livres l ON e.isbnLivre = l.isbnLivre  /* Remplacez 'l.isbnLivre' par le nom correct de la colonne de la clé primaire */
        INNER JOIN abonnes a ON e.idAbonner = a.idAbonner
        INNER JOIN categories c ON l.idCategorie = c.idCategorie";

    $stmt = $pdo->query($sql);
    $emprunts = $stmt->fetchAll();

    // Vérifier et formater les dates pour les affichages si nécessaire
    foreach ($emprunts as &$emprunt) {
        $emprunt['dateemprunt'] = date('d-m-Y', strtotime($emprunt['dateemprunt']));
        $emprunt['dateretour'] = date('d-m-Y', strtotime($emprunt['dateretour']));
        $emprunt['dateretourreelle'] = $emprunt['dateretourreelle'] !== '0000-00-00' ? date('d-m-Y', strtotime($emprunt['dateretourreelle'])) : 'Non retourné';
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Liste des Emprunts</title>

    <style>
        .nav-link{
            color: rgb(26, 43, 72) !important;
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link:hover{
            color: rgb(0, 123, 255) !important;
        }
        .nav-link.active {
            color: rgb(255, 255, 255) !important;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 3px;
            background-color: rgb(255, 255, 255);
        }
        .buttons{
            background-color: rgb(26, 43, 72);
            border-color: rgb(26, 43, 72);
            color: white !important;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .buttons:hover{
            background-color: white;
            border-color: rgb(26, 43, 72);
            color: black !important;
        }
        .navbar-collapse {
            transition: max-height 0.3s ease;
        }
        th {
            background-color: rgb(26, 43, 72);
            color: white;
            text-align: center;
        }
        td {
            text-align: center;
        }
        .table-container {
            margin-top: 30px;
        }
    </style>

</head>
<body>

    <header>
        <div class="container-fluid">
            <div class="row d-flex justify-content-around bg-white align-items-center shadow-lg mb-5 bg-body rounded" style="height: 80px;">
                <div class="col-2 h-50">
                    <a href="accueil.html.php"><img src="images/loo.jpg" alt="logo" class="h-100 logo img-fluid"></a>
                </div>
                <div class="col-7 h-50 d-flex justify-content-end">
                    <nav class="navbar navbar-expand-lg ms-5">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="accueil.html.php">ACCUEIL</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="abonnes.php">ABONNES</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">LIVRES</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="ajoutcategorie.php">AJOUTER UNE CATEGORIE</a></li>
                                            <li><a class="dropdown-item" href="ajoutlivre.php">AJOUTER UN LIVRE</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">EMPRUNTS</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="empruntlivre.php">EMPRUNTER UN TITRE</a></li>
                                            <li><a class="dropdown-item" href="retourlivre.php">RETOURNER UN LIVRE</a></li>
                                            <li><a class="dropdown-item" href="#">EMPRUNTS EN COURS</a></li>
                                            <li><a class="dropdown-item" href="#">EMPRUNTS ECHUS</a></li>
                                            <li><a class="dropdown-item" href="#">LIVRES LES PLUS EMPRUNTES</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <a href="deconnexion.php">
                                    <button type="button" class="btn btn-white ms-5 buttons">Deconnexion</button>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container table-container">
        <h1 class="mt-5">Liste des Emprunts</h1>

        <?php if (count($emprunts) > 0): ?>
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col">Titre du Livre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Nom de l'abonné</th>
                    <th scope="col">Prénom de l'abonné</th>
                    <th scope="col">Date Emprunt</th>
                    <th scope="col">Date Retour</th>
                    <th scope="col">Date Retour Réelle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emprunts as $emprunt): ?>
                <tr>
                    <td><?= htmlspecialchars($emprunt["titreLivre"]); ?></td>
                    <td><?= htmlspecialchars($emprunt["auteurLivre"]); ?></td>
                    <td><?= htmlspecialchars($emprunt["nomAbonner"]); ?></td>
                    <td><?= htmlspecialchars($emprunt["prenomAbonner"]); ?></td>
                    <td><?= htmlspecialchars($emprunt["dateemprunt"]); ?></td>
                    <td><?= htmlspecialchars($emprunt["dateretour"]); ?></td>
                    <td><?= htmlspecialchars($emprunt["dateretourreelle"]); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>Aucun emprunt trouvé.</p>
        <?php endif; ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
