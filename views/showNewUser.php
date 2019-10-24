 <?php
 
 echo "<h3 align='center'>USUARIOS</h3>";
                            
                        echo "<table class='table table-bordered'>";

                        echo "<thead><tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Nick</th><th>Contraseña</th><th>Tipo</th><th>Accion1</th><th>Accion2</th></tr></thead>";

                            while($muestraTodosUsuarios = $buscaTodosUsuarios->fetch_object()){
                               echo "<tr><td>".$muestraTodosUsuarios->id." <td>".$muestraTodosUsuarios->nombre."<td> ".$muestraTodosUsuarios->apellidos."<td> ".$muestraTodosUsuarios->email." <td>".$muestraTodosUsuarios->nick."<td> ".$muestraTodosUsuarios->password." <td>".$muestraTodosUsuarios->tipo;
                                ?>
                                <td><input type="button" class="btn btn-link" value="Modificar" name="modificar" OnClick="location.href='index.php?controller=UserController&do=editUser&id=<?php echo $muestraTodosUsuarios->id? ">
                                <td><input type="button" class="btn btn-link" value="Eliminar" name="eliminar" OnClick="location.href='index.php?controller=UserController&do=deleteUser&id=<?php echo $muestraTodosUsuarios->id? ">
                                </td>
                               </tr>  
                            <?php  
                            }
                            ?>
                            </tbody>
                        </table>
                         
                            <input type="button" class="btn btn-primary" value="Nuevo Usuario" name="nuevo" OnClick="location.href='index.php?controller=UserController&do=showFormNewUser'">
                            <input type="button" class="btn btn-secondary" value="Salir" name="salir" OnClick="location.href='index.php?controller=UserController&do=logOut'">
                            
                        <?php     