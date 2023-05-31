<?php

session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
adminControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/products-db.php");

try {
    // Paginación 
    $productosPorPagina = 10;
    $pagina = 1;
    $urlSelf = './admin-productos.php?';
    
    if (isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }

    $limit = $productosPorPagina;
    $offset = ($pagina -1 ) * $productosPorPagina;
    $conteoPaginas = conteoProductos();
    $paginas = ceil($conteoPaginas/$productosPorPagina);

    // Hacemos la petición de los productos a la BBDD
    $productos = verProductos($limit, $offset);

    $imgLogo = "../../../imgs/logo.png";
    $urlHome = "../../productos/home.php";
    $urlAdminPanel = "../admin.php";
    $urlMyProducts = "../../mis-productos/ver-misProductos.php";
    $urlProfile = "../../profile/mi-perfil/my-profile.php";
    $urlSignout = "../../signout/cerrar_sesion.php";
    $urlLogin = "../../../index.php";
    $urlSignUp = "../../signup/sign-up.php";

    require_once("../../../vistas/admin-panel/productos/admin-panel-productos.php");

} catch (Exception $e){
    echo "<script type='text/javascript'>alert('Ha habido un error, no se han podido cargar los productos. Inténtelo de nuevo de nuevo');</script>";  
    header("Refresh:0; url=../productos/home.php");
}

cerrarConexion();
?>