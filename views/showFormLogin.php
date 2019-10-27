<?php

echo "<h3 align = center>Login</h3><br/>";
if (isset($data["mensaje"])) {
    echo $data["mensaje"];
}
echo "<h5 align = center>Introduzca usuario y contraseña para entrar.</h5><br/>";

echo "            
                    <br/>
                    <form align = center action='index.php' method='get'>
                    <div class='row'>
                    <div class='col'>
                    <input type='hidden' name='controller' value='userController'>
                    <input type='hidden' name='do' value='processLogin'>

                        Nick:
                        <input type='text' name='nick'><br/><br/>
                        Password:
                        <input type='text' name='pass'><br/><br/>
                                                
                        <input type='submit'  class='btn btn-primary' name= 'enviar' value= 'Entrar'><br/>
                    </div>
                    </div>
                    </form>
                    <br/>
                    <br/>
                  
                   <!-- <input type='button' class='btn btn-secondary' value='Volver a inicio' name='salir' OnClick='location.href='index.php''>-->";

echo "
                    <form align = center action='index.php' method='get'>
                    <input type='hidden' name='controller' value='UserController'>
                    <input type='hidden' name='do' value='logOut'>
                    <input type='submit' name= 'salir' value= 'Salir'><br/>
                </form>
                    ";
