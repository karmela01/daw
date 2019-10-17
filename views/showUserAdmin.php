   <?php

echo "estoy en showUserAdmin de las vistas";
        echo "<h3 align='center'>USUARIOS</h3>";
        if(isset($data["mensaje"])) {
          echo $data["mensaje"];
      }
             
        echo "<table class='table table-bordered'>";

        echo "<thead><tr>";
        if ($data["tipoUsuario"] == 0) {       
          echo "<th>Id</th>";
     }
        echo "<th>Nombre</th><th>Apellidos</th><th>Email</th><th>Nick</th><th>Contraseña</th><th>Tipo</th><th>Accion1</th><th>Accion2</th></tr></thead>";
        foreach ($data["listaUsuarios"] as $usuario) {
          //$id = $usuario->id;
          //echo "el id del usuario es: ";
          //var_dump($id);
         if ($data["tipoUsuario"] == 0) {       
              echo "<tr><td>".$usuario->id;
         }
         echo " <td>".$usuario->nombre."<td> ".$usuario->apellidos."<td> ".$usuario->email." <td>".$usuario->nick."<td> ".$usuario->password." <td>".$usuario->tipo;
        echo "<td><a href='index.php?do=showUserEdit&id=$usuario->id'>Modificar</a>
        <td><a href='index.php?do=delete&id=$usuario->id'>Borrar</a>
        </td>
        </tr>";
         } 
         echo "</table>";

         echo "         
         <form action='index.php' method='get'>
         <input type='hidden' name='do' value='showFormNewUser'>
         <input type='submit' name= 'nuevo' value= 'Nuevo Usuario'><br/>
          </form>        
         <br>
         <form action='index.php' method='get'>
         <input type='hidden' name='do' value='logOut'>
         <input type='submit' name= 'salir' value= 'Salir'><br/>
          </form>";
          var_dump($usuario->id);
          
       /* echo"<input type='button' class='btn btn-primary' value='Nuevo Usuario' name='nuevo' OnClick='location.href='index.php?do=showFormNewUser''>
             <input type='button' class='btn btn-secondary' value='Salir' name='salir' OnClick='location.href='index.php?do=logOut'>";

               echo"<td><input type='button' class='btn btn-link' value='Modificar' name='modificar' OnClick='location.href='index.php?do=editUser&id=<?php echo $usuario->id? '>
                 <td><input type='button' class='btn btn-link' value='Eliminar' name='eliminar' OnClick='location.href='index.php?do=deleteUser&id=<?php echo $usuario->id? '>
            */
             