<?php
// http://localhost/Proyecto-DAW/php/productos/detalle-producto.php?id_producto=1

session_start();
require_once ("../../database/connect-db.php");
require_once ("../../database/products-db.php");
require_once ("../../database/users-db.php");

if(isset($_GET['id_producto'])){

try {
    $currentProduct = verProducto($_GET['id_producto']);
    $currentPropietario = verUsuario($currentProduct['propietario']);
    if ($currentProduct != null){
        $imgLogo = "../../imgs/logo.png";
        $urlHome = "./home.php";
        $urlAdminPanel = "../admin/admin.php";
        $urlMyProducts = "../mis-productos/ver-misProductos.php";
        $urlProfile = "../profile/mi-perfil/my-profile.php";
        $urlSignout = "../signout/cerrar_sesion.php";
        $urlLogin = "../../index.php";
        $urlSignUp = "../signup/sign-up.php";

        require_once("../../vistas/productos/productos-detalle.php");  
    } else {
        echo "<script type='text/javascript'>alert('Ha habido un error, no se han podido encontrar el producto que buscaba. Inténtelo de nuevo de nuevo');</script>";  
        header("Refresh:0; url=./home.php");
    }
        
} catch (Exception $e){
    echo "<script type='text/javascript'>alert('Ha habido un error, no se han podido encontrar el producto que buscaba. Inténtelo de nuevo de nuevo');</script>";  
    header("Refresh:0; url=./home.php");
}
}

?>