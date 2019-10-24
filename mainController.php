<?php
include_once("movieController.php");
include_once("userController.php");

    class MainController {
        public function main() {
            if (isset($_REQUEST["controller"])) {
                $controller = $_REQUEST["controller"];
            } else {
                $controller = "MovieController";
               
            }
           $c = new $controller();
           $c->main();
           /*
            switch ($controller) {
                case "UserController":
                    $c = new UserController();
                    $c->main();
                    break;
                
                case "MovieController":
                    $c = new MovieController();
                    $c->main();
                    break;
            }*/
        }
    }