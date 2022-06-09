<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta author="Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)" />
        <title>Aprende Inglés</title>
        <link rel="stylesheet" href="../css/estilos.css" />
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

                    for ($i = 0; $i < 10; $i++) {

                        $registro = $resultado->fetch_assoc();
                        echo "<label>".$registro['ingles']."</label>";
                        /* echo    "<div>
                                    <label>".$registro['ingles']."</label>
                                    <select name='categoria[1]'>"; */
                        echo "<select name='categoria[]'>";
                        /* while ($fila=$resultado2->fetch_array()){

                            echo    "<option value=".$fila['id_categoria'].">".$fila['nombre']."</option>";
                        } */

                        for($j = 0; $j < 5; $j++) {
                            
                            $fila = $resultado2->fetch_array();
                            echo    "<option value=".$fila['id_categoria'].">".$fila['nombre']."</option>";
                        }
                        echo        "</select>";
                        /* echo        "</select>
                                </div>"; */
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