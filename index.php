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


$db = new PDO('mysql:host=db; dbname=movies', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$movieModel = new MovieModel($db);

$movies = $movieModel->getAllMovies();




?>
<div class="movies-grid">
    <?php
    
    echo MovieViewHelper::displayAllMovies($movies);
    

?>
</div>

