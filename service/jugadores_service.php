<?php
    require realpath(dirname(__FILE__) .'/../providers/database.php');

    function jugadorVerTodos(){
        global $mysqli;

        $sql = "SELECT * FROM JUGADOR";

        if($mysqli->query($sql)){
            return mysqli_fetch_array($mysqli->query($sql));
        }else{
            return array();
        }
    }

    // ---------------------------------------------------------------------------------
    // Crear Jugador
    // ---------------------------------------------------------------------------------

    function jugadorAgregar($nombre, $apellido, $nickname, $fecha_nacimiento, $posicion, $id_equipo){
       global $mysqli;
       $id_equipo = intval($id_equipo);
       $sql = "INSERT INTO JUGADOR (ID,NOMBRE,APELLIDO, NICKNAME, FECHA_NACIMIENTO, POSICION, ID_EQUIPO) values (NULL,'$nombre','$apellido', '$nickname', '$fecha_nacimiento', '$posicion', $id_equipo)";
       return ($mysqli->query($sql))? 'Exito' : $sql;
    }

    // ---------------------------------------------------------------------------------
    // Actualizar Jugador
    // ---------------------------------------------------------------------------------
    
    function jugadorActualizar($id, $nombre, $apellido, $nickname, $fecha_nacimiento, $posicion, $id_equipo){
        global $mysqli;
        
        $sql = "UPDATE JUGADOR SET NOMBRE='$nombre',APELLIDO='$apellido',NICKNAME='$nickname',FECHA_NACIMIENTO='$fecha_nacimiento', POSICION='$posicion', ID_EQUIPO=$id_equipo WHERE ID = $id";
        return ($mysqli->query($sql))? 'Exito' : 'Error';
    }
    // ---------------------------------------------------------------------------------
    // Consultar Jugador
    // ---------------------------------------------------------------------------------

    function jugadorConsultar($id){
        global $mysqli;
        $sql = "SELECT * FROM JUGADOR WHERE ID = ".intval($id);
        return ($mysqli->query($sql)->num_rows > 0) ? mysqli_fetch_array($mysqli->query($sql)) : array();
    }

    // ---------------------------------------------------------------------------------
    // Eliminar Jugador
    // ---------------------------------------------------------------------------------

    function jugadorEliminar($id){
        global $mysqli;
        $sql = "DELETE FROM JUGADOR WHERE ID =".intval($id);
        return ($mysqli->query($sql))? 'Exito' : 'Error';
    }
?>