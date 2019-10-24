<?php
include("config.php");
include_once("dbabstract.php");

class User
{

    private $db;

    public function __construct(){        
        $this->db = new DBAbstract(Config::$dbHost, Config::$dbUser, Config::$dbPassword, Config::$dbName);
    }

    public function processUser($data){
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $email = $data['email'];
        $nick = $data['nick'];
        $pass = $data['pass'];
        $tipo = $data['tipo'];

        $sql = "INSERT INTO usuarios (nombre, apellidos, email, nick, password, tipo) values ('$nombre','$apellidos','$email','$nick','$pass','$tipo')";  //formulamos la petición a la db

        $insert = $this->db->sqlOther($sql); 

        if ($insert == 1) { 
            return true;
        } else {
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
        
        $sql = "SELECT id, tipo FROM usuarios WHERE nick = '$userNick' AND password = '$userPass'";

        $result = $this->db->sqlSelect($sql); //aplicamos capa de abstracción 
        echo "ha pasado por la petición select <br/>";
        if (count($result) > 0) {
            echo"devuelve una fila";
            $row = $result[0];
            return $row;
        } else {
            echo "no devuelve nada";
            return null;
        }
        return $userExist;
    }
    public function delete($id){
      
        $borraUsuario = $this->db->sqlOther("DELETE FROM usuarios WHERE id = $id");
        if ($borraUsuario == 1) {
            $borrado = true;
        } else {
            $borrado = false;
        }
        return $borrado;
    }

    public function update($data){
        
        $id = $data['id'];
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $email = $data['email'];
        $nick = $data['nick'];
        $pass = $data['pass'];
        $tipo = $data['tipo'];

        $sql = "UPDATE usuarios SET id = $id, nombre = '$nombre', apellidos = '$apellidos', email = '$email', nick = '$nick', password = '$pass', tipo = '$tipo' WHERE id = $id"; //formulamos la petición a la db

        $editaUsuario = $this->db->sqlOther($sql); // al objeto db que es la conexion con la DB le pasamos la petición modificar usuarios

        if ($editaUsuario == 1) {
            $modificado = true;
        } else {
            $modificado = false;
        }
        return $modificado;
    }
}
