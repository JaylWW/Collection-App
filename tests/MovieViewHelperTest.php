<?php

require_once 'src/MovieViewHelper.php';
require_once 'src/Movies.php';

use PHPUnit\Framework\TestCase;

class MovieViewHelperTest extends TestCase
{
    public function test_movie_success(): void
    {
        $movieObj = new Movie(2,'Con-Air', 'Action', 1, 'test', 'con man on a plane');
        $result = MovieViewHelper::displayAllMovies([$movieObj]);

        $output = '<ul class="ullist">';
        $output .= "<li class='title'>Con-Air</li>";
        $output .= "<li class='genre'>Action</li>";
        $output .= "<li class='watched'>Watched: 1</li>";
        $output .= "<li class='image'><img src='test'/></li>";
        $output .= "<li class='about'><div class='span'>About:</div> con man on a plane</li>";
        $output .= "<a class='button' href='#'>Click to Find out More</a>";
        $output .= '</ul>';

        $this->assertEquals($output, $result);
    }    
}


?>