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
    


?>