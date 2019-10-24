<?php
class Security{
    public function __construct(){
        session_start();
        
    }

    /**
     * esta función abre la sesion
     * @param array , el parámetro de esta función es un array 
     * con las variables de sesión que se van a crear ($vars).
     * Con el bucle foreach estamos adjudicando al array $vars
     *  un valor ($value) para el índice $var, es decir, en la
     * posición $var se va guardando el valor $value del array 
     * $vars, así, la variable de sesión llamada $var tendrá el 
     * valor $value
     */
    public function openSession($vars){
        foreach($vars as $var=>$value){
            $_SESSION[$var] = $value;
        }
    }

    /**
     * Ahora, con la función closeSession cerramos la sesión.
     */
    public function closeSession() {
        session_destroy();
    }

    /**
     * con la función get obtenemos (devuelve) el valor de una 
     * variable de sesión.
     * @param String $var, el parámetro a introducir es el nombre de 
     * la variable ($var). Si existe una variable de sesión con el nombre
     * proporcionado en la variable $var, nos devuelve el valor de esa 
     * variable de sesión, si no existe, devuelve -1, que es el valor
     * que hemos establecido para el error. 
     */
    
     public function get($var){
         if(isset($_SESSION[$var])){
             return $_SESSION[$var];
         }else{
            return -1;
         }
        
     }
}