<?php

if(isset($data["mensaje"])) {
    echo ($data["mensaje"]);
echo "
<h5>Insertar nuevo usuario</h5>

<form action= 'index.php' method= 'get'>
<div class='row'>

<div class='col-xs-5'>
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
echo "Tipo";
echo "<br/>";
if($data['tipoUsuario'] == 0){ 
   
    echo "<input type= 'checkbox' name= 'tipo' value= '0'>Administador<br/>";
    echo "<input type= 'checkbox' name = 'tipo' value = '1'>Usuario<br/>";
}

echo "<input type= 'submit' class='btn btn-primary' name= 'enviar' value= 'Enviar'><br/>
</div>
</div>
</form>
<br/>
<br/>
<input type='button' class='btn btn-secondary' value='Volver a inicio' name='salir' OnClick='location.href=mainPage.php''>";

