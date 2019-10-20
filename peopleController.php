<?php
include("view.php");
include("models/movie.php");
include("models/security.php");

class peopleController{
    protected $people, $segurity;

    public function __construct(){
        $this->people = new People;
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

    private function insertPeople(){
        $data["name"] = $_REQUEST["name"];
        $data["photo"] = $_REQUEST["photo"];
        $data["external_url"] = $_REQUEST["external_url"];

        $resultInsert = $this->movie->insertPeople($data);

        if($resultInsert == 1){
            $data["mensaje"] = "<b>Persona insertada con éxito.</b>";
            View::show("viewsPeople","insertPeople", $data);
        }

   }
}
//fgh