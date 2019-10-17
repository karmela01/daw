<?php


class User{

    private $db;

        public function __construct(){
            $this->db = new mysqli("localhost", "root", "", "practica01");
            }

        public function processUser($data){
            var_dump($data); //para ver los registros que lleva $data
            $nombre = $data['nombre'];
            $apellidos = $data['apellidos'];
            $email = $data['email'];
            $nick = $data['nick'];
            $pass = $data['pass'];
            $tipo = $data['tipo'];

            $sql = "INSERT INTO usuarios (nombre, apellidos, email, nick, password, tipo) values ('$nombre','$apellidos','$email','$nick','$pass',$tipo)";  //formulamos la petición a la db

            $this->db->query($sql); // al objeto db que es la conexion con la DB le pasamos la petición insertar usuarios

            if($this->db->affected_rows == 1){ //si el objeto db recibe una fila,s devolvemos true, si no ha insertado el usuario devuelve false
                return true;
            }else{
                return false;
            }
        }
        public function getAllUser(){

            $buscaTodosUsuarios = $this->db->query("SELECT * FROM usuarios");
            $a = array(); //CREAMOS UNA VARIABLE QUE ES UN ARRAY PARA INCLUIR EN ELLA TODOS LOS REGISTROS QUE ME PASA LA CONSULTA
            while ($fila = $buscaTodosUsuarios->fetch_object()) {
                $a[] = $fila;       // AQUI USAMOS UN WHILE PORQUE SON TODOS LOS USUARIOS
            }

            return $a;
        }
        
        public function getOneUser($data){
            var_dump($data);
            $buscaUnUsuario = $this->db->query("SELECT * FROM usuarios WHERE id = $data");
            $u = $buscaUnUsuario->fetch_object(); // AQUI NO USAMOS UN WHILE PORQUE SOLO ES UN USUARIO
            // if($this->db->affected_rows == 1)
            return $u;
        }

        public function getLogin($userNick, $userPass){
            var_dump($userNick);
             var_dump($userPass);
            echo "estoy en user - getLogin<br/>";
            //$nick = $data['nick'];
           // $pass = $data['pass'];
           // $logUsuario = $this->db->query("SELECT tipo, id FROM usuarios WHERE nick = '$userNick' AND password = '$userPass'"); 
            $result = $this->db->query("SELECT * FROM usuarios WHERE nick = '$userNick' AND password = '$userPass'"); 
            //var_dump($logUsuario);
            //en la variable logUsuario guardo la fila con el resultado de la consulta, que SOLO ES UNA
           if($result !=false && $result->num_rows != 0){ 
               // si la consulta existe y devuelve una fila....
               $fila = $result->fetch_object();
               var_dump($fila );
              $_SESSION["id"] = $fila->id;
              $_SESSION["tipo"] = $fila->tipo;
              var_dump( $_SESSION["id"] );
              var_dump( $_SESSION["tipo"] );

                $userExist = true;
                /*en $fila hemos guardado la fila que nos ha devuelto la consulta $logUsuario
                y hemos sacado de $fila el id y el tipo para crear las variables de sesion
                y creamos la variable $userExist como true para decirle al controlador que la 
                consulta ha tenido exito y nos ha devuelto el id y el tipo. Esa variable
                $userExist se utilizará en el controlador*/
           }else{
               echo "me ha cogido el else, algo va mal<br/>";
               $userExist = false;
           }
           echo " he salido de user - getLogin<br/>";
           return $userExist;
           
            //$log = $logUsuario->fetch_object(); // NO HE CREADO UN ARRAY PORQUE SOLO ME VA A DAR UN USUARIO
            //return $log;

        }
}