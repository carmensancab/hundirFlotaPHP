<html>
    <head>
        <title>HUNDIR LA FLOTA</title>
        <meta charset="utf-8"/>
        <style type="text/css">
            
            div {position:relative; border-radius:20px; border:4px solid beige; font-family: verdana; width: 500px;justify-content: center;text-align: center;margin-left: 500px;
                 background-color: burlywood;}
            .tinicio{width: 300px; height: 300px;text-align: center; background-color: beige; border-radius: 10px;margin-left: 100px;}
            td{border-radius: 10px;}
            
        
        </style>
        <link rel="icon" href="images/icon.ico"/>
    </head>
    <body>
         <div>
        <h3>HUNDIR LA FLOTA</h3>
        
        <form method="post" action="flota02carmensc.php">
           
            <table border="2px solid black" class="tinicio">
                <?php
                
                    // poner automáticamente la tabla y dándole valor al name y value del mismo numero para una más facil programación
                    $cont=1;
                    $fin=9;
                    while ($cont<=$fin)
                    {
                        if($cont%3==1)
                        {
                            echo "<tr><td><input type=\"checkbox\" name=\"$cont\" value=\"$cont\" /></td>";
                        }
                        elseif($cont%3==0)
                        {
                            echo "<td><input type=\"checkbox\" name=\"$cont\" value=\"$cont\"/></td></tr>";
                        }
                        else
                        {
                            echo "<td><input type=\"checkbox\" name=\"$cont\" value=\"$cont\"/></td>";
                        }
                        $cont++;
                    }       
                ?>
            </table>
            
            <!--Poner Radio button para seleccionar el nivel de dificultad y botón para jugar!-->
            <p>Selecciona 3 casillas</p>
            <p>Nivel de dificulad:</p>
            <input type="radio" name="radio" value="facil"/>Fácil
            <input type="radio" name="radio" value="dificil"/>Difícil<br/><br/>
            <input type="submit" name="enviar" value="Ataca"/>
        </form>
    </div>
    </body>
    
</html>