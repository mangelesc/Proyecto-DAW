<?php
session_start();

// Comprobamos el usuario
require_once("../user-control/user-control.php");
$location = "../../index.php";

sessionControl($location);

if(isset($_GET['id_producto'])){
    require_once ("../../database/connect-db.php");
    require_once ("../../database/products-db.php");
    require_once("./codigo-venta.php");

    try {
        $fechaVenta = date("Y-m-d");
        $codigoVenta = genera_codigo (12);
        productoVendido($_GET['id_producto'], $_SESSION['id_usuario'], $fechaVenta, $codigoVenta);
        echo "<script type='text/javascript'>alert('Producto comprado exitosamente');</script>";
        header("Refresh:2; url=../profile/mis-compras/ver-misCompras.php");

    } catch(Exception $e) {
        echo "<script type='text/javascript'>alert('Ups, ha ocurrido un error con su compra. Por favor, póngase en contacto con nosotros para solucionarlo');</script>";
    }
    
}

?>