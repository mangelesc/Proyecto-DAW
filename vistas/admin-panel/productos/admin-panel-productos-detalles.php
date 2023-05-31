<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/log-in.css" />
    <link rel="stylesheet" href="../../../styles/navbar.css" />
    <link rel="stylesheet" href="../../../styles/admin-panel.css" />
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <title>Detalles de producto</title>
</head>
<body>
    <?php
        require_once ("../../../vistas/navbar.php");
    ?>
    <main>
        <div class="main">
        <div class="user-main">
            <h1 class="tittle-h1">Detalles del producto id <?php echo $currentProduct['id_producto'];?></h1>
        </div>
        <div class="admin-form-div">
            <form action= "./crear_producto2.php" method='post' class="admin-form"> 
                <div class="form-column">
                    <div class="formSection">
                        <label>Nombre del producto: </label>
                        <p class="productDetail"><?php echo $currentProduct['nombre_producto'];?></p>
                    </div>
                    <div class="formSection">
                        <label>Fecha de creación:</label>
                        <p class="productDetail"><?php echo $currentProduct['fecha'];?></p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Descripción del producto:</label>
                        <p class="productDetail-full"><?php echo $currentProduct['descripcion'];?></p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Categoría:</label>
                        <p class="productDetail"><?php 
                            $categoria = verCategoria($currentProduct['categoria']);
                            echo $categoria['nombre_categoria'];
                        ?> </p>
                    </div>
                    <div class="formSection">
                        <label>Estado:</label>
                        <p class="productDetail"><?php 
                            switch($currentProduct['estado']){
                                case 1:
                                    echo 'Nuevo';
                                    break;
                                case 2:
                                    echo 'Semi nuevo';
                                    break;
                                case 3:
                                    echo 'En buen estado';
                                    break;
                                case 4:
                                    echo 'En condiciones aceptables';
                                    break;
                                case 5:
                                    echo 'Necesita reparación';
                                    break;
                            }
                        ?> </p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Precio:</label>
                        <p class="productDetail"><?php echo $currentProduct['precio'];?> € </p>
                    </div>
                    <div class="formSection">
                        <label>¿Está en venta?:</label>
                        <p class="productDetail"> <?php 
                            switch($currentProduct['enventa']){
                                case 1:
                                    echo 'En venta';
                                    break;
                                case 0:
                                    echo 'Vendido';
                                    break;
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Id del vendedor:</label>
                        <p class="productDetail"><?php echo $currentProduct['propietario'];?></p>
                    </div>
                    <div class="formSection">
                        <label>Id Comprador (Productos vendidos):</label>
                        <p class="productDetail">
                            <?php 
                                if ($currentProduct['comprador'] == null){
                                    echo 'Producto en venta';
                                }
                                else {
                                    echo $currentProduct['comprador'];
                                }
                            ;?>
                        </p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label for="">Imágen: </label>
                        <img
                            src="<?php 
                                if (!is_null($currentProduct['imagen']) || !empty($currentProduct['imagen']) ){
                                    echo '../../../'.$currentProduct['imagen'];
                                } else {
                                    echo "../../../imgs/default.jpg";
                                }?>"
                            alt="Imagen del producto <?php echo $currentProduct['nombre_producto'];?>"
                            class="img-details"
                        />
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="div-button">
            <div class="admin-button">
                <a href='./admin-productos.php'>Volver</a>
            </div>
        </div>
    </main>
</body>
</html>