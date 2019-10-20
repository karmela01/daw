<?php
include("dbabstract.php");
include("config.php");

class Movie
{

    private $db;

    public function __construct(){

        $this->db = new DBAbstract(Config::$dbHost, Config::$dbUser, Config::$dbPassword, Config::$dbName);
    }

    public function insertMovie($data){

        $title = $data["title"];
        $year = $data["year"];
        $duration = $data["duration"];
        $rating = $data["rating"];
        $cover = $data["cover"];
        $filename = $data["filename"];
        $filepath = $data["filepath"];
        $external_url = $data["external_url"];

        $insertaPelicula = $this->db->sqlOther("INSERT INTO movies (title, year, duration, rating, cover, filename, filepath, external_url) values('$title','$year','$duration','$rating','$cover','$filename','$filepath','$external_url')");

        if ($insertaPelicula == 1) {
            return true;
        } else {
            return false;
        }
    
   
     }
    
    public function getAll(){
        $seleccionaTodas = $this->db->sqlSelect("SELECT * FROM movies");
        return $seleccionaTodas;
    }
    public function get($id){
        $seleccionaUna = $this->db->sqlSelect("SELECT * FROM movies WHERE id = $id");
    }
    public function delete($id){
        $borraPelicula = $this->db->sqlOther("DELETE * FROM movies WHERE id = $id");
    }

    public function update(){
        // AQUI VAN LOS $data DEL FORMULARIO CON get
        // $editaPelicula = $this->db->sqlOther("UPDATE movies SET id = , title =  , year = , duration =  , rating = , cover =  , filepath =  , filename =  , external_url= ")

    }
}