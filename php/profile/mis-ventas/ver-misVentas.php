<?php

session_start();
// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";

sessionControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/users-db.php");
require_once ("../../../database/products-db.php");

// Paginación 
$productosPorPagina = 10;
$pagina = 1;
$urlSelf = './ver-misVentas.php?';

if (isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
}

$limit = $productosPorPagina;
$offset = ($pagina -1 ) * $productosPorPagina;


if(isset($_GET['id_usuario'])){
    adminControl($location);
    try{
        $currentUser = verUsuario($_GET['id_usuario']);

        $miperfil = "../mi-perfil/my-profile.php?id_usuario=".$_GET['id_usuario'];
        $misdirecciones = "../mis-direcciones/ver-misDirecciones.php?id_usuario=".$_GET['id_usuario'];
        $misproductos = "../mis-productos/ver-misProductos.php?id_usuario=".$_GET['id_usuario'];
        $miscompras = "../mis-compras/ver-misCompras.php?id_usuario=".$_GET['id_usuario'];
        $misventas = "./ver-misVentas.php?id_usuario=".$_GET['id_usuario'];

    } catch(Exception $e){
        echo "<script type='text/javascript'>alert('Ha habido un error, 
        no se han podido cargar los productos. Inténtelo de nuevo de nuevo');</script>";  
        header("Refresh:0; url=../mi-perfil/my-profile.php");
    }
} else {
    try{
        $currentUser = verUsuario($_SESSION['id_usuario']);

        $miperfil = "../mi-perfil/my-profile.php";
        $misdirecciones = "../mis-direcciones/ver-misDirecciones.php";
        $misproductos = "../mis-productos/ver-misProductos.php";
        $miscompras = "../mis-compras/ver-misCompras.php";
        $misventas = "./ver-misVentas.php";

    } catch(Exception $e){
        echo "<script type='text/javascript'>alert('Ha habido un error, 
        no se han podido cargar los productos. Inténtelo de nuevo de nuevo');</script>";  
        header("Refresh:0; url=../mi-perfil/my-profile.php");
    }
}


try {

    $conteoPaginas = conteoProductosVendidosPorVendedor($currentUser['id_usuario']);
    $paginas = ceil($conteoPaginas/$productosPorPagina);

    // Hacemos la petición de los productos a la BBDD
    $productos = verProductosVendidosPorVendedor($currentUser['id_usuario'], $limit, $offset);

    $imgLogo = "../../../imgs/logo.png";
    $urlHome = "../../productos/home.php";
    $urlAdminPanel = "../../admin/admin.php";
    $urlProfile = "../mi-perfil/my-profile.php";
    $urlSignout = "../../signout/cerrar_sesion.php";
    $urlLogin = "../../../index.php";
    $urlSignUp = "../../signup/sign-up.php";

    require_once("../../../vistas/mi-perfil/mis-ventas/misVentas.php");

} catch (Exception $e){
    echo "<script type='text/javascript'>alert('Ha habido un error, no se han podido cargar los productos. Inténtelo de nuevo de nuevo');</script>";  
    header("Refresh:0; url=../mi-perfil/my-profile.php");
}
?>
