<?php

    echo "<table border = '1'>";
        while($muestraUnUsuario = $buscaUnUsuario->fetch_object()){
    echo "<tr><td>".$muestraUnUsuario->id."<td> ".$muestraUnUsuario->nombre."<td> ".$muestraUnUsuario->apellidos." <td>".$muestraUnUsuario->email." <td>".$muestraUnUsuario->nick." <td>".$muestraUnUsuario->password."<td> ".$muestraUnUsuario->tipo."<td>";
    echo "<td><a href='index.php?do=editUser'>Modificar</a></td>";
    echo "<td><a href='index.php?do=deleteUser'>Borrar</a></td>";
    echo "</tr>";
            }
    echo "</table>";
    echo "<input type="button" value="Salir" name="modificar" OnClick="location.href='index.php?do=logOut'">";
   
?>