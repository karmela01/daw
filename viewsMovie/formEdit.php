<?php

$movieToEdit = $data["editMovies"][0];
 var_dump($movieToEdit);

echo"
 <h3 align = 'center'>Rellene los campos que desee modificar</h3>

 <form action= 'index.php' method= 'get'>
 <div class='row'>
  <div class='col'>
  <input type='hidden' name='controller' value='MovieController'>
  <input type= 'hidden' name= 'do' value= 'edit'><br/>

    <input type= 'hidden' name= 'id' class='form-control' value ='$movieToEdit->id'><br/>'
 
Name:

    <input type= 'text' name= 'title' class='form-control' value ='$movieToEdit->title'><br/>'
  
Year:

    <input type= 'text' name= 'year' class='form-control' value= '$movieToEdit->year'><br/>'

Duration:
 
    <input type= 'text' name= 'duration' class='form-control' value= '$movieToEdit->duration'><br/>'

Rating:

    <input type= 'text' name= 'rating' class='form-control' value= '$movieToEdit->rating'><br/>'

Cover:

    <input type= 'text' name= 'cover' class='form-control' value= '$movieToEdit->cover'><br/>'

Filename:

    <input type= 'text' name= 'filename' class='form-control' value= '$movieToEdit->filename'><br/>'

Filepath:

    <input type= 'text' name= 'filepath' class='form-control' value= '$movieToEdit->filepath'><br/>'

External_url:

    <input type= 'text' name= 'external_url' class='form-control' value= '$movieToEdit->external_url'><br/>'

  

  <input type= 'submit' name= 'enviar' value= 'Enviar'><br/>";
 echo "</div>
 </div>
  </form>";