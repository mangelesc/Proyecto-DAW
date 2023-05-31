<?php

session_start();
// Comprobamos el usuario
require_once("../user-control/user-control.php");
$location = "../../index.php";

sessionControl($location);
$page = $_SERVER['HTTP_REFERER'];

if(isset($_GET['id_producto'])){
    require_once ("../../database/connect-db.php");
    require_once ("../../database/products-db.php");

    // Evitamos que se pueda acceder a esta página si el producto ya está vendido
    $currentProduct= verProducto($_GET['id_producto']);
    if($currentProduct['enventa'] == '1'){
        try {
            $currentProduct = verProducto($_GET['id_producto']);
            if ($currentProduct != null){
                $imgLogo = "../../imgs/logo.png";
                $urlHome = "./home.php";
                $urlAdminPanel = "../admin/admin.php";
                $urlMyProducts = "../mis-productos/ver-misProductos.php";
                $urlProfile = "../profile/mi-perfil/my-profile.php";
                $urlSignout = "../signout/cerrar_sesion.php";
                $urlLogin = "../../index.php";
                $urlSignUp = "../signup/sign-up.php";

                require_once("../../vistas/productos/productos-comprar.php");  
            } else {
                echo "<script type='text/javascript'>alert('Ha habido un error, no se han podido encontrar el producto que buscaba. Inténtelo de nuevo de nuevo');</script>";  
                header("Refresh:0; url=$page");
            }
                
        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, no se han podido encontrar el producto que buscaba. Inténtelo de nuevo de nuevo');</script>";  
            header("Refresh:0; url=$page");
        }
    } else {
        echo "<script type='text/javascript'>alert('El producto que intenta comprar no se encuentra en venta. Sentimos las molestias.');</script>";  
        header("Refresh:0; url=./home.php");
    }
} else {
    header("Refresh:0; url=$page");
}

?>