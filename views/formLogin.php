<?php
echo "<h3>Login</h3><br/>";  

echo "Introduzca usuario y contraseña para entrar.<br/>";

echo "<form action="index.php" method="get">";
echo " <input type='hidden' name='do' value='processLogin'>";
echo "Nick: <input type='text' name='nicklog'><br/>";
echo "Password: <input type='text' name='passlog'><br/>";
echo "<input type='submit' name= 'enviar' value= 'Entrar'><br/>";
echo " </form>";
?>