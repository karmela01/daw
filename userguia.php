<?php
//include("config.php");
include("view.php");
include("models/user.php");
include("models/security.php");

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

        View::show("mainPage");
    }

    private function showFormNewUser(){

       /* if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]== 0){
            //$data['tipoUsuario'] = 0; //el usuario es administrador y este dato va al formulario de nuevo usuario para mostrar el campo tipo o no        
            $tipo = $_SESSION["tipo"];
            $data["tipo"] = $tipo;
        }            */
        
        View::show("formNewUser", $data);
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
               View::redirect("showUser");
               //View::redirect("showUserAdmin", $data);
               } //else if($resultProcess == 1 && $data['tipo'] == 1)   //pruebo a cambiar el $data['tipo'], que es del usuario ,por la variable de sesión de quen lo ha insertado
               else if($resultProcess == 1 && $this->security->get("tipo") == 1){    // se usa data para guardar el tipo de usuario 

                echo " entro por el segundo if de processUser y el usuario NO es adminstrador<br/>";

                //$data['mensaje'] = "Usuario insertado con exito";
                //$data = $_SESSION['tipo'] = 1;
                View::redirect("showUser");
                //View::redirect("showUserBase", $data);//se usa data para enviar un mensaje
               } else{

                   echo " no me ha cogido el tipo de usuario, estoy en el else de processUser<br/>";

                $data['mensaje'] = "Eror al insertar usuario"; 
                View::show("FormNewUser", $data);
               }           
    }

    private function showUser(){

        echo"estoy en showuser del controller<br/>";
        
       

        if ($this->security->get("tipo") == 0) { //condicion de seguridad eres administrador
            // Hay abierta una sesión de administrador

            echo "entro por el primer if de usuario administrador<br/>";

            $data["listaUsuarios"] = $this->user->getAll();
            $data["tipoUsuario"] = $this->security->get("tipo");

            View::show("showUserAdmin", $data);

        } else  if($this->security->get("tipo") == 1){ // eres usuario 

           echo "entro por el if de un solo usuario <br/>";
           
            $data["listaUsuarios"] = $this->user->get($this->security->get("id")); 
            $data["tipoUsuario"] = $this->security->get("tipo");
            var_dump($data);
          //$u = $this->user->getOneUser(); 
            View::show("showUserAdmin", $data);            
     }else {                           
         //echo "Error. Usuario no reconocido.";
         View::show("showFormLogin");

         }
    }

        private function login(){

            $data["mensaje"] = "usuario no reconocido";
            View::show("showFormLogin", $data);

         }

        private function processLogin(){

            echo "estoy en controller processLogin<br/>";

           //session_destroy();
           // echo "cierro la sesion para empezar de nuevo";

            

           $userNick = $_REQUEST['nick']; // meto el dato del formulario en una variable data
           $userPass = $_REQUEST['pass'];
               
            //$data['nick'] = $_REQUEST['nick']; // meto el dato del formulario en una variable data
            //$data['pass'] = $_REQUEST['pass'];
            //var_dump($data);
            echo"hago la consulta a user<br/>";
            
            $userExist = $this->user->getLogin($userNick, $userPass); 
            /*aqui utilizamos $userExist que viene de la clase user
            es quien nos dice si el usuario existe o no con true o false
            y crea las variables de sesion si es true. todo eso está en
            user -> getLogin  */
            echo "he llegado al primer if de controller - processlogin<br/>";      

            if($userExist != null){
                
                //AQUI CUELO LA CREACION DE LAS VARIABLES DE SESION CON LA CAPA SECURITY
                //Y LAS QUITO DEL USER 
               
                $this->security->openSession(["id" => $userExist->id, "tipo" => $userExist->tipo]);
    
                echo "acabo de entrar en el if del controller<br/>";
                
                View::redirect("showUser");
                var_dump($data);
                echo "no me coge el if del controller<br/>";
            

           /*$data["userLog"] = $this->user->login($data); //llamo a la consulta a la db  
           if ($data["userLog"] != null)     //si existe el usuario logueado  
            $fila = $data["userLog"];
            $_SESSION["tipo"] = $fila->tipo;
            $_SESSION["id"] = $fila->id;
             View::redirect("showUser");*/    
             
           
            } else {
                // El usuario no existe o el SQL ha fallado. Le enviamos al login pero con un mensaje de error.
                //echo "<script>location.href='index.php?do=login&mensaje=".urlencode("Error de login")."'</script>";
                echo "entra en el else del controller, algo va mal";
                $data["mensaje"]= "Usuario no encontrado";
                //View::show("showFormLogin", $data);
                var_dump($data);
                View::redirect("login");
          }   
          echo "he salido del  controller - processlogin<br/>";   
          
          
         }
         private function logOut(){           
           
            session_destroy();
            $data["mensaje"] = "Sesión cerrada con éxito";

            View::show("mainPage", $data);         
         }

        private function showUserEdit(){
            
            echo "estoy en showUserEdit del controller<br/>";

            $id = $_REQUEST["id"];
            var_dump($id);

            $data["editaUsuario"] = $this->user->get($id);
            echo "verEdit del user me ha devuelto una fila<br/>";
            View::show("formEdit", $data);
        }

        private function edit(){

                //$id = $_REQUEST['id'];
           echo "estoy en edit del controller e intento modificar </br>";
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
             echo"envio la modificacion a la base de datos user edit <br/>";

                $data["editandoUsuario"]= $this->user->update($data);
                
            echo "vuelvo al edit del controller <br/>";

                if($data["editandoUsuario"] && $this->security->get("tipo") == 0){
                    echo "el usuario ha sido modificado<br/>";
                    $data['mensaje'] = "Usuario modificado con éxito<br/>";
                    View::redirect('showUser');
                }else if( $data["editandoUsuario"] && $this->security->get("tipo") == 1){
                    $data['mensaje'] = "Usuario modificado con éxito<br/>";
                    View::show('showFormLogin', $data);
                }else if( $data["editandoUsuario"] = 0 && $this->security->get("tipo") == 0){
                    $data['mensaje'] = "Error modificando<br/>";
                    View::show('showUserAdmin', $data);
                }
            }

            private function delete(){
                    echo " estoy en delete del controller <br/>";   
                    
                   
                   // if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]== 0)
                       // echo "estoy en el primer if de delete en user, el usuario es administrador<br/>";
                       $id = $_REQUEST['id'];

                        //var_dump($_REQUEST[$id]);
                        //$id = $_SESSION['id'];
                        var_dump($id);

                       
                        $userDelete = $this->user->delete($id); 
                       

                        echo " el resultado del user ha llegado <br/>";

                        if($userDelete && $this->security->get("tipo") == 0){
                            echo "el usuario ha sido borrado<br/>";
                            $data['mensaje'] = "Usuario borrado con éxito<br/>";
                            View::redirect('showUser');
                        }else if($userDelete && $this->security->get("tipo") == 1){
                            $data['mensaje'] = "Usuario borrado con éxito<br/>";
                            View::show('showFormLogin', $data);
                        }else if($userDelete = 0 && $this->security->get("tipo") == 0){
                            $data['mensaje'] = "Error en el borrado<br/>";
                            View::show('showUserAdmin', $data);
                        }


      

                }

    }
















