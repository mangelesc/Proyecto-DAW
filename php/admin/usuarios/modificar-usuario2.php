<?php
session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
adminControl($location);

require_once ("../../../database/connect-db.php");


require_once ("../../../database/users-db.php");

if(isset($_GET['id_usuario']) && isset($_POST['edit-user'])){
    $currentUser = verUsuario($_GET['id_usuario']);

    // username
    if(empty($_POST['user-edit'])) {
        $newUsername = $currentUser['username'];
    } else {
        $newUsername = $_POST['user-edit'];
    }
    // Nombre
    if(empty($_POST['nombre-edit'])) {
        $newNombre = $currentUser['nombre'];
    } else {
        $newNombre = $_POST['nombre-edit'];
    }
    // Apellido1
    if(empty($_POST['apellido1-edit'])) {
        $newApellido1 = $currentUser['apellido1'];
    } else {
        $newApellido1 = $_POST['apellido1-edit'];
    }
    // Apellido2
    if(empty($_POST['apellido2-edit'])) {
        $newApellido2 = $currentUser['apellido2'];
    } else {
        $newApellido2 = $_POST['apellido2-edit'];
    }
    // Email
    if(empty($_POST['email-edit'])) {
        $newEmail = $currentUser['email'];
    } else {
        $newEmail = $_POST['email-edit'];
    }
    // Contraseña
    if(empty($_POST['password-edit'])) {
        $newPassword = $currentUser['pass'];
    } else {
        $newPassword = $_POST['password-edit'];
    }
    // Tipo de usuario
    if(!isset($_POST['tipo_usuario-edit'])) {
        $newRol = $currentUser['tipo_usuario'];
    } else {
        $newRol = $_POST['tipo_usuario-edit'];
    }

    try {
        modificarUsuario($currentUser['id_usuario'], $newUsername, $newEmail, $newPassword , $newRol,$newNombre, $newApellido1, $newApellido2);
        if ($_SESSION['id_usuario'] == $currentUser['id_usuario']){
            session_destroy();
            echo "<script type='text/javascript'>alert('Su usuario modificado correctamente, por favor, inicie sesión de nuevo');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Usuario modificado correctamente');</script>";
            
        }
    } catch (Exception $e){
        echo "<script type='text/javascript'>alert('Ha habido un error, el usuario no ha podido ser modficado');</script>";
    }
    header("Refresh:0; url=./admin-usuarios.php");
    }

if(isset($_GET['id_direccion']) && isset($_POST['edit-address'])){
    $currentUserAddress = verDireccion($_GET['id_direccion']);

    // Calle
    if(empty($_POST['calle-edit'])) {
        $newcalle = $currentUserAddress['calle'];
    } else {
        $newcalle = $_POST['calle-edit'];
    }

    // numero
    if(empty($_POST['numero-edit'])) {
        $newnumero = $currentUserAddress['numero'];
    } else {
        $newnumero = $_POST['numero-edit'];
    }

    // Piso
    if(empty($_POST['piso-edit'])) {
        $newpiso = $currentUserAddress['piso'];
    } else {
        $newpiso = $_POST['piso-edit'];
    }

    // Letra
    if(empty($_POST['letra-edit'])) {
        $newletra = $currentUserAddress['letra'];
    } else {
        $newletra = $_POST['letra-edit'];
    }

    // CodigoPostal
    if(empty($_POST['codigoPostal-edit'])) {
        $newcodigoPostal = $currentUserAddress['codigoPostal'];
    } else {
        $newcodigoPostal = $_POST['codigoPostal-edit'];
    }

    // ciudad
    if(empty($_POST['ciudad-edit'])) {
        $newciudad = $currentUserAddress['ciudad'];
    } else {
        $newciudad = $_POST['ciudad-edit'];
    }

    // ($newcalle, $newnumero, $newpiso, $newletra, $newcodigoPostal, $newciudad)

    try {
        modificarDireccion($_GET['id_direccion'], $newcalle, $newnumero, $newpiso, $newletra, $newcodigoPostal, $newciudad);
            echo "<script type='text/javascript'>alert('Dirección modificada correctamente');</script>";

    } catch (Exception $e){
        echo "<script type='text/javascript'>alert('Ha habido un error, la dirección no ha podido ser modficada');</script>";
    }

    header("Refresh:0; url=./admin-usuarios.php");

}
cerrarConexion();

?>