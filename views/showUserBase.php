<?php

echo "estoy en showUserBase de las vistas";
 echo "<h3 align='center'>Tus Datos</h3>";   
 /*if(isset($data["mensaje"])) {
  echo $data["mensaje"];
}    */               
 echo "<table class='table table-bordered'>";
 echo "<thead><tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Nick</th><th>Contraseña</th><th>Accion1</th><th>Accion2</th></tr></thead>";
 
 //foreach($data["unUsuario"] as $muestraUnUsuario)
     //var_dump($unUsuario);
     if($data["unUsuario"]){
       $buscoUno = $data["unUsuario"];
       var_dump($buscoUno);
       $id = $buscoUno->id;
       echo "el id del usuario es: ";
   var_dump($id);

 
echo "<tr><td>".$buscoUno->nombre."<td> ".$buscoUno->apellidos." <td>".$buscoUno->email." <td>".$buscoUno->nick." <td>".$buscoUno->password;
                             
echo "<td><a href='index.php?do=showUserEdit&id=$buscoUno->id'>Modificar</a>
<td><a href='index.php?do=delete&id=$buscoUno->id'>Borrar</a>
</td>
</tr>";
 }
   echo "</table>";
   
   //<input type='button' class='btn btn-secondary' value='Salir' name='salir' OnClick='location.href='index.php?do=logOut''>";
   echo "
   <form action='index.php' method='get'>
   <input type='hidden' name='do' value='logOut'>
   <input type='submit' name= 'salir' value= 'Salir'><br/>
</form>
   ";
   var_dump($buscoUno->id);