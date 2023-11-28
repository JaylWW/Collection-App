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

        <h3 class="homepage">JMDb</h3>
        <p>Menu</p>
        <input class="search "type="text" placeholder="Search..">
        <p>JMDBPro</p>
        <p class="spacer">|</p>
        <p>Watchlist</p>
        <p>Sign In</p>
        <p>EN</p>


</div>
<div class="navbar">
        <a class="home" href="http://localhost:1234/Collection-App/">Home</a>
        <a class="Add-title" href="http://localhost:1234/Collection-App/AddMovie.php">Add Movie</a>

</div>

<div class="banners">
    <img src="banners.jpeg"/>
</div>

<div>
<div class="slideshow-container">


  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="image1.jpeg" style="width:100%">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="image2.jpeg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="image3.jpeg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>

  
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>


<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

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

?>
<div class="movies-grid">
    <?php
    
    echo MovieViewHelper::displayAllMovies($movies);
    

?>
</div>

