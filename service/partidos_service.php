<?php
    require realpath(dirname(__FILE__) .'/../providers/database.php');

    function prueba(){
        global $mysqli;

        $sql = "SELECT * FROM PARTIDO";

        if($mysqli->query($sql)){
            return mysqli_fetch_array($mysqli->query($sql));
        }else{
            return array();
        }

    }

    // ---------------------------------------------------------------------------------
    // Crear Partido
    // ---------------------------------------------------------------------------------
    
    function partidoAgregar($golesLocal,$golesVisitante){
       global $mysqli;
       $sql = "INSERT INTO PARTIDO (ID,GOLES_LOCAL,GOLES_VISITANTE) value (NULL,$golesLocal,$golesVisitante)";
       return ($mysqli->query($sql))? 'Exito' : 'Error';
    }

    // ---------------------------------------------------------------------------------
    // Actualizar Partido
    // ---------------------------------------------------------------------------------
    
    function partidoActualizar($id,$golesLocal,$golesVisitante){
        global $mysqli;
        $sql = "UPDATE PARTIDO SET GOLES_LOCAL=$golesLocal,GOLES_VISITANTE=$golesVisitante WHERE ID= $id";
        return ($mysqli->query($sql))? 'Exito' : 'Error';
    }
    // ---------------------------------------------------------------------------------
    // Consultar Partido
    // ---------------------------------------------------------------------------------

    function partidoConsultar($id){
        global $mysqli;
        $sql = "SELECT * FROM PARTIDO WHERE ID = ".intval($id);
        return ($mysqli->query($sql)->num_rows > 0) ? mysqli_fetch_array($mysqli->query($sql)) : array();
    }

    // ---------------------------------------------------------------------------------
    // Eliminar Partido
    // ---------------------------------------------------------------------------------

    function partidoEliminar($id){
        global $mysqli;
        $sql = "DELETE FROM PARTIDO WHERE ID =".intval($id);
        return ($mysqli->query($sql))? 'Exito' : 'Error';
    }
?>