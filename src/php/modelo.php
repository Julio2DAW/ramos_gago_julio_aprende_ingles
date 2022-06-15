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

            $id_prac_ejer = $this->maximoValor(); 
            
            $sql = "UPDATE minijuego SET fallada = $fallada WHERE (id_palabra = $id_palabra and id_prac_ejer = $id_prac_ejer[0])";
            return $this->conexion->query($sql);
        }


        /**
         * @function practicasNoSuperadasM
         * Función que realiza una consulta (select), para seleccionar las prácticas no superadas por el usuario
         */
        function practicasNoSuperadasM(){

            $sql = "SELECT * FROM prac_ejer WHERE (superado = 0 and usuario = 2)";
            return $this->conexion->query($sql);
        }

        /**
         * @function palabrasRepetidas
         * Función que realiza una consulta (select), para sacar las palabras repetidas de la práctica
         */
        function palabrasRepetidasM($id){

            $sql = "SELECT *
            FROM ((palabras_ejer
            INNER JOIN palabras ON palabras_ejer.id_palabra = palabras.id_palabra)
            INNER JOIN prac_ejer ON palabras_ejer.id_prac_ejer = prac_ejer.id_prac_ejer)
            WHERE (prac_ejer.usuario = 2 and prac_ejer.id_prac_ejer = $id)";

            return $this->conexion->query($sql);
        }

        /**
         * @function registroM
         * Función que realiza una consulta (insert), para introducir un nuevo usuario
         */
        function registroM($email, $pwd_encriptada){

            $sql = "INSERT INTO usuarios (email, pwd) VALUES ($email, '$pwd_encriptada')";
            $this->conexion->query($sql);
        }

        /**
         * @function loginM
         * Función que realiza una consulta (select), para sacar los datos
         */
        function loginM($email){

            $sql = "SELECT * FROM usuarios WHERE email = $email";
            return $this->conexion->query($sql);
        }
    }