<?php

include_once("view.php");
include_once("models/user.php");
include_once("models/security.php");

class UserController{

    protected $user, $security;

    public function __construct(){
        $this->user = new User;
        $this->security = new Security();
    }
    public function main(){
        if(isset ($_REQUEST["do"])){
            $do = $_REQUEST["do"];
        }else{
            $do = "showMainPage"; // si no hay sesion abierta vamos a la mainpage
        } 
        $this->$do();  //con esto ejecutamos do 
    }

    private function showMainPage() {

        View::show("views","mainPage");
    }

    private function showFormNewUser(){

       /* if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]== 0){
            //$data['tipoUsuario'] = 0; //el usuario es administrador y este dato va al formulario de nuevo usuario para mostrar el campo tipo o no        
            $tipo = $_SESSION["tipo"];
            $data["tipo"] = $tipo;
        }            */
        
        View::show("views","formNewUser");
    }

    private function processNewUser(){

        echo " entro en el processNewUser del controller para registrar un nuevo usuario<br/>";
       
        $data['nombre'] = $_REQUEST['nombre'];
        $data['apellidos'] = $_REQUEST['apellidos'];
        $data['email'] = $_REQUEST['email'];
        $data['nick'] = $_REQUEST['nick'];
        $data['pass'] = $_REQUEST['pass'];
           
       // if(isset ($_SESSION['tipo']) && $_SESSION['tipo'] == 0 ){
           if($this->security->get("tipo") && $this->security->get("tipo") == 0 ){

               echo " entro por el primer if que indica que el tipo de usuario es administrador<br/>";

               $data['tipo'] = $_REQUEST['tipo'];
           }else{

               echo " entro por el else que indica que el usuario NO es administrador<br/>";

               $data['tipo'] = 1;
           }

           $resultProcess = $this->user->processUser($data);

           echo " vuelvo a processUser del controller despues de insertar los registros<br/>";


           //if($resultProcess == 1 && $data['tipo'] == 0){ 
            if($resultProcess == 1 && $this->security->get("tipo") == 0){  //pruebo a cambiar el $data['tipo'], que es del usuario ,por la variable de sesión de quen lo ha insertado 

            echo " entro por el primer if de processUser y el usuario que ha insertdo los registros es adminstrador<br/>";

               //$data['mensaje'] = "Usuario insertado con exito";
               View::redirect("userController","showUser");
               //View::redirect("showUserAdmin", $data);
               } //else if($resultProcess == 1 && $data['tipo'] == 1)   //pruebo a cambiar el $data['tipo'], que es del usuario ,por la variable de sesión de quen lo ha insertado
               else if($resultProcess == 1 && $this->security->get("tipo") == 1){    // se usa data para guardar el tipo de usuario 

                echo " entro por el segundo if de processUser y el usuario NO es adminstrador<br/>";

                //$data['mensaje'] = "Usuario insertado con exito";
                //$data = $_SESSION['tipo'] = 1;
                View::redirect("userController","showUser");
                //View::redirect("showUserBase", $data);//se usa data para enviar un mensaje
               } else{

                   echo " no me ha cogido el tipo de usuario, estoy en el else de processUser<br/>";

                $data['mensaje'] = "Eror al insertar usuario"; 
                View::show("views","FormNewUser", $data);
               }           
    }

    private function showUser(){
        /*

        echo"estoy en showuser del controller<br/>";
        
       

        if ($this->security->get("tipo") == 0) { //condicion de seguridad eres administrador
            // Hay abierta una sesión de administrador

            echo "entro por el primer if de usuario administrador<br/>";

            $data["listaUsuarios"] = $this->user->getAll();
            $data["tipoUsuario"] = $this->security->get("tipo");

            //View::redirect("userController","selectView");

            View::show("views","showUserAdmin", $data);*/

            echo"estoy en showuser del controller<br/>";
        
       

        if ($this->security->get("tipo") == 0) { //condicion de seguridad eres administrador
            // Hay abierta una sesión de administrador

            echo "entro por el primer if de usuario administrador<br/>";

            $data["listaUsuarios"] = $this->user->getAll();
            $data["tipoUsuario"] = $this->security->get("tipo");

            View::show("views","showUserAdmin", $data);

        } else  if($this->security->get("tipo") == 1){ // eres usuario 

           echo "entro por el if de un solo usuario <br/>";
           
            $data["listaUsuarios"] = $this->user->get($this->security->get("id")); 
            $data["tipoUsuario"] = $this->security->get("tipo");
            var_dump($data);
          //$u = $this->user->getOneUser(); 
            View::show("views","showUserAdmin", $data);            
     }else {                           
         //echo "Error. Usuario no reconocido.";
         View::show("views","showFormLogin");

         }
    }

