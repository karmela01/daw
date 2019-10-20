<?php
include("view.php");
include("models/movie.php");
include("models/security.php");

class MovieController{
    protected $movie, $security;
    
    public function __construct(){

        $this->movie = new Movie();
        $this->security = new Security();
    }

    public function main(){
        if(isset($_REQUEST["do"])){
            $do = $_REQUEST["do"];
        }else {$do = "home";
        }
        $this->$do();
    }
    private function home(){
        View::show("viewsMovie","insertMovie");

    }
    private function insertMovie(){

        $data["title"] = $_REQUEST["title"];
        $data["year"] = $_REQUEST["year"];
        $data["duration"] = $_REQUEST["duration"];       
        $data["rating"] = $_REQUEST["rating"];
        $data["cover"] = $_REQUEST["cover"];
        $data["filename"] = $_REQUEST["filename"];
        $data["filepath"] = $_REQUEST["filepath"];
        $data["external_url"] = $_REQUEST["external_url"];

        $resultInsert = $this->movie->insert($data);
       
        if($resultInsert == 1){
           
            $data["mensaje"] = "<b>Película insertada con éxito.</b>";
            View::show("viewsMovie","insertMovie", $data);
        }

    }
    
   
    private function prueba(){

        echo "estoy en la prueba";
    }



   
}
//fgh
