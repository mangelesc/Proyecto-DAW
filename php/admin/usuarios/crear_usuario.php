<?php

session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
adminControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/users-db.php");

$imgLogo = "../../../imgs/logo.png";
$urlHome = "../../productos/home.php";
$urlAdminPanel = "../admin.php";
$urlMyProducts = "../../mis-productos/ver-misProductos.php";
$urlProfile = "../../profile/mi-perfil/my-profile.php";
$urlSignout = "../../signout/cerrar_sesion.php";
$urlLogin = "../../../index.php";
$urlSignUp = "../../signup/sign-up.php";

require_once("../../../vistas/admin-panel/usuarios/admin-panel-usuarios-crear.php");

if(isset($_POST['add-user'])){
    if(empty($_POST['user-add']) || empty($_POST['email-add']) ||empty($_POST['password-add']) || empty($_POST['email-add'])){
        echo "<script type='text/javascript'>alert('Debes rellenar todos los campos para crear un nuevo usuario');</script>";
    }
    else{
        try{
            crearUsuario($_POST['user-add'], $_POST['email-add'], $_POST['password-add'], $_POST['tipo_usuario-add']);
            echo "<script type='text/javascript'>alert('Usuario añadido correctamente');</script>";
        } catch (Exception $e){
            echo $e;
            // echo "<script type='text/javascript'>alert('Ha habido un error, no se ha podido añadir el nuevo usuario. Inténtalo de nuevo');</script>";
        }
        // header("Refresh:0; url=./admin-usuarios.php");
    }
}

cerrarConexion();

?>