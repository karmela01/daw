<?php
include("dbabstract.php");
include("config.php");

class People
{

    private $db;

    public function __construct(){
        $this->db = new DBAbstract(Config::$dbHost, Config::$dbUser, Config::$dbPassword, Config::$dbName);
    }

    public function insertPeople($data){
        $name = $data["name"];
        $photo = $data["photo"];
        $external_url = $data["external_url"];

        $insertaPersona = $this->db->sqlOther("INSERT INTO people (name,photo,external_url) VALUES ('$name','$photo','$external_url')");

        if ($insertaPersona == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function getAll(){
        $seleccionaTodas = $this->db->sqlSelect("SELECT * FROM people");
        return $seleccionaTodas;
    }
    public function get($id)
    {
        $seleccionaUna = $this->db->sqlSelect("SELECT * FROM people WHERE id = $id");
    }
    public function delete($id)
    {
        $borraPersona = $this->db->sqlOther("DELETE * FROM people WHERE id = $id");
    }

    public function update(){
        // AQUI VAN LOS $data DEL FORMULARIO CON get
        // $editaPelicula = $this->db->sqlOther("UPDATE movies SET id = , title =  , year = , duration =  , rating = , cover =  , filepath =  , filename =  , external_url= ")

    }
}
