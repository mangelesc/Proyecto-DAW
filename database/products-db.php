<?php

// **CRUD**
// Create, Read, Update ,Delete



// ********************
// GESTIÓN DE PRODUCTOS
// ********************

// **READ**
// Ver o leer los registros de las tablas producto y categoría
function verCategorias() {
  $query = "SELECT * 
            FROM categoria";
  $result = mysqli_query($GLOBALS["con"], $query);
  $categorias = array();
  while($row = mysqli_fetch_array($result)){
      $categorias[] = $row;
  }
  return $categorias; //Devuelvo un array con los datos de todos los productos
}

function verCategoria($id_categoria) {
  $query = "SELECT * 
            FROM categoria 
            WHERE id_categoria=$id_categoria";
  $result = mysqli_query($GLOBALS["con"], $query);
  $categoria = mysqli_fetch_array($result);
  return $categoria;
}

function verCategoriaPorNombre($nombre_categoria) {
  $query = "SELECT distinct(id_categoria) 
            FROM categoria 
            WHERE lower(nombre_categoria)='".$nombre_categoria."'";
  $result = mysqli_query($GLOBALS["con"], $query);
  $categoria = mysqli_fetch_array($result);
  return $categoria;
}

// Ver todos los productos
function verProductos($limit, $offset){
  $query = "SELECT * 
            FROM producto 
            ORDER BY nombre_producto ASC 
            LIMIT $limit OFFSET $offset";
  $result = mysqli_query($GLOBALS["con"], $query);
  $productos = array();
  while($row = mysqli_fetch_array($result)){
      $productos[] = $row;
  }
  return $productos; 
}

function conteoProductos(){
  $query = "SELECT count(*) AS conteo 
            FROM producto";
  $result = mysqli_query($GLOBALS["con"], $query);
  $total = mysqli_fetch_array($result);
  return $total['conteo'];
}

// Ver sólo los productos en venta
function verProductosEnVenta($limit, $offset){
  $query = "SELECT * 
            FROM producto 
            WHERE enventa = '1' 
            ORDER BY nombre_producto ASC 
            LIMIT $limit OFFSET $offset";
  $result = mysqli_query($GLOBALS["con"], $query);
  $productos = array();
  while($row = mysqli_fetch_array($result)){
      $productos[] = $row;
  }
  return $productos;
}

function conteoProductosEnVenta(){
  $query = "SELECT count(*) AS conteo 
            FROM producto 
            WHERE enventa = '1';";
  $result = mysqli_query($GLOBALS["con"], $query);
  $categoria = mysqli_fetch_array($result);
  return $categoria['conteo'];
}

// Ver un producto
function verProducto($id_producto){
  $query = "SELECT * 
            FROM producto 
            WHERE id_producto=$id_producto";
  $result = mysqli_query($GLOBALS["con"], $query);
  $producto = mysqli_fetch_array($result);
  return $producto; 
}

// Ver productos de un vendedor
function verProductosPorVendedor($id_usuario, $limit, $offset){
  $query = "SELECT * 
            FROM producto 
            WHERE propietario=$id_usuario 
            ORDER BY nombre_producto ASC 
            LIMIT $limit OFFSET $offset";
  $result = mysqli_query($GLOBALS["con"], $query );
  $productos = array();
  while($row = mysqli_fetch_array($result)){
      $productos[] = $row;
  }
  return $productos; 
}

function conteoProductosPorVendedor($id_usuario){
  $query = "SELECT count(*) AS conteo 
            FROM producto 
            WHERE propietario=$id_usuario;";
  $result = mysqli_query($GLOBALS["con"], $query);
  $total = mysqli_fetch_array($result);
  return $total['conteo'];
}

// Ver productos vendidosde un vendedor
function verProductosVendidosPorVendedor($id_usuario, $limit, $offset){
  $query = "SELECT * 
            FROM producto 
            WHERE propietario=$id_usuario AND enventa = '0' 
            ORDER BY fechaVenta DESC 
            LIMIT $limit OFFSET $offset";
  $result = mysqli_query($GLOBALS["con"], $query);
  $productos = array();
  while($row = mysqli_fetch_array($result)){
      $productos[] = $row;
  }
  return $productos; 
}

function conteoProductosVendidosPorVendedor($id_usuario){
  $query = "SELECT count(*) AS conteo 
            FROM producto 
            WHERE propietario=$id_usuario AND enventa = '0';";
  $result = mysqli_query($GLOBALS["con"], $query);
  $total = mysqli_fetch_array($result);
  return $total['conteo'];
}

// Ver productos de un comprados
function verProductosPorComprador($id_usuario, $limit, $offset){
  $query = "SELECT * 
            FROM producto 
            WHERE comprador=$id_usuario 
            ORDER BY fechaVenta DESC 
            LIMIT $limit OFFSET $offset";
  $result = mysqli_query($GLOBALS["con"], $query);
  $productos = array();
  while($row = mysqli_fetch_array($result)){
      $productos[] = $row;
  }
  return $productos; 
}

function conteoProductosPorComprador($id_usuario){
  $query = "SELECT count(*) AS conteo 
            FROM producto 
            WHERE comprador=$id_usuario;";
  $result = mysqli_query($GLOBALS["con"], $query);
  $total = mysqli_fetch_array($result);
  return $total['conteo'];
}

