<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../../styles/log-in.css" />
        <link rel="stylesheet" href="../../../styles/navbar.css" />
        <link rel="stylesheet" href="../../../styles/admin-panel.css" />
        <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <title>Modificar <?php echo $currentProduct['nombre_producto'];?></title>
</head>
<body>
    <?php
        require_once ("../../../vistas/navbar.php");
    ?>
    <main>
        <div class="main">
        <div class="user-main">
            <h1 class="tittle-h1">Modificar Producto</h1>
        </div>
        <div class="admin-form-div">
            <form action= "./modificar-misProductos2.php?id_producto=<?php echo $currentProduct['id_producto'];?>" method='post' enctype="multipart/form-data" class="admin-form"> 
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Nombre del producto</label>
                        <p class="productDetail-full"><?php echo $currentProduct['nombre_producto'];?></p>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="text"
                            minlength="1"
                            maxlength="70"
                            name="product-nombre-modify"
                            placeholder="Nuevo nombre"
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Descripción del producto</label>
                        <p class="productDetail-full"><?php echo $currentProduct['descripcion'];?></p>
                        <label class="smallLabel">Modificar:</label>
                        <textarea 
                            name="product-descripcion-modify"
                            minlength="1"
                            maxlength="350"
                            placeholder= "Al menos 40 caracteres y máximo 350 caracteres"
                            rows="3"
                            spellcheck="true"></textarea>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Categoría</label>
                        <p class="productDetail"><?php 
                            $categoria = verCategoria($currentProduct['categoria']);
                            echo $categoria['nombre_categoria'];
                        ?> </p>
                        <label class="smallLabel">Modificar:</label>
                        <select name="product-categoria-modify" id="product-categoria-modify">
                            <?php
                            foreach($categorias as $categoria)
                                echo "<option value=".$categoria['id_categoria'].">".$categoria['nombre_categoria']."</option>";
                            ?>
                        </select>
                    </div>
                    <div class="formSection">
                        <label>Estado</label>
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
                        <label class="smallLabel">Modificar:</label>
                        <select name="product-estado-modify" id="product-categoria-modify">
                            <option value="1">Nuevo</option>
                            <option value="2">Semi nuevo</option>
                            <option value="3">En buen estado</option>
                            <option value="4">En condiciones aceptables</option>
                            <option value="5">Necesita reparación</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-column">
                    <div class="formSection">
                        <label>Precio</label>
                        <p class="productDetail"><?php echo $currentProduct['precio'];?> € </p>
                        <label class="smallLabel">Modificar:</label>
                            <input 
                                type="number" 
                                name="product-precio-modify" 
                                placeholder="Nuevo precio"
                            />
                    </div>
                    <div class="formSection">
                        <label for="">Modificar Imágen</label>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="file"
                            name="myproducts-imagen-modify"
                        />
                    </div>
                </div>
                <div class="formSection-btn">
                    <input class="admin-button" name="modify-product" type="submit" value="Modificar">
                </div>
            </form>
        </div>
        </div>
        <div class="div-button">
            <div class="admin-button">
                <a href='./ver-misProductos.php'>Volver</a>
            </div>
        </div>
    </main>
</body>
</html>