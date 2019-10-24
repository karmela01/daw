<?php

echo "
<h4 align = center> Elegir opción para editar</h3>
<br/>



     <form align = center action='index.php' method='get'>
          <input type='hidden' name='controller' value='userController'>
          <input type='hidden' name='do' value='showUser'>
          <input type='submit' name= 'user' value= 'Usuarios'><br/>
     </form>

     <form align = center action='index.php' method='get'>
          <input type='hidden' name='controller' value='movieController'>
          <input type='hidden' name='do' value='showAdmin'>
          <input type='submit' name= 'movie' value= 'Películas'><br/>
     
     </form>";   
