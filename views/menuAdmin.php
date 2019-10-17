<?php

echo "<table border = '1'>";
while($muestraTodosUsuarios = $buscaTodosUsuarios->fetch_object()){
   echo "<tr><td>".$muestraTodosUsuarios->id." <td>".$muestraTodosUsuarios->nombre."<td> ".$muestraTodosUsuarios->apellidos."<td> ".$muestraTodosUsuarios->email." <td>".$muestraTodosUsuarios->nick."<td> ".$muestraTodosUsuarios->password." <td>".$muestraTodosUsuarios->tipo."<td>";
    echo "<td><input type="button" value="Modificar" name="modificar" OnClick="location.href='index.php?do=editUser&id=<?php echo $muestraTodosUsuarios->id?>' ">";
    echo "<td><input type="button" value="Eliminar" name="eliminar" OnClick="location.href='index.php?do=deleteUser&id=<?php echo $muestraTodosUsuarios->id?>' ">";
    echo "  </td>   </tr>  ";
    echo "</table>";
    }   
    echo "<input type="button" value="Nuevo Usuario" name="modificar" OnClick="location.href='index.php?do=showFormNewUser'">";
    echo "<input type="button" value="Salir" name="modificar" OnClick="location.href='index.php?do=logOut'">";

  ?>