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
            <h1 class="tittle-h1">Añadir Productos</h1>
        </div>
        <div class="admin-form-div">
            <form action= "./crear_producto2.php" method='post' class="admin-form" enctype="multipart/form-data"> 
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Nombre del producto*</label>
                        <input
                            type="text"
                            minlength="1"
                            maxlength="70"
                            name="product-nombre-add"
                            required
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Descripción del producto*</label>
                        <textarea 
                            name="product-descripcion-add"
                            minlength="1"
                            maxlength="350"
                            placeholder= "Al menos 40 caracteres y máximo 350 caracteres"
                            rows="3"
                            spellcheck="true"></textarea>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Categoría*</label>
                        <select name="product-categoria-add" id="product-categoria-add">
                            <?php
                            foreach($categorias_add as $categoria)
                                echo "<option value=".$categoria['id_categoria'].">".$categoria['nombre_categoria']."</option>";
                            ?>
                        </select>
                    </div>
                    <div class="formSection">
                        <label>Estado*</label>
                        <select name="product-estado-add" id="product-categoria-add" required>
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
                        <label>Precio €*</label>
                            <input 
                                type="number" 
                                name="product-precio-add" 
                                required/>
                    </div>
                    <div class="formSection">
                        <label>¿Está en venta?*</label>
                        <div>
                            <input 
                                type="radio" 
                                id="true" 
                                name="product-enventa-add" 
                                value="1" />
                            <label for="admin">En venta</label>
                        </div>
                        <div>
                            <input 
                                type="radio" 
                                id="false" 
                                name="product-enventa-add" 
                                value="0" />
                            <label for="admin">Vendido</label>
                        </div>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Id del vendedor*</label>
                        <input
                            type="number"
                            name="product-propietario-add"
                            required
                        />
                    </div>
                    <div class="formSection">
                        <label>Id Comprador (Productos vendidos)</label>
                        <input
                            type="number"
                            name="product-comprador-add"
                            default= 0
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Fecha de creación*</label>
                        <input
                            type="date"
                            name="product-fecha-add"
                            required
                        />
                    </div>
                    <div class="formSection">
                        <label for="">Adjuntar Imágen</label>
                        <input
                            type="file"
                            name="product-imagen-add"
                        />
                    </div>
                </div>
                <div class="formSection-btn">
                    <input class="admin-button" name="add-product" type="submit" value="Crear">
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