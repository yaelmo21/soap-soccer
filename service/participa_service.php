<?php 
   require realpath(dirname(__FILE__) .'/../providers/database.php');
// ---------------------------------------------------------------------------------
// Crear Participa
// ---------------------------------------------------------------------------------

    function participaAgregar($id_partido,$id_equipo,$id_torneo,$visitante,$contrincante,$puntos){
        global $mysqli;

        $id_partido     = intval($id_partido);  
        $id_equipo      = intval($id_equipo);
        $id_torneo      = intval($id_torneo);
        $contrincante   = intval($contrincante);
        $puntos         = intval($puntos);

        $visitante = (strtolower($visitante) == 'true') ? true : false;

        $sql = "INSERT INTO PARTICIPA (ID_PARTIDO,ID_EQUIPO,ID_TORNEO,VISITANTE,CONTRINCANTE,PUNTOS) VALUES($id_partido,$id_equipo,$id_torneo,$visitante,$contrincante,$puntos)";
        return ($mysqli->query($sql))? 'Exito' : 'Error';
    }

    
// ---------------------------------------------------------------------------------
// Actualizar Participa
// ---------------------------------------------------------------------------------    

    function participaActualizar($id_partido_old,$id_equipo_old,$id_torneo_old,$id_partido,$id_equipo,$id_torneo,$visitante,$contrincante,$puntos){
        global $mysqli;

        $id_partido     = intval($id_partido);  
        $id_equipo      = intval($id_equipo);
        $id_torneo      = intval($id_torneo);

        $id_partido_old   = intval($id_partido_old);  
        $id_equipo_old    = intval($id_equipo_old);
        $id_torneo_old    = intval($id_torneo_old);
        
        $contrincante   = intval($contrincante);
        $puntos         = intval($puntos);

        $visitante = (strtolower($visitante) == 'true') ? 1 : 0;
        $sql = "UPDATE PARTICIPA SET ID_PARTIDO =$id_partido ,ID_EQUIPO = $id_equipo, ID_TORNEO = $id_torneo, VISITANTE = $visitante ,CONTRINCANTE = $contrincante ,PUNTOS = $puntos WHERE ID_PARTIDO = $id_partido_old AND ID_EQUIPO = $id_equipo_old AND ID_TORNEO= $id_torneo_old";
        return ($mysqli->query($sql))? 'Exito' : $mysqli->error;
    }
    
// ---------------------------------------------------------------------------------
// Eliminar Participa
// ---------------------------------------------------------------------------------

    function participaEliminar($id_partido,$id_equipo,$id_torneo){
        global $mysqli;

        $id_partido     = intval($id_partido);  
        $id_equipo      = intval($id_equipo);
        $id_torneo      = intval($id_torneo);

        $sql = "DELETE FROM PARTICIPA WHERE ID_PARTIDO = $id_partido AND ID_EQUIPO = $id_equipo AND ID_TORNEO= $id_torneo";
        
        return ($mysqli->query($sql))? 'Exito' : 'Error';
    }
// ---------------------------------------------------------------------------------
// Consultar  Participa
// ---------------------------------------------------------------------------------


    function participaConsultar($id_partido,$id_equipo,$id_torneo){
        global $mysqli;

        $id_partido     = intval($id_partido);  
        $id_equipo      = intval($id_equipo);
        $id_torneo      = intval($id_torneo);

        $sql = "SELECT * FROM PARTICIPA WHERE ID_PARTIDO = $id_partido AND ID_EQUIPO = $id_equipo AND ID_TORNEO= $id_torneo";        
        return ($mysqli->query($sql)->num_rows > 0) ? mysqli_fetch_array($mysqli->query($sql)) : array();
    }
?>