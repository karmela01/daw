<?php
include_once("dbabstract.php");
include_once("config.php");

class Movie
{
    private $db;

    public function __construct()
    {

        $this->db = new DBAbstract(Config::$dbHost, Config::$dbUser, Config::$dbPassword, Config::$dbName);
    }

    public function insert($data)
    {

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

    public function getAll()
    {
        $seleccionaTodas = $this->db->sqlSelect("SELECT * FROM movies");
        return $seleccionaTodas;
    }
    public function get($id)
    {
        var_dump("$id");

        $seleccionaUna = $this->db->sqlSelect("SELECT * FROM movies WHERE id = '$id'");

        return $seleccionaUna;
    }
    public function delete($id)
    {

        $borraPelicula = $this->db->sqlOther("DELETE FROM movies WHERE id = '$id'");

        if ($borraPelicula == 1) {
            echo "entra en el primer if, va bien";
            $borrado = true;
        } else {
            echo "entra en el segundo if, va mal";
            $borrado = false;
        }
        return $borrado;
    }

    public function update($data)
    {
        echo "la petición llega del controlador al update de movie";

        $id = $data["id"];
        $title = $data["title"];
        $year = $data["year"];
        $duration = $data["duration"];
        $rating = $data["rating"];
        $cover = $data["cover"];
        $filename = $data["filename"];
        $filepath = $data["filepath"];
        $external_url = $data["external_url"];

        $editaMovie = $this->db->sqlOther("UPDATE movies SET id = '$id', title = '$title', year = '$year', duration = '$duration', rating = '$rating', cover = '$cover', filename = '$filename', filepath = '$filepath', external_url = '$external_url' WHERE id = '$id'");

        if ($editaMovie == 1) {
            echo "actualiza el registro";
            $edit = true;
        } else {

            $edit = false;
        }
        return $edit;
    }
}
