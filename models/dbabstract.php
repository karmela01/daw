<?php
//include("config.php"); // aqui está la clase config con los datos de conexión a la DB 

class DBAbstract{ 

    private $mysql; 

    /**
     * en el constructor creamos el objeto DBAbstract($this) con los parámetros de config
     */
    public function __construct($dbHost,$dbUser,$dbPassword,$dbName){ 
        $this->mysql = new mysqli($dbHost,$dbUser,$dbPassword,$dbName);
    }
    /**
     * Esta función envia una consulta SELECT a la base de datos 
     * @return un array con el resultado de la consulta
     * $result es la consulta SELECT
     * $a es el array en el que se guardará el resultado del SELECT
     * en el while, $row es cada fila que resulta del SELECT
     * finalmente, cada fila($row) se almacenará en el array $a
     */
    public function sqlSelect($sql){
        $result = $this->mysql->query($sql); 
        $a = array();
        while($row = $result->fetch_object()){
            $a[] = $row;
        }
        return $a;
    }
    /**
     * Con esta función enviamos una consulta a la DB que NO SEA SELECT
     * por eso la llamamos sqlOther. 
     * En este caso, @return NUMERO de registros devueltos por la consulta.
     */
    public function sqlOther($sql){
        $this->mysql->query($sql);
        return $this->mysql->affected_rows;
    }

}
