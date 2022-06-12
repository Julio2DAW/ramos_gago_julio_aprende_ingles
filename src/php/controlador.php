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
    }