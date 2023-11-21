<?php

require_once 'src/Movies.php';

class MovieModel
{
    public PDO $db;

    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }

    public function getAllMovies()
    {
        $query = $this->db->prepare('SELECT `movies`. `title`, `genre`.`name` AS "genre",  `movies`.`id`,  `movies`.`watched`, `movies`.`image`, `movies`.`about`
                        FROM `movies`
                        INNER JOIN `genre`
                        ON `movies`.`genre_id` = `genre`.`id` ');
        $query->execute();
        $movies = $query->fetchAll();

        $movieObjs = [];

        foreach($movies as $movie){
            $movieObjs[] = new Movies(
                $movie['id'], 
                $movie['title'], 
                $movie['genre'],
                $movie['watched'],
                $movie['image'],
                $movie['about']
            );
        }

        return $movieObjs;
    }

}
