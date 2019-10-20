<?php  
    //include("userController.php");
    include("movieController.php");
    //$userController = new UserController();
    //$userController->main();
    $movieController = new MovieController();
    $movieController->main();