<?php

session_start();
// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";

sessionControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/products-db.php");

if(isset($_GET['id_producto'])){
    try {
        $currentProduct = verProducto($_GET['id_producto']);
        $categorias = verCategorias();

        $imgLogo = "../../../imgs/logo.png";
        $urlHome = "../../productos/home.php";
        $urlAdminPanel = "../../admin/admin.php";
        $urlProfile = "../mi-perfil/my-profile.php";
        $urlSignout = "../../signout/cerrar_sesion.php";
        $urlLogin = "../../../index.php";
        $urlSignUp = "../../signup/sign-up.php";

        require_once("../../../vistas/mi-perfil/mis-productos/mis-productos-modificar.php"); 
    } catch (Exception $e){
        echo "<script type='text/javascript'>alert('Ha habido un error, no se han podido cargar los productos. Inténtelo de nuevo de nuevo');</script>";  
        header("Refresh:0; url=./ver-misProductos.php");
    }
} else {
    header("Location: ./ver-misProductos.php");
}
?>

  
