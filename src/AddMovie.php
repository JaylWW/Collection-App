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
        <a class="Add-title" href="#">Add Movie</a>
    
</div>

<form>
    <label for="title">Title</label>
    <input id="title" name="title" type="text"/>

    <label for="genre">Genre</label>
    <input id="genre" name="genre" type="text"/>

    <label for="about">About</label>
    <input id="about" name="about" type="text"/>

    <input type="submit" />
</form>
</body>
</html>


<?php


$db = new PDO('mysql:host=db; dbname=movies', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$title = $_GET['title'];
$genre = $_GET['genre'];
$about = $_GET['about'];





?>