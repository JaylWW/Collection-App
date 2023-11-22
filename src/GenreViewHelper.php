<?php

class GenreViewHelper
{

public static function displayGenreDropDown(array $genres): string {
    $output = '<select id="genre" name="genre" placeholder="genre">';

    foreach ($genres as $genre) {

        $output .= "<option value='{$genre['id']}'>{$genre['name']}</option>";
    }
     $output .="</select>";
     return $output;
    }
    

}

?>