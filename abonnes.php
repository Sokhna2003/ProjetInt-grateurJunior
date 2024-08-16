<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
        <h2>INSCRIPTION</h2>
        <form action="inscription.php" method="post" id="form" onsubmit="return validateForm()"> 
            <div class="row d-flex justify-content-around">
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="nom" class="form-label">Nom</label>
                    <input name="nom" type="text" class="form-control" id="nom" aria-describedby="emailHelp">
                    <span class="error" id="nomError"></span>
                </div>
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input name="prenom" type="text" class="form-control" id="prenom" aria-describedby="emailHelp">
                    <span class="error" id="prenomError"></span>
                </div>
            </div>
            <div class="row d-flex justify-content-around">
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input name="adresse" type="text" class="form-control" id="adresse" aria-describedby="emailHelp">
                    <span class="error" id="adresseError"></span>
                </div>
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input name="telephone" type="text" class="form-control" id="telephone" aria-describedby="emailHelp">
                    <span class="error" id="telephoneError"></span>
                </div>
            </div>
            <div class="row d-flex justify-content-around">
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="email" class="form-label">E-mail</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <span class="error" id="emailError"></span>
                </div>
                <div class="mb-3 col-12 col-md-5 col-lg-5">
                    <label for="motdepasse" class="form-label">Mot de passe</label>
                    <input name="motdepasse" type="password" class="form-control" id="motdepasse" aria-describedby="emailHelp">
                    <span class="error" id="motdepasseError"></span>
                </div>
            </div>
            <div class="row d-flex justify-content-around">
                <button type="submit" name="valider" class="btn btn-primary button mt-4">S'INSCRIRE</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            let isValid = true;

            document.getElementById('nomError').textContent = '';
            document.getElementById('prenomError').textContent = '';
            document.getElementById('adresseError').textContent = '';
            document.getElementById('telephoneError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('motdepasseError').textContent = '';

            document.getElementById('nom').classList.remove('error-border');
            document.getElementById('prenom').classList.remove('error-border');
            document.getElementById('adresse').classList.remove('error-border');
            document.getElementById('telephone').classList.remove('error-border');
            document.getElementById('email').classList.remove('error-border');
            document.getElementById('motdepasse').classList.remove('error-border');

            const nomRegex = /^[A-Za-z]+$/;
            const emailRegex = /^[A-Za-z0-9._%+-]+@gmail\.com$/;
            const telephoneRegex = /^[0-9]{9}$/;

            if (document.getElementById('nom').value.trim() === '' || !nomRegex.test(document.getElementById('nom').value)) {
                document.getElementById('nomError').textContent = 'Le nom est obligatoire et ne doit contenir que des lettres';
                document.getElementById('nom').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('prenom').value.trim() === '' || !nomRegex.test(document.getElementById('prenom').value)) {
                document.getElementById('prenomError').textContent = 'Le prénom est obligatoire et ne doit contenir que des lettres';
                document.getElementById('prenom').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('adresse').value.trim() === '') {
                document.getElementById('adresseError').textContent = 'L\'adresse est obligatoire';
                document.getElementById('adresse').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('telephone').value.trim() === '' || !telephoneRegex.test(document.getElementById('telephone').value)) {
                document.getElementById('telephoneError').textContent = 'Le téléphone doit contenir exactement 9 caractères numériques';
                document.getElementById('telephone').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('email').value.trim() === '' || !emailRegex.test(document.getElementById('email').value)) {
                document.getElementById('emailError').textContent = 'L\'email doit être valide et contenir "@gmail.com"';
                document.getElementById('email').classList.add('error-border');
                isValid = false;
            }

            if (document.getElementById('motdepasse').value.trim() === '') {
                document.getElementById('motdepasseError').textContent = 'Le mot de passe est obligatoire';
                document.getElementById('motdepasse').classList.add('error-border');
                isValid = false;
            }

            return isValid;
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>