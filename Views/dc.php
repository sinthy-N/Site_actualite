<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/dc.css">
    <title>Les Dossiers Geek</title>
</head>

<body>
    <header>

        <!-- Barre de Navigation -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../index.php">Les Dossiers Geek <span class="sr-only">(current)</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link active" aria-current="page" href="./marvel.php">Marvel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./dc.php">DC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./create.php">Rédiger un article</a>
                    </li>
                </ul>
                <ul class="navbar-nav sm-icons">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                </ul>
            </div>
        </nav>

    </header>

    <!-- Visionner tous les articles Dc -->

    <?php
    function loadClass($class)
    {
        if (str_contains($class, "Manager")) {
            require "../Controller/$class.php";
        } else {
            require "../Entity/$class.php";
        }
    }
    spl_autoload_register("loadClass");

    $articleManager = new ArticleManager();
    $articles = $articleManager->getAllDc();
    ?>
    <br>
    <br>
    <div class="container text-center my-3">
        <h2 class="font-weight-light">
            Dernières News Dc
        </h2>
        <br>
        <br>
        <div class="row mx-auto my-auto">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">
                    <?php foreach ($articles as $article) { ?>
                        <div class="carousel-item <?= $article === $articles[0] ? 'active' : '' ?>">
                            <div class="col-md-4">
                                <div class="card card-body">
                                    <img src="<?= $article->getImage() ?>" class="card-img-top" alt="...">
                                    <br>
                                    <h5 class="card-title">
                                        <?= $article->getTitle() ?>
                                    </h5>
                                    <br>
                                    <p class="card-text">
                                        <?= $article->getContent() ?>
                                    </p>
                                    <br>
                                    <a href="./read.php?id=<?= $article->getId() ?>" class="btn btn-info">Commentaires</a>
                                    <a href="./update.php?id=<?= $article->getId() ?>" class="btn btn-warning" id="bouton_3">Modifier</a>
                                    <a id="button_delete" class="btn btn-danger" onclick="return confirm('Est-ce que vous voulez réellement supprimer cette article ?');" href="./delete.php?id=<?= $article->getId() ?>">Supprimer</a>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>

</html>