<?php

echo "<h3 align= 'center'>Inserte persona</h3>";

if(isset($data["mensaje"])) {
    echo $data["mensaje"];
}

echo"

<form action= 'index.php' method= 'get'>
<input type = 'hidden' name = 'do' value= 'insertPeople'  ><br/>

Name<input type = 'text' class='form-control' name = 'name' value= ''  ><br/>
Photo<input type = 'text' class='form-control' name = 'photo' value= ''  ><br/>
External_url<input type = 'text' class='form-control' name = 'external_url' value= ''  ><br/>


<input type='submit' class='btn btn-primary' name = 'enviar' value='Insertar' >

<!--<input type = 'submit' class='btn btn-danger' name = 'volver' value ='<a href='index.php?do=prueba'>'Volver donde sea'</a>'> -->
</form>
         
<form action='index.php' method='get'>
<input type='hidden' name='do' value='prueba'>
<input type='submit'class='btn btn-danger' name = 'volver' value = 'Volver donde sea'><br/>
 </form>        

'";
