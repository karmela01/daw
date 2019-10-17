<?php
include("config.php");
include("dbabstract.php");

class User{

    private $db;

        public function __construct(){
           // $this->db = new mysqli("localhost", "root", "", "practica01"); anterior a la capa de abstracción
           //$config = new Config(); //declaramos el objeto de la clase Config que nos proporciona la conexión con la DB
           $this->db = new DBAbstract(Config::$dbHost, Config::$dbUser, Config::$dbPassword, Config::$dbName);
           //declaramos el objeto de la clase DBAbstract this->db es la conexion 
            }

        public function processUser($data){
            echo "entro en processUser de user <br/>";
            var_dump($data); //para ver los registros que lleva $data
           
            $nombre = $data['nombre'];
            $apellidos = $data['apellidos'];
            $email = $data['email'];
            $nick = $data['nick'];
            $pass = $data['pass'];
            $tipo = $data['tipo'];

            $sql = "INSERT INTO usuarios (nombre, apellidos, email, nick, password, tipo) values ('$nombre','$apellidos','$email','$nick','$pass',$tipo)";  //formulamos la petición a la db

            $insert = $this->db->sqlOther($sql); // utilizamos la capa de abstracción
            
            //$this->db->query($sql); // al objeto db que es la conexion con la DB le pasamos la petición insertar usuarios

            //if($this->db->affected_rows == 1){ si el objeto db recibe una fila, devolvemos true, si no ha insertado el usuario devuelve false
              
              if($result == 1){ //utilizamos la capa de abstracción
                 echo " la insercion de datos se ha efectuado con exito <br/>";
                return true;
            }else{
                echo " la insercion de datos NO se ha efectuado con exito <br/>";
                return false;
            }
        }
        public function getAll(){
            $buscaTodosUsuarios = $this->db->sqlSelect("SELECT * FROM usuarios");
            return $buscaTodosUsuarios;
        }
       
        
        public function get($id){
            $buscaUnUsuario = $this->db->sqlSelect("SELECT * FROM usuarios WHERE id = '$id'");
            return $buscaUnUsuario;
        }

        public function getLogin($userNick, $userPass){
            var_dump($userNick);
            var_dump($userPass);
            echo "estoy en user - getLogin<br/>";
            
           //$result = $this->db->query("SELECT id, tipo FROM usuarios WHERE nick = '$userNick' AND password = '$userPass'"); LA QUE VALE
           
           $sql = "SELECT id, tipo FROM usuarios WHERE nick = '$userNick' AND password = '$userPass'";
        
           $result = $this->db->sqlSelect($sql);//aplicamos capa de abstracción 
           echo "ha pasado por la petición select <br/>";
           if(count($result) > 0){
               echo "entra en el primer if del getlogin <br/>";
              // return $result;
              $row = $result [0];
              var_dump($row);
              return $row;
            
            
           //if($result !=false && $result->num_rows != 0){ 
               // si la consulta existe y devuelve una fila....
               /*
               $fila = $result->fetch_object();
               var_dump($fila );
                //creamos las variables de sesion con id y tipo
              $_SESSION["id"] = $fila->id;
              $_SESSION["tipo"] = $fila->tipo;
              var_dump( $_SESSION["id"] );
              var_dump( $_SESSION["tipo"] );

                $userExist = true;
                /*en $fila hemos guardado la fila que nos ha devuelto la consulta $logUsuario
                y hemos sacado de $fila el id y el tipo para crear las variables de sesion
                y creamos la variable $userExist como true para decirle al controlador que la 
                consulta ha tenido exito y nos ha devuelto el id y el tipo. Esa variable
                $userExist se ha utilizado en el controlador para pasarnos los datos pass y nick del formulario del login*/
           
           
           
         }else{
               echo "me ha cogido el else, algo va mal<br/>";
               //$userExist = false;
                return null;           
           }
           echo " he salido de user - getLogin<br/>";
           return $userExist;
           
            //$log = $logUsuario->fetch_object(); // NO HE CREADO UN ARRAY PORQUE SOLO ME VA A DAR UN USUARIO
            //return $log;

        }
        public function delete($id){
            echo " estoy en deleting del user <br/>";
            
            var_dump($id);

            $borraUsuario = $this->db->sqlOther("DELETE FROM usuarios WHERE id = $id");
            if($borraUsuario == 1){
                echo "ha borrado el usuario <br/>";
                $borrado = true;
            }else{
                echo "NO ha borrado el usuario <br/>";
                $borrado = false;
            }
            echo " sale de los if y lleva el resultado al controller <br/>";
            return $borrado;
            }         
          
            public function update($data){
                echo "estoy en edit de user <br/>";
            $id = $data['id'];
            $nombre = $data['nombre'];
            $apellidos = $data['apellidos'];
            $email = $data['email'];
            $nick = $data['nick'];
            $pass = $data['pass'];
            $tipo = $data['tipo'];

            $sql = "UPDATE usuarios SET id = $id, nombre = '$nombre', apellidos = '$apellidos', email = '$email', nick = '$nick', password = '$pass', tipo = '$tipo' WHERE id = $id"; //formulamos la petición a la db
               
            $editaUsuario = $this->db->sqlOther($sql); // al objeto db que es la conexion con la DB le pasamos la petición modificar usuarios
            
            if($editaUsuario == 1){
                echo "modificacion realizada con exito <br/>";
                    $modificado = true;
                }else{
                    echo "NO ha borrado el usuario <br/>";
                    $modificado = false;
                }
                echo " sale de los if y lleva el resultado al controller <br/>";
                return $modificado;
            
        
        }
            
}