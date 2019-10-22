<?php
echo "

    <h3 align = center> pagina principal</h3>

    <table class='table table-bordered'>

     <thead><tr>
       <th>ID</th><th>Title</th><th>year</th><th>duration</th><th>rating</th><th>cover</th><th>filename</th><th>filepath</th><th>external_url</th><th>accion1</th><th>accion2</th></thead>";
        foreach ($data["verPeliculas"] as $pelicula) {
          
      echo "
      <td>".$pelicula->id."<td> ".$pelicula->title."<td> ".$pelicula->year." <td>".$pelicula->duration."<td> ".$pelicula->rating." <td>".$pelicula->cover." <td>".$pelicula->filename." <td>".$pelicula->filepath." <td>".$pelicula->external_url;
        echo "<td><a href='index.php?do=showEditMovies&id=$pelicula->id'>Modificar</a>
        <td><a href='index.php?do=delete&id=$pelicula->id'>Borrar</a>
        </td>
        </tr>";
         } 
         echo "</table>
       
         <form action='index.php' method='get'>
         <input type='hidden' name='do' value='insertMovie'>
         <input type='submit' name= 'nuevo' value= 'Insertar'><br/>
          </form>        
         <br>
         <form action='index.php' method='get'>
         <input type='hidden' name='do' value='logOut'>
         <input type='submit' name= 'salir' value= 'Salir'><br/>
          </form>";
         

