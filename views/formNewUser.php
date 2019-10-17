<?php
echo"estoy en el formulario de nuevo usuario";
/*if(isset($data['tipoUsuario'])){
    $tipo = $data['tipoUsuario'];
    var_dump($tipo);
}*/

echo "
<h5>Insertar nuevo usuario</h5>

<form action= 'index.php' method= 'get'>

<input type= 'hidden' name= 'do' value= 'processNewUser'><br/>
Nombre:
<input type= 'text' class='form-control' name= 'nombre' ><br/>
Apellidos:
<input type='text' class='form-control' name = 'apellidos'><br/>
email:
<input type='text' class='form-control' name='email'><br/>
Nick:
<input type='text' class='form-control' name='nick'><br/>
Password:
<input type='text' class='form-control' name='pass'><br/>";


if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]== 0){ 
    echo "Tipo";
    echo "<br/>";   
    echo "<input type= 'checkbox' name= 'tipo' value= '0'>Administador<br/>";
    echo "<input type= 'checkbox' name = 'tipo' value = '1'>Usuario<br/>";
}
echo "<input type= 'submit' class='btn btn-primary' name= 'enviar' value= 'Enviar'><br/>
</form>
<br/>
<form action='index.php' method='get'>
<input type='hidden' name='do' value='logOut'>
<input type='submit' name= 'salir' value= 'Salir'><br/>
 </form>
<form action='index.php' method='get'>
<input type='hidden' name='do' value='showMainPage'>
<input type='submit' name= 'inicio' value= 'Volver a Inicio'><br/>
 </form>";

