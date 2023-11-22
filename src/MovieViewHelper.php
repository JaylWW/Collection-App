<?php

class MovieViewHelper
{


public static function displayAllMovies(array $movies): string
{
    $output = '';

    foreach ($movies as $movie) {
        $output .= '<ul class="ullist">';
        $output .= "<li class='title'>$movie->title</li>";
        $output .= "<li class='genre'>$movie->genre</li>";
        $output .= "<li class='watched'>Watched: $movie->watched</li>";
        $output .= "<li class='image'><img src='$movie->image'/></li>";
        $output .= "<li class='about'><div class='span'>About:</div> $movie->about</li>";
        $output .= "<a class='button' href='#'>Click to Find out More</a>";
        $output .= '</ul>';
    }
    return $output;
   
}
}