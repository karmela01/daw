<?php
    
    class View {
        public static function show($fileName,$viewName, $data=null) { //para mostrarnos las vistas que vamos creando
            include("$fileName/header.php");
            include("$fileName/$viewName.php");
            include("$fileName/footer.php");  
        }

        public static function redirect($fileName,$actionName, $data=null) { // para redirigirnos al siguiente paso cuando vamos con un href o location
            $url = "<script>location.href='index.php?controller=$fileName&do=$actionName'";
            if ($data != null) {
                foreach ($data as $clave=>$valor) {
                    $url = $url . "&" . $clave . "=" . $valor;
                }
            }
            $url = $url . "</script>'";
            echo $url;
        }
    }