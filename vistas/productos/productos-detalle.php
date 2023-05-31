<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/navbar.css" />
    <link rel="stylesheet" href="../../styles/tarjetas.css" />
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title><?php echo $currentProduct['nombre_producto'];?></title>
</head>
<body>
    <?php
        require_once ("../../vistas/navbar.php");
    ?>
    <main>
        <div class="ProductProfile-box">
            <div class="productProfile-left">
                <img
                    src="<?php 
                            if (!is_null($currentProduct['imagen']) || !empty($prodcurrentProductucto['imagen']) ){
                                echo '../../'.$currentProduct['imagen'];
                            } else {
                                echo "../../imgs/default.jpg";
                            }?>"
                        alt="<?php echo $currentProduct['nombre_producto'];?> imagen"
                    alt="<?php echo $currentProduct['nombre_producto'];?> imagen"
                    id="productProfile-img"
                />
            </div>
            <div class="productProfile-right">
                <div class="producto-titulo">
                    <h2 id="gretting"><?php echo $currentProduct['nombre_producto'];?></h2>
                    <div class="date">
                    <p class="userProf-div-tittle"> <b>Publicado</b></p>    
                    <p><?php echo $currentProduct['fecha'];?></p>
                    </div>
                </div>
                <div class="productProf-tbody">
                    <div class="productProf-div">
                        <div class="productProf-div-img-div">
                            <img class="productProf-div-img" src="../../imgs/detalle.png" alt="Descripción" />
                        </div>
                        <div class="productProf-div-info">
                            <p class="userProf-div-tittle"><b>Descripción</b></p>
                            <p><?php echo $currentProduct['descripcion'];?></p>
                        </div>
                        <div class="userProf-div-btn">
                        </div>
                    </div>
                    <div class="productProf-div">
                        <div class="productProf-div-img-div">
                            <img class="productProf-div-img" src="../../imgs/estado.png" alt="Vendedor" />
                        </div>
                        <div class="productProf-div-info">
                            <p class="userProf-div-tittle"><b>Estado</b></p>
                            <p>
                            <?php
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
                            ?>
                            </p>
                        </div>
                        <div class="userProf-div-btn">
                        </div>
                    </div>
                    <div class="productProf-div">
                        <div class="productProf-div-img-div">
                            <img class="productProf-div-img" src="../../imgs/categoria.png" alt="Vendedor" />
                        </div>
                        <div class="productProf-div-info">
                            <p class="userProf-div-tittle"><b>Categoría</b></p>
                            <p><?php 
                            $categoria = verCategoria($currentProduct['categoria']);
                            echo $categoria['nombre_categoria'];
                            ?></p>
                        </div>
                        <div class="userProf-div-btn">
                        </div>
                    </div>
                    <div class="productProf-div">
                        <div class="productProf-div-img-div">
                            <img class="productProf-div-img" src="../../imgs/username.png" alt="Vendedor" />
                        </div>
                        <div class="productProf-div-info">
                            <p class="userProf-div-tittle"><b>Vendedor</b></p>
                            <p><?php echo $currentPropietario['username'];?></p>
                        </div>
                        <div class="userProf-div-btn">
                        </div>
                    </div>
                    <div class="productProf-div">
                        <div class="productProf-div-img-div">
                            <img class="productProf-div-img"
                                src="../../imgs/price-tag.png"
                                alt="Precio"
                            />
                        </div>
                        <div class="productProf-div-info">
                            <p class="userProf-div-tittle">
                                <b>Precio</b>
                            </p>
                            <p><?php echo $currentProduct['precio'];?> €</p>
                        </div>
                        <?php
                            if($currentProduct['enventa'] == 1) {?>
                                <div class="userProf-div-btn" id="userProf-div-btn">
                                    <a id="add-user" id="buy-product" class="boton" <?php echo 'href="./comprar-producto.php?id_producto='.$currentProduct['id_producto'].'"'; ?>>
                                        <img src="../../imgs/add-product.png" alt="Comprar" id="adduser-img">
                                        Comprar
                                    </a>
                                </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="div-button">
            <div class="userProf-div-btn" id="userProf-div-btn">
                <a class="boton" href='<?php echo $_SERVER['HTTP_REFERER']?>'>Volver</a>
            </div>
        </div>
    </main>
</body>
</html>