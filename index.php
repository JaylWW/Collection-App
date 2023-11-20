<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Movie</title>
</head>
<body>
    <div class="homebar">
        <h1 class="homepage">Welcome To My Movie Database</h1>
</div>
<div class="navbar">
        <a class="home" href="http://localhost:1234/Collection-App/">Home</a>
        <a class="Genre" href="#">Genre</a>
        <a class="Add-title" href="#">Add Movie</a>
    
</div>



<?php



$db = new PDO('mysql:host=db; dbname=movies', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$inputtedCaregory =

$query = $db->prepare('SELECT `movies`. `title`, `genre`.`name`, `movies`.`watched`, `movies`.`image`, `movies`.`about`
                        FROM `movies`
                        INNER JOIN `genre`
                        ON `movies`.`genre_id` = `genre`.`id` ');


$query->execute();

$result = $query->fetchAll();
{

}
?>
<div class="movies-grid">
    <?php
    
foreach($result as $movies)
{
    echo '<ul class="ullist">';
    echo"<li class='title'>{$movies['title']}</li>";
    echo"<li class='genre'>Genre: {$movies['name']}</li>";
    echo"<li class='watched'>Watched: {$movies['watched']}</li>";
    echo"<li class='image'><img src='{$movies['image']}'/></li>";
    echo"<li class='about'><span class='span'>About:</span> {$movies['about']}</li>";
    echo"<a class='button' href='#'>Click to Find out More</a>";
    echo '</ul>';

}
    

?>
</div>

