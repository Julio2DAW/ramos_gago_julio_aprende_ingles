<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta author="Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)" />
        <title>Aprende Inglés</title>
        <link rel="stylesheet" href="css/estilos.css" />
        <link rel="stylesheet" href="css/reset.css" />
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li>Login</li>
                <li>Ejercicio</li>
            </ul>
        </nav>
        <main>
            <form action="#" method="POST"> 
                <div><input type="submit" value="Nueva Práctica" name="nuevaPractica" /></div>
            </form>
        </main>
        <footer>
            <p>Julio Antonio Ramos Gago || Github: Julio2DAW</p>
        </footer>
    </body>
</html>
<?php

    if(isset($_POST['nuevaPractica'])) {

        require_once 'controlador.php';

        $controlador = new Controlador();
        $resultado = $controlador->nuevaPartidaC();

        header ("refresh:0.5; url=nuevaPractica.php");
    }
    
                    
