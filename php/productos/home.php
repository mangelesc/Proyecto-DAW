<?php

session_start();
require_once ("../../database/connect-db.php");
require_once ("../../database/products-db.php");
try{

    // Paginación 
    $productosPorPagina = 12;
    $pagina = 1;
    $urlSelf = './home.php?';
    
    if (isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }

    $limit = $productosPorPagina;
    $offset = ($pagina -1 ) * $productosPorPagina;
    $conteoPaginas = conteoProductosEnVenta();
    $paginas = ceil($conteoPaginas/$productosPorPagina);

    // Hacemos la petición de los productos a la BBDD
    $productos = verProductosEnVenta($limit, $offset);

// En caso de error en la conexión en la BBDD, mostramos un mensaje al usuario
} catch (Exception $e){
    $NoEncontrado = 'Lo sentimos, actualmente no nos encontramos disponible. Inténtelo más tarde.';
}
    // Cargamos la vista
    $imgLogo = "../../imgs/logo.png";
    $urlHome = "./home.php";
    $urlUserPanel ="../user/user-panel.php";
    $urlAdminPanel = "../admin/admin.php";
    $urlMyProducts = "../mis-productos/ver-misProductos.php";
    $urlProfile = "../profile/mi-perfil/my-profile.php";
    $urlSignout = "../signout/cerrar_sesion.php";
    $urlLogin = "../../index.php";
    $urlSignUp = "../signup/sign-up.php";

    require_once("../../vistas/productos/home.php");


?>