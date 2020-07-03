<?php
    require realpath(dirname(__FILE__) .'/../providers/database.php');

    function EquipoVerTodos(){
        global $mysqli;

        $sql = "SELECT * FROM EQUIPO";

        if($mysqli->query($sql)){
            return mysqli_fetch_array($mysqli->query($sql));
        }else{
            return array();
        }

    }

    // ---------------------------------------------------------------------------------
    // Crear Equipo
    // ---------------------------------------------------------------------------------

    function equipoAgregar($nombre, $entrenador){
       global $mysqli;
       $id_equipo = intval($id_equipo);
       $sql = "INSERT INTO EQUIPO (ID,NOMBRE,ENTRENADOR) values (NULL,'$nombre','$entrenador')";
       return ($mysqli->query($sql))? 'Exito' : $sql;
    }

    // ---------------------------------------------------------------------------------
    // Actualizar Equipo
    // ---------------------------------------------------------------------------------
    
    function equipoActualizar($id, $nombre, $entrenador){
        global $mysqli;
        
        $sql = "UPDATE EQUIPO SET NOMBRE='$nombre', ENTRENADOR='$entrenador' WHERE ID = $id";
        return ($mysqli->query($sql))? 'Exito' : 'Error';
    }
    // ---------------------------------------------------------------------------------
    // Consultar Equipo
    // ---------------------------------------------------------------------------------

    function equipoConsultar($id){
        global $mysqli;
        $sql = "SELECT * FROM EQUIPO WHERE ID = ".intval($id);
        return ($mysqli->query($sql)->num_rows > 0) ? mysqli_fetch_array($mysqli->query($sql)) : array();
    }

    // ---------------------------------------------------------------------------------
    // Eliminar Equipo
    // ---------------------------------------------------------------------------------

    function equipoEliminar($id){
        global $mysqli;
        $sql = "DELETE FROM EQUIPO WHERE ID =".intval($id);
        return ($mysqli->query($sql))? 'Exito' : 'Error';
    }
?>