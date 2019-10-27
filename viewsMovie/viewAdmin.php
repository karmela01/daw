<?php

echo "
<h3 align = center> pagina principal</h3>";

if (isset($data["mensaje"])) {
  echo $data["mensaje"];
}
echo "

<form align = left action='index.php' method='get'>
     <input type='hidden' name='controller' value='userController'>
     <input type='hidden' name='do' value='selectView'>";
if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == 0) {
  echo "
     <input type='submit' name= 'atras' value= 'Atrás'><br/>";
} else {
  echo "
      <input type='hidden' name= 'atras' value= 'Atrás'><br/>";
}
echo "
     </form>
     <form align = right action='index.php' method='get'>
     <input type='hidden' name='controller' value='userController'>
     <input type='hidden' name='do' value='login'>";
if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == 0) {
  echo "
     <input type='hidden' name= 'registro' value= 'Login'><br/>";
} else {
  echo "
      <input type='submit' name= 'registro' value= 'Login'><br/>";
}
echo "
      </form> ";

if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == 0) {
  echo " 
      <form align = right action='index.php' method='get'>
     <input type='hidden' name='controller' value='userController'>
     <input type='hidden' name='do' value='logOut'>
     <input type='submit' name= 'salida' value= 'Logout'><br/>
      </form> ";
}
echo "      
     <br>

<table class='table table-bordered'>

 <thead><tr>
   <th>ID</th><th>Title</th><th>year</th><th>duration</th><th>rating</th><th>cover</th><th>filename</th><th>filepath</th><th>external_url</th><th>accion1</th><th>accion2</th></thead>";
foreach ($data["verPeliculas"] as $pelicula) {

  echo "
  <td>" . $pelicula->id . "<td> " . $pelicula->title . "<td> " . $pelicula->year . " <td>" . $pelicula->duration . "<td> " . $pelicula->rating . " <td>" . $pelicula->cover . " <td>" . $pelicula->filename . " <td>" . $pelicula->filepath . " <td>" . $pelicula->external_url;
  echo "<td><a href='index.php?controller=MovieController&do=showEditMovies&id=$pelicula->id'>Modificar</a>
    <td><a href='index.php?controller=MovieController&do=delete&id=$pelicula->id'>Borrar</a>
    </td>
    </tr>";
}
echo "</table>";
   
if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == 0) {
  echo"
     <form action='index.php' method='get'>
     <input type='hidden' name='controller' value='movieController'>
     <input type='hidden' name='do' value='insertMovie'>
     <input type='submit' name= 'nuevo' value= 'Insertar'><br/>
      </form>        
     <br>
     ";
}
