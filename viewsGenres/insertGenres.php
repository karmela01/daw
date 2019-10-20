<?php

echo "<h3 align= 'center'>Inserte género</h3>";

if(isset($data["mensaje"])) {
    echo $data["mensaje"];
}

echo"

<form action= 'index.php' method= 'get'>
<input type = 'hidden' name = 'do' value= 'insertGenre'  ><br/>

Description<input type = 'text' class='form-control' name = 'description' value= ''  ><br/>

<input type='submit' class='btn btn-primary' name = 'enviar' value='Insertar' >

<!--<input type = 'submit' class='btn btn-danger' name = 'volver' value ='<a href='index.php?do=prueba'>'Volver donde sea'</a>'> -->
</form>
         
<form action='index.php' method='get'>
<input type='hidden' name='do' value='prueba'>
<input type='submit'class='btn btn-danger' name = 'volver' value = 'Volver donde sea'><br/>
 </form>        

'";