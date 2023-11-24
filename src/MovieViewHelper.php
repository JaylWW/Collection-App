<?php

class MovieViewHelper
{


public static function displaySingleMovie(Movie $movie): string
    {
            $output = '<ul class="ullist">';
            $output .= "<li class='title'>$movie->title</li>";
            $output .= "<li class='genre'>$movie->genre</li>";
            $output .= "<li class='watched'>Watched: $movie->watched</li>";
            $output .= "<li class='image'><img src='$movie->image'/></li>";
            $output .= "<li class='about'><div class='span'>About:</div> $movie->about</li>";
            $output .= '</ul>';    
        return $output;
       
    }


public static function displayAllMovies(array $movies): string
{
    $output = '';

    foreach ($movies as $movie) {
        $output .= '<ul class="ullist">';
        $output .= "<li class='title'>$movie->title</li>";
        $output .= "<li class='genre'>$movie->genre</li>";
        $output .= "<li class='watched'>Watched: $movie->watched</li>";
        $output .= "<li class='image'><img src='$movie->image'/></li>";
        // $output .= "<li class='about'><div class='span'>About:</div> $movie->about</li>";
        $output .= "<a class='button' href='singlemovie.php?movie=$movie->id'>Click to Find out More</a>";
        $output .= "<a class='button-delete' name='delete-button' href='index.php?delete=$movie->id'>Delete</a>";
        $output .= '</ul>';    }
    return $output;
   
}
}
?>