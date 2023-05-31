<?php
session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");

require_once ("../../../database/connect-db.php");
require_once ("../../../database/users-db.php");

if(isset($_GET['id_direccion'])){
    if($_SESSION['id_usuario'] == $_GET['id_usuario'] || $_SESSION['tipo_usuario'] == 0){
        
        try {
            borrarDireccion($_GET['id_direccion']);
                echo "<script type='text/javascript'>alert('Dirección eliminada correctamente');</script>";

        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, la dirección no ha podido ser eliminada');</script>";
        }

        header("Refresh:0; url=./ver-misDirecciones.php");

    } else {
        header("Refresh:0; url=./ver-misDirecciones.php");
    }
}
cerrarConexion();

?>