// Filtrar Productos según categoría y/o nombre
function filtarProductos($categoria, $nombre_producto){
    $query = "SELECT * 
              FROM producto 
              WHERE categoria like '%?%' OR nombre_producto like '%?%' 
              ORDER BY nombre_producto ASC";
    $stmt = mysqli_prepare($GLOBALS["con"], $query);
    mysqli_stmt_bind_param($stmt, "is", $categoria, $nombre_producto);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $productos = array();
    while($row = mysqli_fetch_array($result)){
        $productos[] = $row;
    }
    return $productos; 
}


// Filtrar Productos en venta según categoría y/o nombre
function filtarProductosEnVenta($categoria, $nombre_producto, $limit, $offset){
  //  $query = "";
  //   $stmt = mysqli_prepare($GLOBALS["con"], $query);
  //   mysqli_stmt_bind_param($stmt, "i", $id_producto);
  //   mysqli_stmt_execute($stmt);
  //   $result = mysqli_stmt_get_result($stmt);
  $query = "SELECT * from producto 
            WHERE enventa = '1' 
            AND categoria LIKE '%".$categoria."%' 
            AND nombre_producto LIKE '%".$nombre_producto."%' 
            ORDER BY nombre_producto ASC 
            LIMIT $limit OFFSET $offset";
  $result = mysqli_query($GLOBALS["con"], $query);
  $productos = array();
  while($row = mysqli_fetch_array($result)){
      $productos[] = $row;
  }
  return $productos; 
}

function conteoProductosFiltradosEnVenta($categoria, $nombre_producto){
    $query = "SELECT count(*) AS conteo FROM producto WHERE enventa = '1' AND  categoria like '%".$categoria."%' and nombre_producto like '%".$nombre_producto."%'";
    $result = mysqli_query($GLOBALS["con"], $query);
    $categoria = mysqli_fetch_array($result);
    return $categoria['conteo'];
}

// **CREATE**
// Crear Producto
function crearProducto($nombre_producto, $descripcion, $imagen, $precio, $categoria, $enventa, $estado, $propietario, $comprador, $fecha) {
  if ($comprador==''){
    $compradorVal = 'null';
  } else {
    $compradorVal = $comprador;
  }
  if ($imagen==''){
    $imagenVal = 'null';
  } else {
    $imagenVal = "'".$imagen."'";
  }
    //  $query = "";
  //   $stmt = mysqli_prepare($GLOBALS["con"], $query);
  //   mysqli_stmt_bind_param($stmt, "i", $id_producto);
  //   mysqli_stmt_execute($stmt);
  //   $result = mysqli_stmt_get_result($stmt);
  $query = "INSERT INTO producto(nombre_producto, descripcion, imagen, precio, categoria, 
      enventa, estado, propietario, comprador, fecha) 
      VALUES('$nombre_producto', '$descripcion', $imagenVal, $precio, $categoria, '$enventa', '$estado', $propietario, $compradorVal, '$fecha')";
  mysqli_query($GLOBALS["con"], $query);
}

// **UPDATE**
// Modificar Producto
function modificarProducto($id_producto, $nombre_producto, $descripcion,  $imagen, $precio, $categoria, $enventa, $estado, $propietario, $comprador, $fecha){
  if ($comprador==''){
    $compradorVal = 'null';
  } else {
    $compradorVal = $comprador;
  }
  if ($imagen==''){
    $imagenVal = 'null';
  } else {
    $imagenVal = "'".$imagen."'";
  }
    //  $query = "";
  //   $stmt = mysqli_prepare($GLOBALS["con"], $query);
  //   mysqli_stmt_bind_param($stmt, "i", $id_producto);
  //   mysqli_stmt_execute($stmt);
  //   $result = mysqli_stmt_get_result($stmt);
  $query = "UPDATE producto SET nombre_producto='$nombre_producto', descripcion='$descripcion',imagen=$imagenVal, precio=$precio, categoria=$categoria, 
      enventa='$enventa', estado=$estado, propietario=$propietario, comprador=$compradorVal, fecha='$fecha' WHERE id_producto=$id_producto";
  mysqli_query($GLOBALS["con"], $query);
}

// Cambiar el estado de un producto a vendido
function productoVendido($id_producto, $comprador, $fechaVenta, $codigoVenta){
    $query = "UPDATE producto 
              SET enventa='0', comprador=?, fechaVenta=?, codigoVenta=? 
              WHERE id_producto=?";
    $stmt = mysqli_prepare($GLOBALS["con"], $query);
    mysqli_stmt_bind_param($stmt, "issi", $comprador, $fechaVenta, $codigoVenta, $id_producto);
    mysqli_stmt_execute($stmt);
}

// **DELETE**
// Borrar Producto
function borrarProducto($id_producto){
    $query = "DELETE FROM producto 
              WHERE id_producto=?";
    $stmt = mysqli_prepare($GLOBALS["con"], $query);
    mysqli_stmt_bind_param($stmt, "i", $id_producto);
    mysqli_stmt_execute($stmt);
}



  //  $query = "";
  //   $stmt = mysqli_prepare($GLOBALS["con"], $query);
  //   mysqli_stmt_bind_param($stmt, "i", $id_producto);
  //   mysqli_stmt_execute($stmt);
  //   $result = mysqli_stmt_get_result($stmt);
?>