<html>
    <head>
        <title>Piedra, Papel, Tijera, Lagarto, Spock</title>
          <meta charset="utf-8"/>
    </head>
    <body background="huiga.jpg">
        <?php
            $respuesta=$_POST['pptls'];
            if(isset($respuesta))
            {
               $rand= rand(0,4);
                /* 0 piedra
                   1 papel
                   2 tijera
                   3 lagarto
                   4 spock*/
                
                // logica del juego
                  if($rand==0 and $respuesta=="0" or $rand==1 and $respuesta=="1" or $rand==2 and $respuesta=="2" or $rand==3 and $respuesta=="3" or $rand==4 and $respuesta=="4")
                  {
                      echo "<img src=\"images/empate.jpg\" />";  
                  }
                elseif ($rand==0 and $respuesta==4 or $rand==0 and $respuesta==2 or $rand==1 and $respuesta==0 or $rand==1 and $respuesta==4 or $rand==2 and $respuesta==1 or $rand==2 and $respuesta==3 or $rand==3 and $respuesta==4 or $rand==3 and $respuesta==1 or $rand==4 and $respuesta==2 or $rand==4 and $respuesta==0)
                {
                    echo "<img src=\"images/win.jpg\" />";
                    
                }
                else
                {
                    echo "<img src=\"images/perder.jpg\" />";
                }
                
                
                echo "<p>¿Quieres volver a jugar?";
                //volver a jugar
                echo "<form action=\"index.html\">";
                echo "<input type=\"submit\" value=\"Si\"/></form>";
                echo "<form action=\"pag3.html\">";
                echo "<input type=\"submit\" value=\"No\"></form>"; 
               
               
                
            }
            else
            { 
              
                echo "<a href=\"index.html\">Debes Seleccionar una opción. </a>";
            }
        ?>
    
    
    </body>


</html>