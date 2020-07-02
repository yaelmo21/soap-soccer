<?php
    require realpath(dirname(__FILE__) .'/../providers/database.php');

    /**
     * Metodo para consultar la informacion de una noticia en especifico
     */
    function torneoConsultar($idTorneo){
        global $mysqli;

        $sql = "SELECT * FROM TORNEO WHERE ID = ".$idTorneo;

        if($mysqli->query($sql)){
            return mysqli_fetch_array($mysqli->query($sql));
        }else{
            return array();
        }

    }

    /**
     * Metodo para agregar una Torneo
     */
    function torneoAgregar($nombre, $fechaIncial, $fechaFinal){
        global $mysqli;

        $sql = "INSERT INTO TORNEO (ID,NOMBRE,FECHA_INICIAL, FECHA_FINAL) VALUES(NULL,'$nombre', '$fechaIncial', '$fechaFinal')";
        
        if($mysqli->query($sql)){
            return 'Exito';
        }else{
            return 'Error';
        }

    }

    /**
     * Metodo para actualizar la informacion de una Torneo
     */
    function torneoActualizar($idTorneo, $nombre, $fechaIncial, $fechaFinal){
        global $mysqli;

        $sql = "UPDATE TORNEO SET NOMBRE='$nombre', FECHA_INICIAL='$fechaIncial',FECHA_FINAL='$fechaFinal' WHERE ID = $idTorneo";
    
        if($mysqli->query($sql)){
            return 'Exito';
        }else{
            return 'Error';
        }

    }

    /**
     * Metodo para eliminar una Torneo
     */
    function torneoEliminar($idTorneo){
        global $mysqli;

        $sql = "DELETE FROM TORNEO WHERE ID = ".$idTorneo;

        if($mysqli->query($sql)){
            return 'Exito';
        }else{
            return 'Error';
        }

    }


?>