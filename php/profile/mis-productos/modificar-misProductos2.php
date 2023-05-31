<?php
session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
sessionControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/products-db.php");
require_once ("../../admin/productos/imagenes-utils.php");

// Comprobaciones de campos
if(isset($_GET['id_producto']) && isset($_POST['modify-product'])){
    try{
        $page = $_SERVER['HTTP_REFERER'];

        $product = verProducto($_GET['id_producto']);

        if($_SESSION['id_usuario'] == $product['propietario'] || $_SESSION['tipo_usuario'] == 0) {
            $currentProduct = verProducto($_GET['id_producto']);

        $fecha = $currentProduct['fecha'];
        $enventa = $currentProduct['enventa'];
        $propietario = $currentProduct['propietario'];
        $comprador = $currentProduct['comprador'];

        if(empty($_POST['product-nombre-modify'])) {
            $nombre_producto = $currentProduct['nombre_producto'];
        } else {
            $nombre_producto = $_POST['product-nombre-modify'];
        }

        if(empty($_POST['product-descripcion-modify'])) {
            $descripcion = $currentProduct['descripcion'];
        } else {
            $descripcion = $_POST['product-descripcion-modify'];
        }

        if(!isset($_POST['product-categoria-modify'])) {
            $categoria = $currentProduct['categoria'];
        } else {
            $categoria = $_POST['product-categoria-modify'];
        }

        if(!isset($_POST['product-estado-modify'])) {
            $estado = $currentProduct['estado'];
        } else {
            $estado = $_POST['product-estado-modify'];
        }

        if(empty($_POST['product-precio-modify'])) {
            $precio = $currentProduct['precio'];
        } else {
            $precio = $_POST['product-precio-modify'];
        }
        
        // Imágenes
        $pathInfo = 'myproducts-imagen-modify';
        $pathfile = '../../../';
        $imagen = sube_imagen($pathInfo, $pathfile);

        

        // En caso de error en la imagen 
        if ($imagen == 3 && !is_null($imagen)){
            echo "<script type='text/javascript'>alert('Lo sentimos, la extensión de a imágen no es válida. inténtelo de nuevo con otra imagen de tipo .png., .jpg o .gif');</script>";
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
            header("Refresh:0; url=./ver-misProductos.php");
        }
        }
    }catch (Exception $e){
    echo "<script type='text/javascript'>alert('Ha habido un error, el producto no ha podido ser modficado');</script>";             
    header("Refresh:0; url=./ver-misProductos.php");
    }   
}

cerrarConexion();

?>