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
    <title>Añadir Producto</title>
</head>
<body>
    <?php
        require_once ("../../../vistas/navbar.php");
    ?>
    <main>
        <div class="main">
        <div class="user-main">
            <h1 class="tittle-h1">Modificar Producto id #<?php echo $currentProduct['id_producto'];?></h1>
        </div>
        <div class="admin-form-div">
            <form action= "./modificar_producto2.php?id_producto=<?php echo $currentProduct['id_producto'];?>" method='post' enctype="multipart/form-data" class="admin-form"> 
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
                            value="<?php echo $currentProduct['nombre_producto'];?>"
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
                            spellcheck="true"
                            ></textarea>
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
                            foreach($categorias as $categoria){?>
                                <option value=
                                <?php echo $categoria['id_categoria'] ?> 
                                <?php
                                if ($currentProduct['categoria'] == $categoria['id_categoria']){
                                    echo "selected";
                                }
                                ?>>
                                <?php echo $categoria['nombre_categoria']?></option>";
                            <?php } ?>
                        </select>
                    </div>
                    <div class="formSection">
                        <label>Estado</label>
                        <p class="productDetail"><?php 
                            switch($currentProduct['estado']){
                                case '1':
                                    echo 'Nuevo';
                                    break;
                                case '2':
                                    echo 'Semi nuevo';
                                    break;
                                case '3':
                                    echo 'En buen estado';
                                    break;
                                case '4':
                                    echo 'En condiciones aceptables';
                                    break;
                                case '5':
                                    echo 'Necesita reparación';
                                    break;
                            }
                        ?> </p>
                        <p><?php $currentProduct['estado'] 
                                ?></p>
                        <label class="smallLabel">Modificar:</label>
                        <select name="product-estado-modify" id="product-categoria-modify">
                            <option value="1"  
                                <?php
                                if ($currentProduct['estado'] == '1'){
                                    echo "selected";
                                }
                                ?>>Nuevo</option>
                            <option value="2" <?php
                                if ($currentProduct['estado'] == '2'){
                                    echo "selected";
                                }
                                ?>>Semi nuevo</option>
                            <option value="3" <?php
                                if ($currentProduct['estado'] == '3'){
                                    echo "selected";
                                }
                                ?>>En buen estado</option>
                            <option value="4" <?php
                                if ($currentProduct['estado'] == '4'){
                                    echo "selected";
                                }
                                ?>>En condiciones aceptables</option>
                            <option value="5" <?php
                                if ($currentProduct['estado'] == '5'){
                                    echo "selected";
                                }
                                ?>>Necesita reparación</option>
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
                                value="<?php echo $currentProduct['precio'];?>"
                                
                            />
                    </div>
                    <div class="formSection">
                        <label>¿Está en venta?</label>
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
                        <label class="smallLabel">Modificar:</label>
                        <div>
                            <input 
                                type="radio" 
                                id="true" 
                                name="product-enventa-modify" 
                                value="1" 
                                <?php
                                if ($currentProduct['enventa'] == 1){
                                    echo "checked";
                                }
                                ?>/>
                            <label for="admin">En venta</label>
                        </div>
                        <div>
                            <input 
                                type="radio" 
                                id="false" 
                                name="product-enventa-modify" 
                                value="0"  
                                <?php
                                if ($currentProduct['enventa'] == 0){
                                    echo "checked";
                                }
                                ?> />
                            <label for="admin">Vendido</label>
                        </div>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Id del vendedor</label>
                        <p class="productDetail"><?php echo $currentProduct['propietario'];?></p>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="number"
                            name="product-propietario-modify"
                            placeholder="Nuevo vendedor"
                            min="1"
                            value="<?php echo $currentProduct['propietario'];?>"
                        />
                    </div>
                    <div class="formSection">
                        <label>Id Comprador (Productos vendidos)</label>
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
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="number"
                            name="product-comprador-modify"
                            placeholder="Nuevo comprador"
                            min="1"
                            value="<?php echo $currentProduct['comprador'];?>"
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Fecha de creación:</label>
                        <p class="productDetail"><?php echo $currentProduct['fecha'];?></p>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="date"
                            name="product-fecha-modify"
                            required pattern="\d{4}-\d{2}-\d{2}"
                            value="<?php echo $currentProduct['fecha'];?>"
                        />
                    </div>
                    <div class="formSection">
                        <label for="">Modificar imágen</label>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="file"
                            name="product-imagen-modify"
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
                <a href='./admin-productos.php'>Volver</a>
            </div>
        </div>
    </main>
</body>
</html>