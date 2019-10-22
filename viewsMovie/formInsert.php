<?php

echo "<h3 align= 'center'>Inserte nueva película</h3>";

if(isset($data["mensaje"])) {
    echo $data["mensaje"];
}

echo"

<form action= 'index.php' method= 'get'>
<input type = 'hidden' name = 'do' value= 'insertMovie'  ><br/>

Title<input type = 'text' class='form-control' name = 'title' value= ''  ><br/>
Year<input type = 'text' class='form-control' name = 'year' value= ''  ><br/>
Duration<input type = 'text' class='form-control' name = 'duration' value= ''  ><br/>
Rating<input type = 'text' class='form-control' name = 'rating' value= ''  ><br/>
Cover<input type = 'text' class='form-control' name = 'cover' value= ''  ><br/>
Filename<input type = 'text' class='form-control' name = 'filename' value= ''  ><br/>
Filepath<input type = 'text' class='form-control' name = 'filepath' value= ''  ><br/>
External_url<input type = 'text' class='form-control' name = 'external_url' value= ''  ><br/>


<input type='submit' class='btn btn-primary' name = 'enviar' value='Insertar' >

<!--<input type = 'submit' class='btn btn-danger' name = 'volver' value ='<a href='index.php?do=prueba'>'Volver donde sea'</a>'> -->
</form>
         
<form action='index.php' method='get'>
<input type='hidden' name='do' value='prueba'>
<input type='submit'class='btn btn-danger' name = 'volver' value = 'Volver donde sea'><br/>
 </form>        

'";



