<?php

include_once("view.php");
include_once("models/movie.php");
include_once("models/security.php");



class MovieController
{
    protected $movie, $security;

    public function __construct()
    {

        $this->movie = new Movie();
        $this->security = new Security();
    }

    public function main()
    {

        if (isset($_REQUEST["do"])) {
            $do = $_REQUEST["do"];
        } else {
            $do = "home";
        }
        $this->$do();
    }
    private function home()
    {

        $data["verPeliculas"] = $this->movie->getAll();

        View::show("viewsMovie", "viewAdmin", $data);
    }

    private function insertMovie()
    {

        View::show("viewsMovie", "formInsert");
    }

    private function processInsert()
    {



        $data["title"] = $_REQUEST["title"];
        $data["year"] = $_REQUEST["year"];
        $data["duration"] = $_REQUEST["duration"];
        $data["rating"] = $_REQUEST["rating"];
        $data["cover"] = $_REQUEST["cover"];
        $data["filename"] = $_REQUEST["filename"];
        $data["filepath"] = $_REQUEST["filepath"];
        $data["external_url"] = $_REQUEST["external_url"];

        echo "paso de los datas";
  
        $dir_subida = 'D:/xampp/htdocs/ejercicios/practica01movies/imagenesSubidas/';
        $fichero_subido = $dir_subida.basename($_FILES['cover']['name']);

        /*echo '<pre>';
        if (move_uploaded_file($_FILES['cover']['tmp_name'], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "Fallo al subir el fichero.\n";
        }

        echo 'Más información de depuración:';
        print_r($_FILES);
        */
echo " paso de la funcion de subida";

        $resultInsert = $this->movie->insert($data);

        //if($resultInsert == 1){
        if ($resultInsert) {
            echo "  me deja ir a la vista";

            $data["mensaje"] = "<b>Película insertada con éxito.</b>";
            View::redirect("movieController", "showAdmin");
            //View::show("viewsMovie","viewAdmin", $data);
        } else {
            echo "llega al controller, pero no coge la modificacion en el user";
        }
    }

    private function showAdmin()
    {
        $data["verPeliculas"] = $this->movie->getAll();

        View::show("viewsMovie", "viewAdmin", $data);
    }


    private function showEditMovies()
    {

        $id = $_REQUEST["id"];
        var_dump($id);

        $data["editMovies"] = $this->movie->get($id);

        View::show("viewsMovie", "formEdit", $data);
    }
    private function edit()
    {

        $data["id"] = $_REQUEST["id"];
        $data["title"] = $_REQUEST["title"];
        $data["year"] = $_REQUEST["year"];
        $data["duration"] = $_REQUEST["duration"];
        $data["rating"] = $_REQUEST["rating"];
        $data["cover"] = $_REQUEST["cover"];
        $data["filename"] = $_REQUEST["filename"];
        $data["filepath"] = $_REQUEST["filepath"];
        $data["external_url"] = $_REQUEST["external_url"];

        $data["editMovies"] = $this->movie->update($data);

        if ($data["editMovies"]) {

            View::redirect("movieController", "home");
            //pendiente de añadir dónde vamos después

        }
    }

    private function delete()
    {

        $id = $_REQUEST['id'];
        var_dump($id);

        $movieDelete = $this->movie->delete($id);

        if ($movieDelete) {
            View::redirect("movieController", "home");
        }
    }

    private function prueba()
    {

        echo "estoy en la prueba";
    }
}
