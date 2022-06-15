<?php
    /**
     * @file controlador.php
     * Archivo para crear el controlador de la app.
     * @author Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)
     * @license GPLv3 2022.
     */

     /**
      * @class Controlador{}
      * Clase Controlador, se encarga de gestionar las instrucciones que se reciben, atenderlas
      * y procesarlas.
      */
    class Controlador{

        //Atributo público para utilizar los métodos de la clase modelo en el controlador.
        public $modelo;

        /**
         * @function __construct()
         * Constructor de la clase.
         */
        function __construct() {
            
            //Requiere de la clase Modelo del archivo modelo.php.
            require_once 'modelo.php';
            $this->modelo = new Modelo();
        }

        /**
         * @function nuevaPartidaC
         * Método para crear una nueva partida.
         */
        function nuevaPartidaC(){

            return $this->modelo->nuevaPartidaM();
        }

        /**
         * @function palabrasC
         * Método para obtener las palabras de la base de datos.
         */
        function palabrasC(){

            return $this->modelo->palabrasM();
        }

        /**
         * @function categoriasC
         * Método para obtener las categorías de la base de datos.
         */
        function categoriasC(){

            return $this->modelo->categoriasM();
        }

        /**
         * @function palabrasRandomC
         * Método para guardar las palabras de la práctica.
         */
        function palabrasRandomC($id_palabra){

            return $this->modelo->palabrasRandomM($id_palabra);
        }

        /**
         * @function palabraAcertadaSNC
         * Método para guardar el estado de las palabras.
         */
        function palabraAcertadaSNC($fallada, $id_palabra){
        
            return $this->modelo->palabraAcertadaSNM($fallada, $id_palabra);
        }

        /**
         * @function practicasNoSuperadasC
         * Método para sacar las prácticas no superadas del usuario.
         */
        function practicasNoSuperadasC(){

            return $this->modelo->practicasNoSuperadasM();
        }

        /**
         * @function palabrasRepetidasC
         * Método para sacar las palabras de las prácticas falladas
         */
        function palabrasRepetidasC(){

            if(isset($_GET['id'])) {

                $id = $_GET['id'];
                return $this->modelo->palabrasRepetidasM($id);
            }else {

                return 'Ha sucedido un problema';
            }
        }
        
        /**
         * @function registroC
         * Función para registro
         */
        function registroC(){

            //Comprobar que el usuario ha introducido un correo
            if(empty($_POST['email'])){

                return "Debes de insertar un correo";
            }else{

                $email = "'".$_POST['email']."'";
            }

            //Comprobar que el usuario ha introducido una contraseña
            if(empty($_POST['password'])){

                return "Debes de insertar una contraseña";
            }else{

                $pwd = "'".$_POST['password']."'";
            }

            //Crea un hash de la contraseña
            $pwd_encriptada = password_hash($pwd, PASSWORD_DEFAULT);
            
            $this->modelo->registroM($email, $pwd_encriptada);

            if($this->modelo->conexion->affected_rows>0){

                echo "Eres nuevo usuario";
            }else{

                echo "El registro no se ha producido por motivos desconocidos";
            }
        }

        /**
         * Método para comprobar el inicio de sesión
         */
        function loginC(){

            //Comprobar que el usuario ha introducido un correo
            if(empty($_POST['email'])){

                return "Debes de insertar un correo";
            }else{

                $email = "'".$_POST['email']."'";
            }

            //Comprobar que el usuario ha introducido una contraseña
            if(empty($_POST['password'])){

                return "Debes de insertar una contraseña";
            }else{

                $pwd = "'".$_POST['password']."'";
            }
            
            $usuario = $this->modelo->loginM($email);
            $nr = mysqli_num_rows($usuario);

            $buscarpass = mysqli_fetch_array($usuario);

            if(($nr == 1) && (password_verify($pwd, $buscarpass['pwd']))){

                return "Bienvenido:  $email";
            }else{

                return "No se pudo iniciar sesión";
            }
        }
    }