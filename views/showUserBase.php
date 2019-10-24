<?php

echo "estoy en showUserBase de las vistas";
 echo "<h3 align='center'>Tus Datos</h3>"; 
              
 echo "<table class='table table-bordered'>";
 echo "<thead><tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Nick</th><th>Contraseña</th><th>Accion1</th><th>Accion2</th></tr></thead>";
 
 
     if($data["unUsuario"]){
       $buscoUno = $data["unUsuario"];
       var_dump($buscoUno);
       $id = $buscoUno->id;
       echo "el id del usuario es: ";
   var_dump($id);

 
echo "<tr><td>".$buscoUno->nombre."<td> ".$buscoUno->apellidos." <td>".$buscoUno->email." <td>".$buscoUno->nick." <td>".$buscoUno->password;
                             
echo "<td><a href='index.php?controller=UserController&do=showUserEdit&id=$buscoUno->id'>Modificar</a>
<td><a href='index.php?controller=UserController&do=delete&id=$buscoUno->id'>Borrar</a>
</td>
</tr>";
 }
   echo "</table>";
   echo "
   <form action='index.php' method='get'>
   <input type='hidden' name='controller' value='UserController'>
   <input type='hidden' name='do' value='logOut'>
   <input type='submit' name= 'salir' value= 'Salir'><br/>
</form>
   ";
  