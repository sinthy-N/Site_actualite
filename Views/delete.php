<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- Supprimer un article -->

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
$articleManager->delete($_GET["id"]);
echo "<script>window.location.href='../index.php'</script>";

?>