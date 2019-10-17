<?php
echo " estoy en formEdit de las vistas<br/>";

echo"
 <h3 align = 'center'>Rellene los campos que desee modificar y haga click en 'Enviar'</h3>

 <form action= 'index.php' method= 'get'>
 <div class='row'>
  <div class='col'>
  <input type= 'hidden' name= 'do' value= 'edit'><br/>";


 $userParaEditar = $data["editaUsuario"][0];

  
 echo " 

 <input type= 'hidden' name= 'id' class='form-control' value ='$userParaEditar->id'><br/>'
 
  Nombre: 


<input type= 'text' name= 'nombre' class='form-control' value ='$userParaEditar->nombre'><br/>'
  
  Apellidos:

 <input type= 'text' name= 'apellidos' class='form-control' value= '$userParaEditar->apellidos'><br/>'

  email:
 
 <input type= 'text' name= 'email' class='form-control' value= '$userParaEditar->email'><br/>'

  Nick:

  <input type= 'text' name= 'nick' class='form-control' value= '$userParaEditar->nick'><br/>'

  Password:

<input type= 'text' name= 'pass' class='form-control' value= '$userParaEditar->password'><br/>";

  
  if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]== 0){
      echo "Tipo';
      '<br/>";
      echo "<input type= 'checkbox' name= 'tipo' value= '0'>Administador<br/>";
      echo "<input type= 'checkbox' name = 'tipo' value = '1'>Usuario<br/>";
  }
 
 echo "
  <input type= 'submit' name= 'enviar' value= 'Enviar'><br/>";
 echo "</div>
 </div>
  </form>";
/*

 } else if($tipo == 1){

     $id = $_SESSION["id"];
     $db = new mysqli('localhost','root','','practica01');
     
     $seleccionaUsuario = $db->query("SELECT * FROM usuarios WHERE id = $id");
     $verUsuario = $seleccionaUsuario->fetch_object();
     ?>
       <h3>Rellene los campos que desee modificar y haga click en 'Enviar'</h3>

             <form action= "index.php" method= "get">
             <div class="row">
             <div class="col">
                 <input type= "hidden" name= "do" value= "processEditUser"><br/>
                 <?php
                 echo "<input type= 'hidden' name= 'id' class='form-control' value =".$verUsuario->id."><br/>";
                 ?>   
                 Nombre: 
                 <?php
                 echo "<input type= 'text' name= 'nombre' class='form-control' value =".$verUsuario->nombre."><br/>";
                 ?>   
                 Apellidos:
                 <?php
                 echo "<input type= 'text' name= 'apellidos' class='form-control' value= ".$verUsuario->apellidos."><br/>";
                 ?>
                 email:
                 <?php
                 echo "<input type= 'text' name= 'email' class='form-control' value= ".$verUsuario->email."><br/>";
                 ?>
                 Nick:
                 <?php
                 echo "<input type= 'text' name= 'nick' class='form-control' value= ".$verUsuario->nick."><br/>";
                 ?>
                 Password:
                 <?php
                 echo "<input type= 'text' name= 'pass' class='form-control' value= ".$verUsuario->password."><br/>";
                 
                 if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]== 0){
                     echo "Tipo";
                     echo "<br/>";
                     echo "<input type= 'checkbox' name= 'tipo' value= '0'>Administador<br/>";
                     echo "<input type= 'checkbox' name = 'tipo' value = '1'>Usuario<br/>";
                 }
                 ?>
                 <input type= "submit" name= "enviar" value= "Enviar"><br/>
             </div>
             </div>
                 </form>
                 <?php
         }else {
             echo "Error. Usuario no reconocido.";

             Id: <input type= 'text' name= 'id' class='form-control' value ='$userParaEditar->id'><br/>'
            
         } */






