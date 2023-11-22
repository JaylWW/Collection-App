<?php

class GenreModel
{
    public PDO $db;

    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }

    public function getAllGenres()
    {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `genre`');

        $query->execute();
        $genres = $query->fetchAll();

        $genreObjs = [];

        foreach($genres as $genre){
            $genreObjs[] = new Genre(
                $genre['id'], 
                $genre['name']
            );
        }

        return $genreObjs;
    }
}

class Genre
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
?>
