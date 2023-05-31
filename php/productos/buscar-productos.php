<?php
// http://localhost/Proyecto-DAW/php/productos/detalle-producto.php?id_producto=1

session_start();
require_once ("../../database/connect-db.php");
require_once ("../../database/products-db.php");


$categoria = '';
$nombre_categoria = '';
$nombre_producto = '';

if(isset($_GET['categoria'])){
    $buscar_categoria = verCategoriaPorNombre($_GET['categoria']);
    if(!is_null($buscar_categoria)){
        $categoria = $buscar_categoria['id_categoria'];
        $nombre_categoria = $_GET['categoria'];
        $urlSelf = "./buscar-productos.php?categoria=$nombre_categoria&";
    }else {
        $categoria = -1;
    }
    
}
if(isset($_GET['nombre_producto'])){
    $nombre_producto=$_GET['nombre_producto'];
    $urlSelf = "./buscar-productos.php?nombre_producto=$nombre_producto&";
}

try {
    $productosPorPagina = 12;
    $pagina = 1;
    
    if (isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }

    $limit = $productosPorPagina;
    $offset = ($pagina -1 ) * $productosPorPagina;
    $conteoPaginas = conteoProductosFiltradosEnVenta($categoria, $nombre_producto);
    $paginas = ceil($conteoPaginas/$productosPorPagina);

    // Hacemos la petición de los productos a la BBDD
    $productos = filtarProductosEnVenta($categoria, $nombre_producto, $limit, $offset);
    if ($productos == null){
        $NoEncontrado = 'Lo sentimos, no hemos encontrado ningún producto con los criterios de búsqueda seleccionados';
    }

        $imgLogo = "../../imgs/logo.png";
        $urlHome = "./home.php";
        $urlAdminPanel = "../admin/admin.php";
        $urlMyProducts = "../mis-productos/ver-misProductos.php";
        $urlProfile = "../profile/mi-perfil/my-profile.php";
        $urlSignout = "../signout/cerrar_sesion.php";
        $urlLogin = "../../index.php";
        $urlSignUp = "../signup/sign-up.php";

        require_once("../../vistas/productos/productos-filtrados.php");  
        
} catch (Exception $e){
    echo "<script type='text/javascript'>alert('Ha habido un error, no se han podido encontrar el producto que buscaba. Inténtelo de nuevo de nuevo');</script>";  
    // header("Refresh:0; url=./home.php");
}
// }

?>