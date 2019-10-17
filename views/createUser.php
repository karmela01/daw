<?php
echo "<h5>Insertar nuevo usuario</h5>";

               echo "<form action= 'index.php' method= 'get'>";
               echo " <input type= "hidden" name= "do" value= "processNewUser"><br/>";
               echo " Nombre: <input type= "text" name= "nombre" ><br/>";
               echo "Apellidos: <input type="text" name = "apellidos"><br/>";         
               echo "  email: <input type="text" name="email"><br/>";
               echo "Nick: <input type="text" name="nick"><br/>";
               echo "Password: <input type="text" name="pass"><br/>";
                    if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]== 0){
               echo "Tipo";
               echo "<input type= 'checkbox' name= 'tipo' value= '0'>Administador<br/>";
               echo "<input type= 'checkbox' name = 'tipo' value = '1'>Usuario<br/>";
                     }
               echo "<input type= "submit" name= "enviar" value= "Enviar"><br/>";
               echo "</form>";

?>

                
                
                 
                 
                 
                 
                
                
                 
                 