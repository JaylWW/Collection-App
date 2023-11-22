<?php
$db = new PDO('mysql:host=db; dbname=movies', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



$query = $db->prepare('SELECT `id`, `name` FROM `genre`');

            $query->execute();
            $genres = $query->fetchAll();
    
            
?>



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
        <h1 class="homepage">Add A Movie</h1>
</div>
<div class="navbar">
        <a class="home" href="http://localhost:1234/Collection-App/">Home</a>
    
</div>

<div class="moviejpeg">
<img src="movieimg.jpeg" />
<img src="movieimg.jpeg" />
</div>
<div class="movieform">
<form class="addmovie" method="POST">

    <label for="title">Title</label><br>
    <input id="title" name="title" type="text" placeholder="Movie Title"/><br>

    <label for="genre">Genre</label><br>
    <select id="genre" name="genre" placeholder="genre">
    <br>
    <option>Select</option>

    <?php 
    foreach ($genres as $genre) {
        echo "<option value='{$genre['id']}'>{$genre['name']}</option>";
    }
    ?>
    </select><br>
    <label for="watched">Watched</label><br>
    <input id="watched" name="watched" type="text" placeholder="Yes/No"/><br>

    <label for="image">Image Link</label><br>
    <input id="image" name="image" type="text" placeholder="url:"/><br>

    <label for="about">About</label><br>
    <input id="about" name="about" type="text" placeholder="What is the movie about?"/><br>

    <input type="submit" class="formbutton"/>

</form>
</div>
<div class="moviejpeg2">
<img src="movieimg.jpeg" />
<img src="movieimg.jpeg" />
</div>
</body>
</html>


<?php

if(
    isset($_POST['title']) && 
    isset($_POST['genre']) && 
    isset($_POST['watched']) &&
    isset($_POST['image']) && 
    isset($_POST['about'])

){
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $watched = $_POST['watched'];
    $image = $_POST['image'];
    $about = $_POST['about'];
    
    $istitlevalid = strlen($title) >= 3;
    $iswatchedvalid = strlen($watched) >=2;
    $isaboutvalid = strlen($about) >= 10;


    if (!$istitlevalid){
        echo 'title must be at least 3 characters long';
    }

    if (!$iswatchedvalid){
        echo 'watched must be at least 2 characters long';
    }

    if (!$isaboutvalid){
        echo 'about must be at least 10 characters long';
    }
    if($istitlevalid && $iswatchedvalid && $isaboutvalid){
        echo "Thank you that has worked";
    }


    $query = $db->prepare('INSERT INTO `movies`
    (`title`, `genre_id`, `watched`, `image`, `about`)
    VALUES (:title, :genre, :watched, :image, :about);');


    $query->bindParam(':title', $title);
    $query->bindParam(':genre', $genre);
    $query->bindParam(':watched', $watched);
    $query->bindParam(':image', $image);
    $query->bindParam(':about', $about);

    $success = $query->execute();

    }

    ?>


