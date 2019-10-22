<?php
//echo " estoy en formEdit de las vistas<br/>";

echo"
 <h3 align = 'center'>Rellene los campos que desee modificar</h3>

 <form action= 'index.php' method= 'get'>
 <div class='row'>
  <div class='col'>
  <input type= 'hidden' name= 'do' value= 'edit'><br/>";


 $movieToEdit = $data["editMovies"][0];

  
 echo " 

 <input type= 'hidden' name= 'id' class='form-control' value ='$movieToEdit->id'><br/>'
 
Name:

<input type= 'text' name= 'title' class='form-control' value ='$movieToEdit->title'><br/>'
  
  Year:

 <input type= 'text' name= 'year' class='form-control' value= '$movieToEdit->year'><br/>'

  Duration:
 
 <input type= 'text' name= 'email' class='form-control' value= '$movieToEdit->duration'><br/>'

  Rating:

  <input type= 'text' name= 'nick' class='form-control' value= '$movieToEdit->rating'><br/>'

  Cover:

<input type= 'text' name= 'pass' class='form-control' value= '$movieToEdit->cover'><br/>'

Filename:

<input type= 'text' name= 'pass' class='form-control' value= '$movieToEdit->filename'><br/>'

Filepath:

<input type= 'text' name= 'pass' class='form-control' value= '$movieToEdit->filepath'><br/>'

External_url:

<input type= 'text' name= 'pass' class='form-control' value= '$movieToEdit->external_url'><br/>'

  

  <input type= 'submit' name= 'enviar' value= 'Enviar'><br/>";
 echo "</div>
 </div>
  </form>";