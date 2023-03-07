<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../Views/styles/update.css">

    <title>Rédiger un nouvel article</title>
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

    <!-- Modifier un article -->

    <br>
    <br>
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
    $article = $articleManager->get($_GET["id"]);
    ?>

    <br>
    <br>

    <div class="container" id="barre">
        <div class="title">Registration</div>
        <form method="POST">
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Titre :</span>
                    <input type="text" name="title" id="titre" placeholder="News d'aujourd'hui" required>
                </div>
                <div class="input__box">
                    <span class="details">Auteur :</span>
                    <input type="text" name="author" id="auteur" placeholder="Stan Lee" required>
                </div>
                <div class="textarea__box">
                    <span class="details">Contenu :</span>
                    <textarea type="text" name="content" id="contenu" placeholder="Cette article perle de ..." required></textarea>
                </div>
                <div class="input__box">
                    <span class="details">Image :</span>
                    <input type="text" name="image" id="url_image" placeholder="https://" required>
                </div>

            </div>
            <div class="category__details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <input type="radio" name="gender" id="dot-3">
                <span class="category__title">Catégorie :</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span>Marvel</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span>Dc</span>
                    </label>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>


    <?php
    if ($_POST) {
        $article->hydrate($_POST);
        $articleManager->update($article);
        echo '<script>window.location.href="./index.php"</script>';
    }
    ?>

</body>

</html>