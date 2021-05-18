<html>
    <head>
        <title>HUNDIR LA FLOTA</title>
          <meta charset="utf-8"/>
         <style type="text/css">
            body {background-color: burlywood; text-align: center; font-family: verdana;}
            .jugador {border:2px solid chocolate; border-radius: 20px; float:left; margin-left: 350px; height: 300px;width: 350px; padding-left: 20px;}
            .com {border:2px solid chocolate; border-radius: 20px; float:right; margin-right: 350px; height: 300px;width: 350px; padding-left: 20px;}
             .resultado{border:2px solid chocolate; border-radius: 20px; width: 350px; height: 300px; margin-top: 30px; margin-left: 600px; padding-left: 20px;}
             table{border-radius: 10px;}
             td{border-radius: 10px;}
            
        
        </style>
        <link rel="icon" href="images/icon.ico"/>
    </head>
    <body>
        <?php
        $radio=$_REQUEST['radio'];
          
        //Confirmar el numero de casillas marcadas bien, ni más ni menos.
        //Nivel fácil
        if($radio =='facil')
        {
            $marcado=0;
            for($cont=1;$cont<=9;$cont++) //Ver las casillas marcadas
            {
             
                if(isset($_REQUEST[$cont]))
                {
                    $marcado++;
                }
            }
            if($marcado>3 or $marcado<3) //Ver que se hayan marcado las correctas
            {
                echo "Debes marcar 3 casillas";
            }
            else
            {
                       
                // numeros sin repetir
                $listadoNum=array(1,2,3,4,5,6,7,8,9); //CREAR LISTADO ARRAY de las posiciones totales
                $posBarcos=array_rand($listadoNum,6);// NUMERO DE POSICIONES DE LOS BARCOS
                        $b1= $listadoNum[$posBarcos[0]];//Posicion 1
                        $b2= $listadoNum[$posBarcos[1]];//Posicion 2
                        $b3= $listadoNum[$posBarcos[2]];//Posicion 3
                        $b4= $listadoNum[$posBarcos[3]];//Posicion 4
                        $b5= $listadoNum[$posBarcos[4]];//Posicion 5
                        $b6= $listadoNum[$posBarcos[5]];//Posicion 6
                
                //Asignacion de las array a variables para que me permita programar más facilmente 
                $barco1=$b1;
                $barco2=$b2;
                $barco3=$b3;
                $barco4=$b4;
                $barco5=$b5;
                $barco6=$b6;
            
            
                echo "<div class=\"jugador\"><p>Tablero Del Jugador</p>";// Realizar el tablero que selecciona el jugador
                echo "<table border=\"2px solid black\">";
                for($juga=1;$juga<=9;$juga++)
                {
                    if(isset($_REQUEST[$juga]))
                    {
                         if($juga%3==1)
                            {
                                echo "<tr><td><img src=\"images/barco.png\"/></td>";
                            }
                            elseif($juga%3==0)
                            {
                                echo "<td><img src=\"images/barco.png\"/></td></tr>";
                            }
                            else
                            {
                                echo "<td><img src=\"images/barco.png\"/></td>";
                            }
                    }
                    else
                    {
                        if($juga%3==1)
                        {
                            echo "<tr><td><img src=\"images/agua1.jpg\"/></td>";
                        }
                        elseif($juga%3==0)
                        {
                            echo "<td><img src=\"images/agua1.jpg\"/></td></tr>";
                        }
                        else
                        {
                            echo "<td><img src=\"images/agua1.jpg\"/></td>";
                        }
                    }
                }
                       
                echo "</table></div>";
                 
                //TABLA DEL ORDENADOR
                echo "<div class=\"com\"><p>Tablero del ordenador</p>"; //Realizar el tablero del ordenador
                echo "<table border=\"2px solid black\">";
                $com=1;
                for($com1;$com<=9;$com++)
                {
                    if(($com==$barco1) or ($com==$barco2) or ($com==$barco3) or ($com==$barco4) or ($com==$barco5) or ($com==$barco6))
                    {
                        if($com%3==1)
                        {
                            echo "<tr><td><img src=\"images/barco.png\"/></td>";
                        }
                        elseif($com%3==0)
                        {
                            echo "<td><img src=\"images/barco.png\"/></td></tr>";
                        }
                        else
                        {
                            echo "<td><img src=\"images/barco.png\"/></td>";
                        }
                    }
                    else
                    {
                        if($com%3==1)
                        {
                            echo "<tr><td><img src=\"images/agua1.jpg\"/></td>";
                        }
                        elseif($com%3==0)
                        {
                            echo "<td><img src=\"images/agua1.jpg\"/></td></tr>";
                        }
                        else
                        {
                            echo "<td><img src=\"images/agua1.jpg\"/></td>";
                        }
                    }
                }
                echo "</table>";
                echo "</div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>"; // se ha puesto tanto br para que saliese mejor el diseño grafico de la pantalla, se me juntaban los div.
                //Comparar los dos tableros
            
                echo "<div class=\"resultado\"><p>¿Cuántos Barcos has hundido?</p>";
                // Inicializo la variable tocado, y con un for recorro todos los request al que le damos el valor de $cont, ya que es su nombre en el formulario
                    // Comparamos que sea igual que los valores que fueron recogidos en barco1, barco2 y barco3
                    $tocado=0;           
                    echo "<table border=\"2px solid black\">";
                    for($cont=1;$cont<=9;$cont++)
                    {
                         $req1=isset($_REQUEST[$cont])?$_REQUEST[$cont]:0;
                         if($req1==$barco1 or $req1==$barco2 or $req1==$barco3 or $req1==$barco4 or $req1==$barco5 or $req1==$barco6)
                         {
                            if($cont%3==1)
                                 {
                                     echo "<tr><td><img src=\"images/hundido1.jpg\"/></td>";
                                    $tocado++;
                                 }
                                 elseif($cont%3==0)
                                 {
                                     echo "<td><img src=\"images/hundido1.jpg\"/></td></tr>";
                                     $tocado++;
                                 }
                                 else
                                 {
                                     echo "<td><img src=\"images/hundido1.jpg\"/></td>";
                                     $tocado++;
                                 }
                         }

                         else
                         {
                                 if($cont%3==1)
                                 {
                                     echo "<tr><td><img src=\"images/agua1.jpg\"/></td>";
                                 }
                                 elseif($cont%3==0)
                                 {
                                     echo "<td><img src=\"images/agua1.jpg\"/></td></tr>";
                                 }
                                 else
                                 {
                                     echo "<td><img src=\"images/agua1.jpg\"/></td>";
                                 }
                         }
                    }
                    //Cerrar tabla
                    echo "</table></div>";
                    echo "Has tocado $tocado";
            }

        }
        
        
            
        //Nivel Dificil
        if($radio =='dificil')
        {
            $marcado=0;
            for($cont=1;$cont<=9;$cont++) //Ver las casillas marcadas
            {
             
                if(isset($_REQUEST[$cont]))
                {
                    $marcado++;
                }
            }
            if($marcado>3 or $marcado<3) //Ver que se hayan marcado 3 opciones
            {
                echo "Debes marcar 3 casillas";
            }
            else
            {
                
                    //Posicion del barco
                    // numeros sin repetir
                    $listadoNum=array(1,2,3,4,5,6,7,8,9); //CREAR LISTADO ARRAY de las posiciones totales que va a tener nuestro array(las 9 celdas de la tabla)
                    $posBarcos=array_rand($listadoNum,3);// NUMERO DE POSICIONES DE LOS BARCOS que queremos que saque
                                $b1= $listadoNum[$posBarcos[0]];//Posicion 1
                                $b2= $listadoNum[$posBarcos[1]];//Posicion 2
                                $b3= $listadoNum[$posBarcos[2]];//Posicion 3

                    //Asigno las posiciones de los barcos a variables que me permiten programar con más facilidad y sin errores
                    $barco1=$b1; 
                    $barco2=$b2;
                    $barco3=$b3;

                    //Tabla que es elegida por el jugador
                    echo "<div class=\"jugador\"><p>Tablero Del Jugador</p>";
                    echo "<table border=\"2px solid black\">";
                    for($juga=1;$juga<=9;$juga++)
                    {
                        if(isset($_REQUEST[$juga]))
                        {
                             if($juga%3==1)
                                {
                                    echo "<tr><td><img src=\"images/barco.png\"/></td>";
                                }
                                elseif($juga%3==0)
                                {
                                    echo "<td><img src=\"images/barco.png\"/></td></tr>";
                                }
                                else
                                {
                                    echo "<td><img src=\"images/barco.png\"/></td>";
                                }
                        }
                        else
                        {
                            if($juga%3==1)
                            {
                                echo "<tr><td><img src=\"images/agua1.jpg\"/></td>";
                            }
                            elseif($juga%3==0)
                            {
                                echo "<td><img src=\"images/agua1.jpg\"/></td></tr>";
                            }
                            else
                            {
                                echo "<td><img src=\"images/agua1.jpg\"/></td>";
                            }
                        }
                    }

                    echo "</table></div>";

                    //TABLA DEL GENERADA POR EL ORDENADOR (POR LOS ARRAY DE ARRIBA)
                    echo "<div class=\"com\"><p>Tablero del ordenador</p>";
                    echo "<table border=\"2px solid black\">";
                    $com=1;
                    for($com1;$com<=9;$com++)
                    {
                         if(($com==$barco1) or ($com==$barco2) or ($com==$barco3))
                         {
                             if($com%3==1)
                             {
                                 echo "<tr><td><img src=\"images/barco.png\"/></td>";
                             }
                             elseif($com%3==0)
                             {
                                 echo "<td><img src=\"images/barco.png\"/></td></tr>";
                             }
                             else
                             {
                                 echo "<td><img src=\"images/barco.png\"/></td>";
                             }
                         }
                         else
                         {
                             if($com%3==1)
                             {
                                 echo "<tr><td><img src=\"images/agua1.jpg\"/></td>";
                             }
                             elseif($com%3==0)
                             {
                                 echo "<td><img src=\"images/agua1.jpg\"/></td></tr>";
                             }
                             else
                             {
                                 echo "<td><img src=\"images/agua1.jpg\"/></td>";
                             }
                         }
                    }

                    echo "</table>";
                    echo "</div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>"; // puesto para mejorar el diseño de los div (se solapaban entre si)
                    //Comparar los dos tableros

                    echo "<div class=\"resultado\"><p>¿Cuántos Barcos has hundido?</p>";
                
                
                    // Inicializo la variable tocado, y con un for recorro todos los request al que le damos el valor de $cont, ya que es su nombre en el formulario
                    // Comparamos que sea igual que los valores que fueron recogidos en barco1, barco2 y barco3
                    $tocado=0;           
                    echo "<table border=\"2px solid black\">";
                    for($cont=1;$cont<=9;$cont++)
                    {
                         $req1=isset($_REQUEST[$cont])?$_REQUEST[$cont]:0;
                         if($req1==$barco1 or $req1==$barco2 or $req1==$barco3)
                         {
                            if($cont%3==1)
                                 {
                                     echo "<tr><td><img src=\"images/hundido1.jpg\"/></td>";
                                    $tocado++;
                                 }
                                 elseif($cont%3==0)
                                 {
                                     echo "<td><img src=\"images/hundido1.jpg\"/></td></tr>";
                                     $tocado++;
                                 }
                                 else
                                 {
                                     echo "<td><img src=\"images/hundido1.jpg\"/></td>";
                                     $tocado++;
                                 }
                         }

                         else
                         {
                                 if($cont%3==1)
                                 {
                                     echo "<tr><td><img src=\"images/agua1.jpg\"/></td>";
                                 }
                                 elseif($cont%3==0)
                                 {
                                     echo "<td><img src=\"images/agua1.jpg\"/></td></tr>";
                                 }
                                 else
                                 {
                                     echo "<td><img src=\"images/agua1.jpg\"/></td>";
                                 }
                         }
                    }
                    //Cerrar tabla
                    echo "</table></div>";
                    echo "Has tocado $tocado";
            }
                
                    
        }
        
        //volver a jugar
        echo "<form action=\"index.php\">";
        echo "<input type=\"submit\" value=\"Jugar de Nuevo\"/></form>";          
        ?>
      
    </body>
</html>