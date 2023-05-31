<?php

session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
adminControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/products-db.php");
require_once ("./imagenes-utils.php");

if(isset($_POST['add-product'])){
    if(empty($_POST['product-nombre-add']) || empty($_POST['product-descripcion-add']) 
        || !isset($_POST['product-categoria-add']) || !isset($_POST['product-estado-add']) 
        || empty($_POST['product-precio-add']) || !isset($_POST['product-enventa-add']) 
        || empty($_POST['product-propietario-add'])){
        echo "<script type='text/javascript'>alert('Debes rellenar todos los campos obligatorios para crear un nuevo producto');</script>";
    }
    else{

        $page = $_SERVER['HTTP_REFERER'];
        
        $nombre_producto = trim($_POST['product-nombre-add']);
        $descripcion = trim($_POST['product-descripcion-add']);
        $precio = trim($_POST['product-precio-add']);
        $categoria = trim($_POST['product-categoria-add']);
        $enventa = trim($_POST['product-enventa-add']);
        $estado = trim($_POST['product-estado-add']);
        $propietario= trim($_POST['product-propietario-add']);
        $comprador = trim($_POST['product-comprador-add']);
        $fecha = trim($_POST['product-fecha-add']);
    
        // Imágenes
        $pathInfo = 'product-imagen-add';
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
            // Añadir el producto
            try{
                crearProducto($nombre_producto, $descripcion, $imagen, $precio, 
                    $categoria, $enventa, $estado, $propietario, $comprador, $fecha);
                echo "<script type='text/javascript'>alert('Producto añadido correctamente');</script>";
            } catch (Exception $e){
                echo "<script type='text/javascript'>alert('Ha habido un error, no se ha podido añadir el nuevo producto. Inténtalo de nuevo');</script>";
            }
            header("Refresh:0; url=./admin-productos.php");
        }
    }
}

cerrarConexion();


?>