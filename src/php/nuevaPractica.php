<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta author="Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)" />
        <title>Aprende Inglés</title>
        <link rel="stylesheet" href="../css/comun.css" />
        <link rel="stylesheet" href="../css/reset.css" />
    </head>
    <body>
        <nav>
            <h2>Nueva Práctica</h2>
        </nav>
        <main>
            <form action="#" method="POST">
                <?php
                    require_once 'controlador.php';

                    $controlador = new Controlador();
                    $resultado = $controlador->palabrasC();
                    $resultado2 = $controlador->categoriasC();
                    $categoria = $resultado2->num_rows;
                    $array_palabras = array();

                    while ($palabra=$resultado->fetch_array()) {
                        
                        array_push($array_palabras, $palabra);
                    }

                    for ($i = 0; $i < 10; $i++) {

                        $palabra_random = $array_palabras[rand(0,49)];

                        echo    "<div>
                                    <label>".$palabra_random['ingles']."</label>
                                    <select name='categoria[]'>";

                        for($j = 0; $j < $categoria; $j++) {
                            
                            $fila = $resultado2->fetch_array();
                            echo    "<option value=".$fila['id_categoria'].">".$fila['nombre']."</option>";
                        }

                        echo        "</select>
                                </div>";
                        
                        mysqli_data_seek($resultado2, 0);
                        $insertar_palabra = $controlador->palabrasRandomC($palabra_random['id_palabra']);
                    }
                ?>
                <input type="submit" value="Comprobar" name="comprobar" />
            </form>
        </main>
        <footer>
            <p>Julio Antonio Ramos Gago || Github: Julio2DAW</p>
        </footer>
    </body>
</html>
<?php

    if(isset($_POST['comprobar'])) {

        for ($i = 0; $i < 10; $i++) {

            if($palabra_random['categoria'] == $fila['id_categoria']) {

                $estado = 1;
                $estado_palabra = $controlador->palabraAcertadaSNC($estado, $palabra_random['id_palabra']);
            }else{

                $estado = 0;
                $estado_palabra = $controlador->palabraAcertadaSNC($estado, $palabra_random['id_palabra']);
            }
        }
    }