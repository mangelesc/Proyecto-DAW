<?php

session_start();
// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";

sessionControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/users-db.php");

// Control Perfil
// Si es usuario administrador, podrá acceder a cualquier perfil a través de get
// Si no tiene permisos de admin, sólo podrá acceder a su propio perfil
if(isset($_GET['id_usuario'])){
    adminControl($location);
    try{
        $currentUser = verUsuario($_GET['id_usuario']);

        $miperfil = "./my-profile.php?id_usuario=".$_GET['id_usuario'];
        $misdirecciones = "../mis-direcciones/ver-misDirecciones.php?id_usuario=".$_GET['id_usuario'];
        $misproductos = "../mis-productos/ver-misProductos.php?id_usuario=".$_GET['id_usuario'];
        $miscompras = "../mis-compras/ver-misCompras.php?id_usuario=".$_GET['id_usuario'];
        $misventas = "../mis-ventas/ver-misVentas.php?id_usuario=".$_GET['id_usuario'];

    } catch(Exception $e){
        echo "<script type='text/javascript'>alert('Ha habido un error, 
        no se han podido cargar los productos. Inténtelo de nuevo de nuevo');</script>";  
        header("Refresh:0; url=../mi-perfil/my-profile.php");
    }
} else {
    try{
        $currentUser = verUsuario($_SESSION['id_usuario']);

        $miperfil = "./my-profile.php";
        $misdirecciones = "../mis-direcciones/ver-misDirecciones.php";
        $misproductos = "../mis-productos/ver-misProductos.php";
        $miscompras = "../mis-compras/ver-misCompras.php";
        $misventas = "../mis-ventas/ver-misVentas.php";

    } catch(Exception $e){
        echo "<script type='text/javascript'>alert('Ha habido un error, 
        no se han podido cargar los productos. Inténtelo de nuevo de nuevo');</script>";  
        header("Refresh:0; url=../mi-perfil/my-profile.php");
    }
}

$imgLogo = "../../../imgs/logo.png";
$urlHome = "../../productos/home.php";
$urlAdminPanel = "../../admin/admin.php";
$urlProfile = "./my-profile.php";
$urlSignout = "../../signout/cerrar_sesion.php";
$urlLogin = "../../../index.php";
$urlSignUp = "../../signup/sign-up.php";


require_once("../../../vistas/mi-perfil/mi-perfil/my-profile.php");





?>
