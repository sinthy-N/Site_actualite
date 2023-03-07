<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Views/styles/read.css">

    <title>Lire l'article</title>
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
                        <a class="nav-link active" aria-current="page" href="./Views/marvel.php">Marvel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./Views/dc.php">DC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./Views/create.php">Rédiger un article</a>
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

    <!-- Montrer les commentaires -->
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
    if ($_POST) {
        $commentManager = new CommentManager();
        $newComment = new Comment($_POST);
        $newComment->setArticle_Id($_GET["id"]);
        $article_id = $_GET['id'];

        $newComment->setArticle_id($article_id);

        $newComment = $commentManager->add($newComment);
        echo "<script>window.location.href='read.php?id=${$_GET["id"]}'</script>";

        foreach ($comments as $comment) {
            $comment->getArticle_id() == $_GET['id'] ?>

            <div class="container" id="barre">
                <div class="title">Les commentaires :</div>
                <br>
                <a href="javascrip:;" onclick="toggleVisibility()"><button class="btn btn-dark">Afficher ou Masquer</button></a>
                <div class="card-body" id="toggle-bloc" style="display: none;">
                    <h5 class="card-author"><?= $comment->getAuthor() ?></h5>
                    <p class="card-text"><?= $comment->getContent() ?></p>

                </div>


            </div>
            </div>





    <?php

        }
    }

    ?>


    <!-- Commenter un article -->

    <br>
    <br>

    <div class="container" id="barre">
        <div class="title">Commenter l'article :</div>
        <form method="POST">
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Contenu :</span>
                    <input type="text" name="content" id="contenu" placeholder="Cette article est ..." required>
                </div>
                <div class="input__box">
                    <span class="details">Auteur :</span>
                    <input type="text" name="author" id="auteur" placeholder="Homelander" required>
                </div>

                <div class="button">
                    <input type="submit" value="Commenter">
                </div>
        </form>
    </div>

    <!-- Montrer les commentaires -->



  
    <script src="../scripts/read.js"></script>







</body>

</html>