<?php
    require_once('connexion.php');
    $book=$pdo->query('SELECT * FROM livres')->fetchAll();
    $ctgr=$pdo->query('SELECT * FROM categories')->fetchAll();

    $categoriesById = [];
    foreach ($ctgr as $cat) {
        $categoriesById[$cat['idCategorie']] = $cat['nomCategorie'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.min.css">
    <title>Liste des Livres</title>

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
        .table {
            background-color: white;
            border: 1px solid rgb(26, 43, 72);
        }

        .table th {
            background-color: rgb(26, 43, 72);
            color: white;
            text-align: center;
        }

        .table td {
            color: rgb(26, 43, 72);
            text-align: center;
            border: 1px solid rgb(26, 43, 72);
        }

        .table tr:nth-child(even) {
            background-color: rgb(235, 242, 250);
        }

        .table tr:hover {
            background-color: rgb(26, 43, 72);
            color: white;
        }
        .search-container {
            background-color: rgb(235, 242, 250);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .search-label {
            font-weight: bold;
            color: rgb(26, 43, 72);
        }
        .search-input {
            border: 2px solid rgb(26, 43, 72);
            border-radius: 5px;
            padding: 10px;
        }
        .search-input:focus {
            border-color: rgb(26, 43, 72);
            box-shadow: none;
        }
        .search-button {
            background-color: rgb(26, 43, 72);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .search-button:hover {
            background-color: rgb(38, 59, 98);
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="search-container">
                    <form action="listelivres.php" method="post">
                        <div class="mb-3">
                            <label for="recherche" class="search-label form-label">Rechercher un Livre</label>
                            <input type="text" name="recherche" class="form-control search-input" id="recherche" placeholder="Entrez le titre ou la catégorie">
                        </div>
                        <button type="submit" name="valider" class="btn search-button w-100">RECHERCHER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 

        if (isset($_POST["valider"])) {
            $recherche = $_POST["recherche"];

            $stmt = $pdo->prepare('SELECT * FROM categories WHERE nomCategorie = :recherche');
            $stmt->execute(['recherche' => $recherche]);
            $categorie = $stmt->fetchAll();

            if (count($categorie) > 0) {
                $book = $pdo->prepare('SELECT * FROM livres WHERE idCategorie = :idCategorie');
                $book->execute(['idCategorie' => $categorie[0]["idCategorie"]]);
                $book = $book->fetchAll();
            } else {
                $book = $pdo->prepare('SELECT * FROM livres WHERE titre LIKE :recherche');
                $book->execute(['recherche' => '%' . $recherche . '%']);
                $book = $book->fetchAll();
            }
        }
    ?>

    <?php if(count($book) > 0): ?>

    <div class="container">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Date de publication</th>
                    <th scope="col">Nombre d'Exemplaires</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($book as $livres): ?>
                    <tr>
                        <td><?php echo $livres['titre']; ?></td>
                        <td><?php echo $livres['auteur']; ?></td>
                        <td>
                            <?php
                            if (isset($categoriesById[$livres['idCategorie']])) {
                                echo $categoriesById[$livres['idCategorie']];
                            } else {
                                echo 'Catégorie inconnue';
                            }
                            ?>
                        </td>
                        <td><?php echo $livres['datepublication']; ?></td>
                        <td><?php echo $livres['exemplaires']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php else: ?>
        <div class="container">
            <p>Le tableau ne contient aucun élément.</p>
        </div>
    <?php endif; ?>
</body>
</html>
