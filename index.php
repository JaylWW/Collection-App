<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>Movies</title>
</head>
<body>
    <div class="homebar">
        <h1 class="homepage">Welcome To My Movie Database</h1>
</div>
<div class="navbar">
        <a class="home" href="http://localhost:1234/Collection-App/">Home</a>
        <a class="Add-title" href="http://localhost:1234/Collection-App/AddMovie.php">Add Movie</a>

</div>


<?php

require_once 'src/MovieModel.php';
require_once 'src/MovieViewHelper.php';
require_once 'src/GenreModel.php';


$db = new PDO('mysql:host=db; dbname=movies', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if (isset($_GET['delete'])){
    $id = (int)$_GET['delete'];

        $stmt = $db->prepare("UPDATE `movies` SET `deleted` = 1 WHERE `id` = ?");
        $stmt->execute([$id]);
    }


$movieModel = new MovieModel($db);
$movies = $movieModel->getAllMovies();

$movieModel = new MovieModel($db);
$movies = $movieModel->addMovie($title, $genre, $watched, $image, $about);


?>
<div class="movies-grid">
    <?php
    
    echo MovieViewHelper::displayAllMovies($movie);
    

?>
</div>

