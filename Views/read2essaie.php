<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../Views/styles/read.css">

    <title>Lire l'article</title>
</head>

<body>
    <header>
        <!-- Navbar -->
        <div class="main-menu-logo bg-none ">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="nav-container">
                    <a class="navbar-brand" href="index.php">Les Dossiers Geek</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">


                            <li class="nav-item active">
                                <a class="nav-link active" aria-current="page" href="./Views/marvel.php">Marvel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./Views/dc.php">DC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./Views/create.php">Rédiger un
                                    article</a>
                            </li>


                            <ul class="navbar-nav sm-icons">
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                            </ul>
                        </ul>
                    </div>
            </nav>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </header>






    <div class="background-image" id="daredevil"></div>


    <div class="container" id="barre">
        <div class="title">Commenter l'article</div>
        <form method="POST">
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Contenu</span>
                    <input type="text" name="content" id="contenu" placeholder="Cette article est ..." required>
                </div>
                <div class="input__box">
                    <span class="details">Auteur</span>
                    <input type="text" name="author" id="auteur" placeholder="Homelander" required>
                </div>

                <div class="button">
                    <input type="submit" value="Commenter">
                </div>
        </form>
    </div>



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
        $newComment->setArticle_id($_GET['id']);

        $newComment = $commentManager->add($newComment);
        echo "<script>window.location.href='read.php?id=${$_GET["id"]}'</script>";

        $comments = $commentManager->getAll();
        foreach ($comments as $comment) {
            if ($comment->getArticle_id() == $_GET['id']) {
    ?>
                <div class="container">

                    <div class="card" style="width: 18rem;">

                        <div class="card-body">
                            <button class="btn">Hide</button>
                            <h5 class="card-author"><?= $comment->getAuthor() ?></h5>

                            <p class="card-text"><?= $comment->getContent() ?></p>


                        </div>

                    </div>
                </div>
    <?php
            }
        }
    }
    ?>
    <script src="../scripts/script.js"></script>







</body>

</html>