<?php
session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
adminControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/products-db.php");
require_once ("./imagenes-utils.php");

// Comprobaciones de campos
if(isset($_GET['id_producto']) && isset($_POST['modify-product'])){
    $currentProduct = verProducto($_GET['id_producto']);
    
    if(empty($_POST['product-nombre-modify'])) {
        $nombre_producto = $currentProduct['nombre_producto'];
    } else {
        $nombre_producto = trim($_POST['product-nombre-modify']);
    }
    if(empty($_POST['product-fecha-modify'])) {
        $fecha = $currentProduct['fecha'];
    } else {
        $fecha = trim($_POST['product-fecha-modify']);
    }
    if(empty($_POST['product-descripcion-modify'])) {
        $descripcion = $currentProduct['descripcion'];
    } else {
        $descripcion = trim($_POST['product-descripcion-modify']);
    }
    if(!isset($_POST['product-categoria-modify'])) {
        $categoria = $currentProduct['categoria'];
    } else {
        $categoria = trim($_POST['product-categoria-modify']);
    }
    if(!isset($_POST['product-estado-modify'])) {
        $estado = $currentProduct['estado'];
    } else {
        $estado = trim($_POST['product-estado-modify']);
    }
    if(empty($_POST['product-precio-modify'])) {
        $precio = $currentProduct['precio'];
    } else {
        $precio = trim($_POST['product-precio-modify']);
    }
    if(!isset($_POST['product-enventa-modify'])) {
        $enventa = $currentProduct['enventa'];
    } else {
        $enventa = trim($_POST['product-enventa-modify']);
    }
    if(empty($_POST['product-propietario-modify'])) {
        $propietario = $currentProduct['propietario'];
    } else {
        $propietario = trim($_POST['product-propietario-modify']);
    }
    if(empty($_POST['product-comprador-modify'])) {
        $comprador = $currentProduct['comprador'];
    } else {
        $comprador = trim($_POST['product-comprador-modify']);
    }
    
    // Imágenes
    $pathInfo = 'product-imagen-modify';
    $pathfile = '../../../';
    $imagen = sube_imagen($pathInfo, $pathfile);
    $page = $_SERVER['HTTP_REFERER'];

    // En caso de error en la imagen 
    if ($imagen == 3 && !is_null($imagen)){
        echo "<script type='text/javascript'>alert('Lo sentimos, la extensión de a imágen no es válida. inténtelo de nuevo con otra imagen de tipo .png., .jpg , .jpeg o .gif');</script>";
        header("Refresh:0; url=$page");
    } elseif ($imagen == 2 && !is_null($imagen)){
        echo "<script type='text/javascript'>alert('Lo sentimos, ha habido un problema al cargar su imágen, inténtelo de nuevo');</script>";
        header("Refresh:0; url=$page");
    } else {
        try {
            modificarProducto($_GET['id_producto'], $nombre_producto, $descripcion, $imagen, $precio, $categoria, $enventa, $estado, $propietario, $comprador, $fecha);
            echo "<script type='text/javascript'>alert('Producto modificado correctamente');</script>";
        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, el producto no ha podido ser modficado');</script>";
        }
        header("Refresh:0; url=./admin-productos.php");
    }
}

cerrarConexion();

?>