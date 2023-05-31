<?php

session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
adminControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/products-db.php");



if(isset($_GET['id_producto'])){
    $currentProduct = verProducto($_GET['id_producto']);
    $categorias = verCategorias();
    
    $imgLogo = "../../../imgs/logo.png";
    $urlHome = "../../productos/home.php";
    $urlAdminPanel = "../admin.php";
    $urlMyProducts = "../../mis-productos/ver-misProductos.php";
    $urlProfile = "../../profile/mi-perfil/my-profile.php";
    $urlSignout = "../../signout/cerrar_sesion.php";
    $urlLogin = "../../../index.php";
    $urlSignUp = "../../signup/sign-up.php";

    require_once("../../../vistas/admin-panel/productos/admin-panel-productos-modificar.php");  
} else {
    header("Location: ./admin-panel-productos.php");
}

cerrarConexion();

?>