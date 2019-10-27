<?php

include_once("view.php");
include_once("models/user.php");
include_once("models/security.php");

class UserController
{

    protected $user, $security;

    public function __construct()
    {
        $this->user = new User;
        $this->security = new Security();
    }
    /////////////////////////////////////////////   M A I N ///////////////////////////////////////////////////////

    public function main()
    {
        if (isset($_REQUEST["do"])) {
            $do = $_REQUEST["do"];
        } else {
            $do = "showMainPage"; // si no hay sesion abierta vamos a la mainpage
        }
        $this->$do();  //con esto ejecutamos do 
    }

    ///////////////////////////////////////////// MUESTRA LA PAGINA PRINCIPAL  /////////////////////////////////////////

    private function showMainPage()
    {

        View::show("views", "mainPage");
    }
    //////////////////////////////////////////// MUESTRA EL FORMULARIO DE PARA INSERTAR NUEVO REGISTRO ////////////////////////
    private function showFormNewUser()
    {

        View::show("views", "formNewUser");
    }
    /////////////////////////////////////////// PROCESA LA INSERCION DEL NUEVO USUARIO ///////////////////////////////////////

    private function processNewUser()
    {

        $data['nombre'] = $_REQUEST['nombre'];
        $data['apellidos'] = $_REQUEST['apellidos'];
        $data['email'] = $_REQUEST['email'];
        $data['nick'] = $_REQUEST['nick'];
        $data['pass'] = $_REQUEST['pass'];

        if ($this->security->get("tipo") && $this->security->get("tipo") == 0) {
            $data['tipo'] = $_REQUEST['tipo'];
        } else {
            $data['tipo'] = 1;
        }

        $resultProcess = $this->user->processUser($data);

        if ($resultProcess == 1 && $this->security->get("tipo") == 0) {

            View::redirect("userController", "showUser");
        } else if ($resultProcess == 1 && $this->security->get("tipo") == 1) {

            View::redirect("userController", "showUser");
        } else {
            $data['mensaje'] = "Eror al insertar usuario";
            View::show("views", "FormNewUser", $data);
        }
    }
    ///////////////////////////////////// MUESTRA EL USUARIO EN FUNCIÓN DE SU TIPO ///////////////////////////////

    private function showUser()
    {

        if ($this->security->get("tipo") == 0) {

            $data["listaUsuarios"] = $this->user->getAll();
            $data["tipoUsuario"] = $this->security->get("tipo");

            View::show("views", "showUserAdmin", $data);
        } else  if ($this->security->get("tipo") == 1) {

            $data["unUsuario"] = $this->user->get($this->security->get("id"));
            $data["tipoUsuario"] = $this->security->get("tipo");

            View::show("views", "showUserBase", $data);
        } else {

            View::show("views", "showFormLogin");
        }
    }
    ////////////////////////////////////// SELECCIONAMOS LA VISTA, O VAMOS A USUARIOS O VAMOS A MOVIES ////////////////////

    private function selectView()
    {

        View::show("views", "select");
    }
    /////////////////////////////////// MOSTRAMOS EL FORMULARIO DEL LOGIN //////////////////////////////////////////////

    private function login()
    {

        View::show("views", "showFormLogin");
    }
    ////////////////////////////////////// PROCESA EL LOGIN ///////////////////////////////////////////////

    private function processLogin()
    {

        $userNick = $_REQUEST['nick']; // meto el dato del formulario en una variable data
        $userPass = $_REQUEST['pass'];

        $userExist = $this->user->getLogin($userNick, $userPass);

        if ($userExist != null) {

            $this->security->openSession(["id" => $userExist->id, "tipo" => $userExist->tipo]);

            if ($this->security->get("tipo") == 0) {

                View::redirect("userController", "selectView");
            } else if ($this->security->get("tipo") == 1) {

                $data["mensaje"] = "<p align = center>Solo los administradores tienen el acceso permititdo</p>";

                View::show("views", "showFormLogin", $data);
            }
        } else {

            $data["mensaje"] = "<p align = center>Usuario no registrado</p>";

            View::show("views", "showFormLogin", $data);
        }
    }
    ////////////////////////////////////////////////////////  CERRAMOS SESIÓN Y REDIRIGIMOS AL MAIN ////////////////////////
    private function logOut()
    {

        session_destroy();

        View::redirect("movieController", "home");
    }

    ///////////////////////////////////////////// MOSTRAMOS EL FORMULARIO PARA EDITAR REGISTROS ////////////////////////

    private function showUserEdit()
    {

        $id = $_REQUEST["id"];

        $data["editaUsuario"] = $this->user->get($id);
        View::show("views", "formEdit", $data);
    }

    private function edit()
    {

        $data["id"] = $_REQUEST['id'];

        $data["nombre"] = $_REQUEST['nombre'];
        $data["apellidos"] = $_REQUEST['apellidos'];
        $data["email"] = $_REQUEST['email'];
        $data["nick"] = $_REQUEST['nick'];
        $data["pass"] = $_REQUEST['pass'];

        if ($this->security->get("tipo") && $this->security->get("tipo") == 0) {
            $data["tipo"] = $_REQUEST['tipo'];
        } else {
            $_REQUEST['tipo'] = 1;
            $data["tipo"] = $_REQUEST['tipo'];
        }
        $data["editandoUsuario"] = $this->user->update($data);

        if ($data["editandoUsuario"] && $this->security->get("tipo") == 0) {
            $data['mensaje'] = "Usuario modificado con éxito<br/>";
            View::redirect("userController", 'showUser');
        } else if ($data["editandoUsuario"] && $this->security->get("tipo") == 1) {
            $data['mensaje'] = "Usuario modificado con éxito<br/>";
            View::show("views", 'showFormLogin', $data);
        } else if ($data["editandoUsuario"] = 0 && $this->security->get("tipo") == 0) {
            $data['mensaje'] = "Error modificando<br/>";
            View::show("views", 'showUserAdmin', $data);
        }
    }

    private function delete()
    {

        $id = $_REQUEST['id'];

        $userDelete = $this->user->delete($id);

        if ($userDelete && $this->security->get("tipo") == 0) {
            echo "el usuario ha sido borrado<br/>";
            $data['mensaje'] = "Usuario borrado con éxito<br/>";
            View::redirect("userController", 'showUser');
        } else if ($userDelete && $this->security->get("tipo") == 1) {
            $data['mensaje'] = "Usuario borrado con éxito<br/>";
            View::show("views", 'showFormLogin', $data);
        } else if ($userDelete = 0 && $this->security->get("tipo") == 0) {
            $data['mensaje'] = "Error en el borrado<br/>";
            View::show("views", 'showUserAdmin', $data);
        }
    }
}
