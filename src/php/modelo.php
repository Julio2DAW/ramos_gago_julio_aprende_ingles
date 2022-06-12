<?php
    /**
     * @file modelo.php
     * Archivo para crear el modelo de la app.
     * @author Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)
     * @license GPLv3 2022.
     */

    /**
     * @class Modelo{}
     * Clase Modelo, se encarga de realizar las consultas, búsquedas, filtros y actualizaciones.
     */
    class Modelo{

        //Atributo en público para la conexión con la base de datos.
        public $conexion;

        /**
         * @function __construct().
         * Constructor de la clase.
         */
        function __construct(){

            //Requiere del archibo config_db.php.
            require_once 'config_db.php';
            //Uso la clase mysqli para inicializar la conexión.
            $this->conexion = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        }

        /**
         * @function nuevaPartidaM
         * Función que realiza una consulta (insert), para introducir nuevas prácticas en la tabla prac_ejer.
         */
        function nuevaPartidaM(){

            //Consulta para insertar los datos
            $sql = "INSERT INTO prac_ejer (fecha_hora, numIntentos, superado, usuario) VALUES (now(),default,default,2)";
            //Ejecuto la consulta
            $this->conexion->query($sql);
        }

        /**
         * @function palabrasM
         * Función que realiza una consulta (select), para sacar las palabras de la tabla palabras.
         */
        function palabrasM(){

            //Consulta para sacar los datos
            $sql = "SELECT * FROM palabras";
            //Ejecuto la consulta y la retorno
            return $this->conexion->query($sql);
        }

        /**
         * @function categoriasM
         * Función que realiza una consulta (select), para sacar las categorías de la tabla categorias.
         */
        function categoriasM(){

            //Consulta para sacar los datos
            $sql = "SELECT * FROM categorias";
            //Ejecuto la consulta y la retorno
            return $this->conexion->query($sql);
        }

        /**
         * @function palabrasRandomM
         * Función que realiza una consulta (insert), para guardar las palabras.
         */
        function palabrasRandomM($id_palabra){

            $id_prac_ejer = $this->maximoValor(); 

            $sql = "INSERT INTO palabras_ejer (id_palabra, id_prac_ejer) VALUES ($id_palabra, $id_prac_ejer[0])";
            $this->conexion->query($sql);
        }

        /**
         * @function maximoValor
         * Función que realiza una consulta (select), para sacar la máxima práctica.
         * @return $fila
         */
        function maximoValor(){

            $sql = "SELECT MAX(id_prac_ejer) FROM prac_ejer";
            $fila = ($this->conexion->query($sql))->fetch_array();
            return $fila;
        }

        /**
         * @function palabraAcertadaSNM
         * Función que realiza una consulta (update), para guardar el estado de la palabra.
         * @param $fallada $id_palabra
         */
        function palabraAcertadaSNM($fallada, $id_palabra){

            $sql = "UPDATE minijuego SET fallada = $fallada WHERE id_palabra=$id_palabra";
            $this->conexion->query($sql);
        }
    }