        private function selectView(){

            View::show("views","select");

        }

        private function login(){
           
          //  $data["mensaje"] = "usuario no reconocido";
            View::show("views","showFormLogin");

         }

        private function processLogin(){
            echo"processLogin";

           $userNick = $_REQUEST['nick']; // meto el dato del formulario en una variable data
           $userPass = $_REQUEST['pass'];
            
            $userExist = $this->user->getLogin($userNick, $userPass);     

            if($userExist != null){
               
                $this->security->openSession(["id" => $userExist->id, "tipo" => $userExist->tipo]);
                echo"user getlogin devuelve el tipo de usuario";
               //View::redirect("userController","showUser");
               View::redirect("userController","selectView");
           
            } else {
                echo"user getlogin no devuelve nada";
                $data["mensaje"]= "Usuario no encontrado";
              
                View::redirect("userController","login");
          }
         }
         private function logOut(){           
           
            session_destroy();
            //$data["mensaje"] = "Sesión cerrada con éxito";

            View::redirect("movieController","showAdmin",);         
         }

        private function showUserEdit(){

            $id = $_REQUEST["id"];
           
            $data["editaUsuario"] = $this->user->get($id);
            View::show("views","formEdit", $data);
        }

        private function edit(){
         
           $data["id"] = $_REQUEST['id'];
            
                $data["nombre"] = $_REQUEST['nombre'];
                $data["apellidos"] = $_REQUEST['apellidos'];
                $data["email"] = $_REQUEST['email'];
                $data["nick"] = $_REQUEST['nick'];
                $data["pass"] = $_REQUEST['pass'];
                
                    if($this->security->get("tipo") && $this->security->get("tipo") == 0 ){
                        $data["tipo"] = $_REQUEST['tipo'];
                    }else{
                        $_REQUEST['tipo']= 1;
                        $data["tipo"] = $_REQUEST['tipo'];
                    }
                $data["editandoUsuario"]= $this->user->update($data);

                if($data["editandoUsuario"] && $this->security->get("tipo") == 0){
                    $data['mensaje'] = "Usuario modificado con éxito<br/>";
                    View::redirect("userController",'showUser');
                }else if( $data["editandoUsuario"] && $this->security->get("tipo") == 1){
                    $data['mensaje'] = "Usuario modificado con éxito<br/>";
                    View::show("views",'showFormLogin', $data);
                }else if( $data["editandoUsuario"] = 0 && $this->security->get("tipo") == 0){
                    $data['mensaje'] = "Error modificando<br/>";
                    View::show("views",'showUserAdmin', $data);
                }
            }

            private function delete(){
                       $id = $_REQUEST['id'];
                        var_dump($id);
                       
                        $userDelete = $this->user->delete($id); 
                       

                        echo " el resultado del user ha llegado <br/>";

                        if($userDelete && $this->security->get("tipo") == 0){
                            echo "el usuario ha sido borrado<br/>";
                            $data['mensaje'] = "Usuario borrado con éxito<br/>";
                            View::redirect("userController",'showUser');
                        }else if($userDelete && $this->security->get("tipo") == 1){
                            $data['mensaje'] = "Usuario borrado con éxito<br/>";
                            View::show("views",'showFormLogin', $data);
                        }else if($userDelete = 0 && $this->security->get("tipo") == 0){
                            $data['mensaje'] = "Error en el borrado<br/>";
                            View::show("views",'showUserAdmin', $data);
                        }



                }

    }
















