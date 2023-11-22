<?php

require_once 'src/Movie.php';

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
                        ON `movies`.`genre_id` = `genre`.`id`
                        WHERE `movies`. `deleted` = 0 ');

        $query->execute();
        $movies = $query->fetchAll(PDO::FETCH_ASSOC);

        $movieObjs = [];

        foreach($movies as $movie){
            $movieObjs[] = new Movie(
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


    public function addMovie(array $title, array $genre, array $watched, array $image, array $about);
    {
        $query = $this->db->prepare('INSERT INTO `movies`
                (`title`, `genre_id`, `watched`, `image`, `about`)
                VALUES (:title, :genre, :watched, :image, :about);');
            
            
                $query->bindParam(':title', $title);
                $query->bindParam(':genre', $genre);
                $query->bindParam(':watched', $watched);
                $query->bindParam(':image', $image);
                $query->bindParam(':about', $about);
            
                $success = $query->execute();
    }
}
