<?php
session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");

require_once ("../../../database/connect-db.php");
require_once ("../../../database/users-db.php");

if(isset($_GET['id_usuario']) && isset($_POST['add-address'])){
    if($_SESSION['id_usuario'] == $_GET['id_usuario'] ||  $_SESSION['tipo_usuario'] == 0){
        // Calle
        $newcalle = $_POST['calle-edit'];
        // numero
        $newnumero = $_POST['numero-edit'];
        // Piso
        if(empty($_POST['piso-edit'])) {
            $newpiso = null;
        } else {
            $newpiso = $_POST['piso-edit'];
        }
        // Letra
        if(empty($_POST['letra-edit'])) {
            $newletra = null;
        } else {
            $newletra = $_POST['letra-edit'];
        }
        // CodigoPostal
        $newcodigoPostal = $_POST['codigoPostal-edit'];
        // ciudad
        $newciudad = $_POST['ciudad-edit'];

        // ($newcalle, $newnumero, $newpiso, $newletra, $newcodigoPostal, $newciudad)

        try {
            crearDireccion($_GET['id_usuario'], $newcalle, $newnumero, $newpiso, $newletra, $newcodigoPostal, $newciudad);
                echo "<script type='text/javascript'>alert('Dirección añadida correctamente');</script>";

        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, la dirección no ha podido ser añadida');</script>";
        }

        header("Refresh:0; url=./ver-misDirecciones.php");

    } else {
        header("Refresh:0; url=./ver-misDirecciones.php");
    }
}
cerrarConexion();

?>