<?php

class Movies
{
    public int $id;
    public string $title;
    public string $genre;
    public string $watched;
    public string $image;
    public string $about;

    public function __construct(
        int $id, 
        string $title, 
        string $genre, 
        string $watched,  
        string $image, 
        string $about
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->genre = $genre;
        $this->watched = $watched;
        $this->image = $image;
        $this->about = $about;
        
    }
}