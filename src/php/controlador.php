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
    }