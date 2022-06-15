<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta author="Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)" />
        <title>Aprende Inglés</title>
        <link rel="stylesheet" href="../css/comun.css" />
        <link rel="stylesheet" href="../css/estilos.css" />
        <link rel="stylesheet" href="../css/reset.css" />
    </head>
    <body>
        <nav>
            <h2>Registro</h2>
        </nav>
        <main>
            <form action="#" method="POST">
                <div>
                    <label>Email: </label>
                    <input type="email" name="email" />
                </div>
                <div>
                    <label>Password: </label>
                    <input type="password" name="password" />
                </div>
                <input type="submit" value="Registrar" name="registrar" />
            </form>
            <?php
                session_start();
                require_once 'controlador.php';
                $controlador = new Controlador();

                if(isset($_POST['registrar'])){

                    $insertar = $controlador->registroC();
                }
            ?>
            <div>Si ya eres usuario <a href="login.php">LOGIN</a></div>
        </main>
        <footer>
            <p>Julio Antonio Ramos Gago || Github: Julio2DAW</p>
        </footer>
    </body>
</html>