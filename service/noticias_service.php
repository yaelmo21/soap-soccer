<?php
    require realpath(dirname(__FILE__) .'/../providers/database.php');

    /**
     * Metodo para consultar la informacion de una noticia en especifico
     */
    function consultarNoticia($idNoticia){
        global $mysqli;

        $sql = "SELECT * FROM NOTICIA WHERE ID = ".$idNoticia;

        if($mysqli->query($sql)){
            return mysqli_fetch_array($mysqli->query($sql));
        }else{
            return array();
        }

    }

    /**
     * Metodo para agregar una noticia
     */
    function agregarNoticia($autor, $fecha, $titulo, $cuerpo, $idTorneo){
        global $mysqli;

        $sql = "INSERT INTO NOTICIA (ID,AUTOR,FECHA, TITULO, CUERPO, ID_TORNEO) VALUES(NULL,'$autor', '$fecha', '$titulo', '$cuerpo', '$idTorneo')";
        
        if($mysqli->query($sql)){
            return 'Exito';
        }else{
            return 'Error';
        }

    }

    /**
     * Metodo para actualizar la informacion de una noticia
     */
    function actualizarNoticia($idNoticia, $autor, $fecha, $titulo, $cuerpo, $idTorneo){
        global $mysqli;

        $sql = "UPDATE NOTICIA SET AUTOR='$autor', FECHA='$fecha',TITULO='$titulo',CUERPO='$cuerpo', ID_TORNEO=$idTorneo WHERE ID = $idNoticia";
    
        if($mysqli->query($sql)){
            return 'Exito';
        }else{
            return 'Error';
        }

    }

    /**
     * Metodo para eliminar una noticia
     */
    function eliminarNoticia($idNoticia){
        global $mysqli;

        $sql = "DELETE FROM NOTICIA WHERE ID = ".$idNoticia;

        if($mysqli->query($sql)){
            return 'Exito';
        }else{
            return 'Error';
        }

    }


?>