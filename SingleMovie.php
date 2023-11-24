<?php

require_once 'src/MovieModel.php';
require_once 'src/Movie.php';
require_once 'src/MovieViewHelper.php';

$db = new PDO('mysql:host=db; dbname=movies', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


if (isset($_GET['movie'])){
    $id = $_GET['movie'];
} else {
    header('Location: index.php');
}

$movieModel = new MovieModel($db);
$movies = $movieModel->getSingleMovie($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>Movies</title>
</head>
<body class="single">
    <div class="homebar">
        <h1 class="homepage">Movie</h1>
</div>
<div class="navbar">
        <a class="home" href="http://localhost:1234/Collection-App/">Home</a>
</div>
<div class="jmdb">
    <p>JMDb Rating<br>
    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></p>
    <p>Your Rating<br>
    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></p>
    <p>Popularity<br>
    <span>&#8599;</span><span>&#8599;</span><span>&#8599;</span><span>&#8599;</span></p>
</div>


<?php

echo MovieViewHelper::displaySingleMovie($movies);


?>

<footer class="footer">
    <div class="cast">
        <h3>Director: <span>Steve Oedekerk</span></h3>
        <h3>Writers: <span>Jack Bernstein . Steve Oedekerk</span></h3>
        <h3>Stars: <span>Jim Carrey . Ian McNeice . Simon Callow</span></h3>
        <h3>JMBdPro: <span>See production info at IMDbPro</span></h3>
        <br>
        <h2 class="awards">Awards: <span>7 wins & 6 nominations</span></h2>
        <br>
        <video class="video" width="320" height="240" controls>
        <source src="video.mp4" type="video/mp4">
        <source src="video.ogg" type="video/ogg">
        </video>
        <br>
        <br>
        <h2>Photos</h2>
        <div class="photos">
        <img src="ace1.jpeg" alt="ace">
        <img src="ace2.jpeg" alt="ace>">
        <img src="ace3.jpeg" alt="ace>">
        <img src="ace4.jpeg" alt="ace>">
</div>
    <div class="actors">
        <h2>Actors</h2>
            <h5>Jim Carrey</h5><span><img src="jim.jpg"></span><p>James Eugene Carrey is a Canadian-American actor and comedian. Known for his energetic slapstick performances, Carrey first gained recognition in 1990, after landing a role in the American sketch comedy television series In Living Color.</p>
            <h5>Ian McNeice</h5><span><img src="ian.jpeg"></span><p>Ian McNeice is an English film and television actor, best known for playing Bert Large in the dramedy Doc Martin.</p>
            <h5>Simon Callow</h5><span><img src="simon.jpg"></span><p>Simon Phillip Hugh Callow CBE is an English actor. Known as a character actor on stage and screen, he has received numerous accolades including an Olivier Award and Screen Actors Guild Award as well as nominations for two BAFTA Awards.</p>
            <h5>Maynard Eziashi</h5><span><img src="Maynard.jpg"></span><p>Maynard Eziashi is a Nigerian-English actor. In 1991, he won the Silver Bear for Best Actor at the 41st Berlin International Film Festival for his starring role in Mister Johnson.</p>
            <h5>Bob Gunton</h5><span><img src="bob.jpg"></span><p>Robert Patrick Gunton Jr. is an American character actor of stage and screen. He is known for playing strict authoritarian characters, including Warden Samuel Norton in the 1994 prison drama The Shawshank </p>
            <h5>Sophie Okonedo</h5><span><img src="Sophie.jpg"></span><p>Sophie Okonedo CBE is an English actress and narrator. Okonedo was appointed Officer of the Order of the British Empire in the 2010 and Commander of the Order of the British Empire in the 2019, both for services to drama.</p>

    </div>

</footer>