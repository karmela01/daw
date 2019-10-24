 <?php
                echo "<h4 align = 'center'>Pagina principal</h4></br>";

echo "<div align = 'center'>";

               if(isset($data["mensaje"])) {
                    echo $data["mensaje"];
                }                 
                echo"<br/>";
                echo"<br/>";
                echo "Si aún no eres usuario ve a registro</br>";
                echo "Si ya eres usuario ve al login</br>";                
                echo "</br>";
                echo "</br>";
                echo"

                <form action = 'index.php' method = 'get'>
                <input type='hidden' name='controller' value='UserController'>
                <input type= 'hidden' name= 'do' value= 'showFormNewUser'>
                <input type= 'submit' name= 'registro' value='Registro'><br/>
                </form>

                <form action= 'index.php' method='get'>
                <input type='hidden' name='controller' value='UserController'>
                <input type= 'hidden' name= 'do' value= 'login'>
                <input type= 'submit' name= 'login' value= 'Login'>
                </form>
                </div>";