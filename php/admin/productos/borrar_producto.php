<?php
session_start();

// Comprobamos el producto
require_once("../../user-control/user-control.php");

require_once ("../../../database/connect-db.php");
require_once ("../../../database/products-db.php");
$page = $_SERVER['HTTP_REFERER'];

if(isset($_GET['id_producto'])){
    $product = verProducto($_GET['id_producto']);
   // Comprobar que el producto es del usuario
    if($_SESSION['id_usuario'] == $product['propietario']){
        try {
            borrarProducto($_GET['id_producto']);
            echo "<script type='text/javascript'>alert('Producto eliminado correctamente');</script>";
        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, el producto no ha podido ser borrado');</script>";  
        }
        header("Refresh:0; url=$page");
    }else{
        $location = "../../../index.php";
        adminControl($location);
        try {
            borrarProducto($_GET['id_producto']);
            echo "<script type='text/javascript'>alert('Producto borrado correctamente');</script>";
        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, el producto no ha podido ser borrado');</script>";
        }
        header("Refresh:0; url=$page");
    }
}

cerrarConexion();

?>