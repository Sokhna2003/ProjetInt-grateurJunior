<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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

  <div class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/img4.jpg" class="d-block w-100 objectif-fit-cover" alt="..."
            style="height: 90vh; width: 100%;">
          <div class="carousel-caption d-none d-md-block">
            <h5>La Bibliothèque notre meilleure encyclopédie</h5>
            <p>Centre névralgique des activités scientifiques, pédagogiques et culturelles se l’école.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/img2.jpg" class="d-block w-100 objectif-fit-cover" alt="..."
            style="height: 90vh; width: 100%;">
          <div class="carousel-caption d-none d-md-block">
            <h5>La Bibliothèque notre meilleure encyclopédie</h5>
            <p>Centre névralgique des activités scientifiques, pédagogiques et culturelles se l’école.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/img3.jpg" class="d-block w-100 objectif-fit-cover" alt="..."
            style="height: 90vh; width: 100%;">
          <div class="carousel-caption d-none d-md-block">
            <h5>La Bibliothèque notre meilleure encyclopédie</h5>
            <p>Centre névralgique des activités scientifiques, pédagogiques et culturelles se l’école.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="row d-flex justify-content-around">
      <div class="col-12 col-md-5 col-lg-5 mt-5" style="width: 40rem;">
        <img src="images/img5.avif" class="card-img-top" alt="...">
        <div class="card-body shadow-lg p-3 mb-5 bg-body rounded">
          <p class="card-text">Les bibliothèques jouent un role clé 
            en favorisant l’alphabétisation et 
            l’apprentissage, en posant les
            fondations du développement et en
            sauvegardant le patrimoine culturel
            et scientifique de l’humanité.</p>
        </div>
      </div>
      <div class="col-12 col-md-5 col-lg-5 mt-5" style="width: 40rem;">
        <img src="images/img5.avif" class="card-img-top" alt="...">
        <div class="card-body shadow-lg p-3 mb-5 bg-body rounded">
          <p class="card-text">Les bibliothèques jouent un role clé 
            en favorisant l’alphabétisation et 
            l’apprentissage, en posant les
            fondations du développement et en
            sauvegardant le patrimoine culturel
            et scientifique de l’humanité.</p>
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-around">
      <div class="col-12">
        <h2 class="text-center mt-5">ACTUALITES</h2>
      </div>
      <div class="col-12 col-md-5 col-lg-5 mt-5" style="height: 80vh;">
        <img src="images/img6.jpg" alt="" style="height: 80vh; width: 100%;">
      </div>
      <div class="col-12 col-md-5 col-lg-5 mt-5" style="height: 80vh;">
        <div class="border" style="height: 36vh;">
          <img src="images/img7.jpg" alt="" style="height: 36vh; width: 100%;">
        </div>
        <div class="border mt-5" style="height: 36vh;">
          <img src="images/img8.jpg" alt="" style="height: 36vh; width: 100%;">
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-around">
      <div class="col-12">
        <h2 class="text-center mt-5">A PROPOS</h2>
      </div>
      <div class="col-12 col-md-5 col-lg-5 mt-5" style="width: 40rem;">
        <img src="images/bu dakar.JPG" class="card-img-top" alt="..." style="height: 50vh; width: 100%;">
      </div>
      <div class="col-12 col-md-5 col-lg-5 mt-5" style="width: 40rem;">
        <p class="card-text mt-4">Le Service des bibliothèques est chargé de mettre en œuvre la politique documentaire de l'université, 
          et de répondre aux besoins d'information et de documentation des étudiants, des enseignants et des chercheurs.
          Sa spécificité et ses compétences lui permettent de jouer un rôle régional de centre de ressources pour des 
          organismes extérieurs. A ce titre, les bibliothèques universitaires sont ouvertes à toute personne ou 
          organisation qui font appel à leurs ressources.
          favoriser l'accès et la recherche dans leurs collections.
          promouvoir la pratique de la lecture et la recherche documentaire dans l'enseignement, et mener des actions de formation des utilisateurs.
          affirmer leur fonction culturelle et leur rôle patrimonial</p>
        <a href="#" class="btn btn-primary mt-3" style="background-color: rgb(26, 43, 72) !important; border-color: rgb(26, 43, 72) !important;;">Voir plus</a>
      </div>
    </div>
    <div class="row d-flex justify-content-around">
      <div class="col-12 col-md-5 col-lg-5 mt-5" style="width: 40rem;">
        <p class="card-text mt-4">Le Service des bibliothèques est chargé de mettre en œuvre la politique documentaire de l'université, 
          et de répondre aux besoins d'information et de documentation des étudiants, des enseignants et des chercheurs.
          Sa spécificité et ses compétences lui permettent de jouer un rôle régional de centre de ressources pour des 
          organismes extérieurs. A ce titre, les bibliothèques universitaires sont ouvertes à toute personne ou 
          organisation qui font appel à leurs ressources.
          favoriser l'accès et la recherche dans leurs collections.
          promouvoir la pratique de la lecture et la recherche documentaire dans l'enseignement, et mener des actions de formation des utilisateurs.
          affirmer leur fonction culturelle et leur rôle patrimonial</p>
        <a href="#" class="btn btn-primary mt-3" style="background-color: rgb(26, 43, 72) !important; border-color: rgb(26, 43, 72) !important;;">Voir plus</a>
      </div>
      <div class="col-12 col-md-5 col-lg-5 mt-5" style="width: 40rem;">
        <img src="images/img5.avif" class="card-img-top" alt="..." style="height: 50vh; width: 100%;">
      </div>
    </div>
  </div>
  
  <footer class="container-fluid">
    <div class="row d-flex justify-content-around" style="background-color: rgb(26, 43, 72); margin-top: 4rem; height: 30vh;">
      <div class="col-12 col-md-5 col-lg-3">
        <img src="images/looo.png" alt="logo" class="h-75 w-15 logo img-fluid">
      </div>
      <div class="col-12 col-md-5 col-lg-3">
        <ul class="list-unstyled mb-0 text-center mt-5">
          <li>
            <a href="#!" class="text-white">ACCUEIL</a>
          </li>
          <li>
            <a href="#!" class="text-white">ABONNES</a>
          </li>
          <li>
            <a href="#!" class="text-white">LIVRES</a>
          </li>
          <li>
            <a href="#!" class="text-white">EMPRUNTS</a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-md-5 col-lg-3">
        <h2 class="text-white mt-5">Newsletter</h2>
        <div class="card mt-4" style="height: 7vh; border-color: white;"></div>
      </div>
    </div>
    <div class="row" style="background-color: rgb(231, 244, 254);">
      <div class="col text-center p-3">© 2024 Copyright:Bibliothèque en ligne </div>
    </div>
  </footer>
  
  


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>