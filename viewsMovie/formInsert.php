<?php

echo "<h3 align= 'center'>Inserte nueva película</h3>";

if(isset($data["mensaje"])) {
    echo $data["mensaje"];
}

echo"

<!--<form action= 'index.php' method= 'get'>-->
<form enctype='multipart/form-data' action= 'index.php' method= 'post'>
<input type='hidden' name='controller' value='MovieController'>
<input type = 'hidden' name = 'do' value= 'processInsert'  ><br/>


Title<input type = 'text' class='form-control' name = 'title'><br/>
Year<input type = 'text' class='form-control' name = 'year'><br/>
Duration<input type = 'text' class='form-control' name = 'duration'><br/>
Rating<input type = 'text' class='form-control' name = 'rating'><br/>
<!--Cover<input type='text' class='form-control' name='cover'>-->
<input type='hidden' name='MAX_FILE_SIZE' value='400000' >
Cover<input type='file' class='form-control' name='cover'><br/>


Filename<input type = 'text' class='form-control' name = 'filename' ><br/>
Filepath<input type = 'text' class='form-control' name = 'filepath'><br/>
External_url<input type = 'text' class='form-control' name = 'external_url'><br/>


<input type='submit' class='btn btn-primary' name = 'enviar' value='Insertar' >

<!--<input type = 'submit' class='btn btn-danger' name = 'volver' value ='<a href='index.php?controller=MovieController&do=prueba'>'Volver donde sea'</a>'> -->
</form>
         
<form action='index.php' method='get'>
<input type='hidden' name='controller' value='MovieController'>
<input type='hidden' name='do' value='prueba'>
<input type='submit'class='btn btn-danger' name = 'volver' value = 'Volver donde sea'><br/>
 </form>        

'";



