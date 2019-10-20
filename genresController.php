<?php
include("view.php");
include("models/movie.php");
include("models/security.php");

class genresController{

protected $genres, $security;

public function __construct(){
    $this->genres = new Genres;
    $this->security = new Security;
}

public function main(){
    if(isset ($_REQUEST["do"])){
        $do = $_REQUEST["do"];
    }else{
        $do = ""; // si no hay sesion abierta vamos a la mainpage
    } 
    $this->$do();  //con esto ejecutamos do 
}
private function insertGenres(){
    $data["description"] = $_REQUEST["description"];

    $resultInsert= $this->genres->insertGenre($data);

    if($resultInsert ==1){
        $data["mensaje"] = "<b>Género insertado con éxito.</b>";
        View::show("viewsGenres","insertGenres", $data);
    }
}
}