<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
        h2{
            color: rgb(26, 43, 72) !important;
            margin-left: 3rem;
        }
        .button{
            width: 40%;
            background-color: rgb(26, 43, 72);
            border-color: rgb(26, 43, 72);
        }
        .button:hover{
            background-color: white;
            border-color: rgb(26, 43, 72);
            color: black !important;
        }
        .error {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .error-border {
            border-color: red !important;
        }
    </style>

</head>
<body>

    <?php
        require_once('connexion.php');
        $data = $pdo->query("SELECT * FROM categories")->fetchAll();
        
    ?>

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

    <div class="container shadow-lg p-3 mt-5 bg-body rounded">
        <h2>AJOUTER UN LIVRE</h2>
        <form action="livre.php" method="post" id="form" onsubmit="return validateForm()">
            <div class="row d-flex justify-content-around">
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="titre" class="form-label">Titre</label>
                    <input name="titre" type="text" class="form-control" id="titre" aria-describedby="emailHelp">
                    <span class="error" id="titreError"></span>
                </div>
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="auteur" class="form-label">Auteur</label>
                    <input name="auteur" type="text" class="form-control" id="auteur" aria-describedby="emailHelp">
                    <span class="error" id="auteurError"></span>
                </div>
            </div>
            <div class="row d-flex justify-content-around">
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="nomCategorie" class="form-label">Catégorie</label>
                    <select name="idCategorie" id="nomCategorie" class="form-select">
                        <option value="">selectionner une Catégorie</option>
                        <?php
                            
                            try {
                                    
                                foreach ($data as $row) {
                                    echo "<option value='".$row['idCategorie']."'>".$row['nomCategorie']."</option>";
                                }
                            } catch(PDOException $e) {
                                    echo "Error : " . $e->getMessage();
                                }
                        ?>
                    </select>
                    <span class="error" id="categorieError"></span>
                </div>
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="datepublication" class="form-label">Dade de publication</label>
                    <input name="datepublication" type="date" class="form-control" id="datepublication" aria-describedby="emailHelp">
                    <span class="error" id="dateError"></span>
                </div>
            </div>
            <div class="row d-flex justify-content-betwen">
                <div class="mb-3 col-12 col-md-5 col-lg-5" style="margin-left: 3rem;">
                    <label for="exemplaires" class="form-label">Nombre d'Exemplaires</label>
                    <input name="exemplaires" type="number" class="form-control" id="exemplaires" aria-describedby="emailHelp">
                    <span class="error" id="exemplairesError"></span>
                </div>
            </div>
            
            <div class="row d-flex justify-content-around">
                <button type="submit" name="valider" class="btn btn-primary button mt-4">AJOUTER</button>
            </div>
        </form> 
    </div>


        
    <script>
        function validateForm() {
            let isValid = true;

            document.getElementById('titreError').textContent = '';
            document.getElementById('auteurError').textContent = '';
            document.getElementById('categorieError').textContent = '';
            document.getElementById('dateError').textContent = '';
            document.getElementById('exemplairesError').textContent = '';

            document.getElementById('titre').classList.remove('error-border');
            document.getElementById('auteur').classList.remove('error-border');
            document.getElementById('nomCategorie').classList.remove('error-border');
            document.getElementById('datepublication').classList.remove('error-border');
            document.getElementById('exemplaires').classList.remove('error-border');

            if (document.getElementById('titre').value.trim() === '') {
                document.getElementById('titreError').textContent = 'Le titre est obligatoire';
                document.getElementById('titre').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('auteur').value.trim() === '') {
                document.getElementById('auteurError').textContent = 'L\'auteur est obligatoire';
                document.getElementById('auteur').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('nomCategorie').value.trim() === '') {
                document.getElementById('categorieError').textContent = 'La catégorie est obligatoire';
                document.getElementById('nomCategorie').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('datepublication').value.trim() === '') {
                document.getElementById('dateError').textContent = 'La date de publication est obligatoire';
                document.getElementById('datepublication').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('exemplaires').value.trim() === '' || document.getElementById('exemplaires').value <= 0) {
                document.getElementById('exemplairesError').textContent = 'Le nombre d\'exemplaires est obligatoire';
                document.getElementById('exemplaires').classList.add('error-border');
                isValid = false;
            }

            return isValid;
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>