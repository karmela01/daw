   <?php

    echo "<h3 align='center'>USUARIOS</h3>";
    if (isset($data["mensaje"])) {
      echo $data["mensaje"];
    }
    echo "
      <form align = right action='index.php' method='get'>
         <input type='hidden' name='controller' value='UserController'>
         <input type='hidden' name='do' value='logOut'>
         <input type='submit' name= 'salir' value= 'Salir'><br/>
          </form>
          <br/>

    <form align = left action='index.php' method='get'>
     <input type='hidden' name='controller' value='userController'>
     <input type='hidden' name='do' value='selectView'>
     <input type='submit' name= 'atras' value= 'Atrás'>
     </form><br/>     
     ";

    echo "<table class='table table-bordered'>";

    echo "<thead><tr>";
    if ($data["tipoUsuario"] == 0) {
      echo "<th>Id</th>";
    }
    echo "<th>Nombre</th><th>Apellidos</th><th>Email</th><th>Nick</th><th>Contraseña</th><th>Tipo</th><th>Accion1</th><th>Accion2</th></tr></thead>";
    foreach ($data["listaUsuarios"] as $usuario) {

      if ($data["tipoUsuario"] == 0) {
        echo "<tr><td>" . $usuario->id;
      }
      echo " <td>" . $usuario->nombre . "<td> " . $usuario->apellidos . "<td> " . $usuario->email . " <td>" . $usuario->nick . "<td> " . $usuario->password . " <td>" . $usuario->tipo;
      echo "<td><a href='index.php?controller=UserController&do=showUserEdit&id=$usuario->id'>Modificar</a>
        <td><a href='index.php?controller=UserController&do=delete&id=$usuario->id'>Borrar</a>
        </td>
        </tr>";
    }
    echo "</table>";

    echo "         
         <form action='index.php' method='get'>
         <input type='hidden' name='controller' value='UserController'>
         <input type='hidden' name='do' value='showFormNewUser'>
         <input type='submit' name= 'nuevo' value= 'Nuevo Usuario'><br/>
          </form> ";
