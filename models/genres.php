<?php
include("dbAbstract.php");
include("config.php");

class Genres{

    private $db;

    public function __construct(){
        $this->db = new DBAbstract(Config::$dbHost, Config::$dbUser, Config::$dbPassword, Config::$dbName);
    }


 public function insertGenres($data){
        $description = $data["description"];

        $insertaGenero = $this->db->sqlOther("INSERT INTO genres (description) VALUES ('$description')");

        if($insertaGenero == 1){
            return true;
        }else{
            return false;
        }
     }
     public function getAll(){
        $seleccionaTodas = $this->db->sqlSelect("SELECT * FROM genres");
        return $seleccionaTodas;
    }
    public function get($id){
        $seleccionaUna = $this->db->sqlSelect("SELECT * FROM genres WHERE id = $id");
    }
    public function delete($id){
        $borraGenero = $this->db->sqlOther("DELETE * FROM genres WHERE id = $id");
    }

    public function update(){
        // AQUI VAN LOS $data DEL FORMULARIO CON get
        // $editaPelicula = $this->db->sqlOther("UPDATE movies SET id = , title =  , year = , duration =  , rating = , cover =  , filepath =  , filename =  , external_url= ")

    }

}