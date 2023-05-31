<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../../styles/log-in.css" />
        <link rel="stylesheet" href="../../../styles/navbar.css" />
        <link rel="stylesheet" href="../../../styles/navbar-user.css" />
        <link rel="stylesheet" href="../../../styles/admin-panel.css" />
        <link rel="stylesheet" href="../../../styles/utils.css" />
        <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
        <title>Mis productos</title>
    </head>
    <body>
        <?php
        require_once ("../../../vistas/navbar.php");
        require_once ("../../../vistas/navbar-user.php");
        ?>
        <main id="main-doc">
            <div class="user-main">
                <h1>Mis productos</h1>
                <a id="add-user" class="boton" href="./crear-misProductos.php" id="adduser">
                    <img src="../../../imgs/add-product.png" alt="Add user" id="adduser-img">
                    Crear producto
                </a>
            </div>
            <div>
                <table class="admin-table">
                    <tr>
                        <th class="th">Nombre</th>
                        <th class="th">Estado</th>
                        <th class="th">Categoría</th>
                        <th class="th">En venta</th>
                        <th class="th">Comprador</th>
                        <th class="th">Ver producto</th>
                        <th class="th tr-icons" >Modificar</th>
                        <th class="th tr-icons">Eliminar</th>
                    </tr>
                <?php

                foreach($productos as $producto){
                    $categoria = verCategoria($producto['categoria']);

                    echo "<tr>
                            <td>".$producto['nombre_producto']."</td>";
                            switch($producto['estado']){
                                case 1:
                                    echo "<td>Nuevo</td>";
                                    break;
                                case 2:
                                    echo "<td>Semi nuevo</td>";
                                    break;
                                case 3:
                                    echo "<td>En buen estado</td>";
                                    break;
                                case 4:
                                    echo "<td>En condiciones aceptables</td>";
                                    break;
                                case 5:
                                    echo "<td>Necesita reparación</td>";
                                    break;
                            }
                            echo "
                            <td>". $categoria['nombre_categoria'] ."</td>";
                            if ($producto['enventa'] == true){
                                echo "<td>Sí</td>";
                            }
                            else{
                                echo "<td>No</td>";
                            }
                            echo "
                            <td>".$producto['comprador']."</td>
                            <td>
                                <a
                                    href='../../productos/detalle-producto.php?id_producto=".$producto['id_producto']."'>
                                    <img src='../../../imgs/moreinfo.png' alt='Más información producto' class='user-tools'>
                                </a
                            </td>
                            <td>
                                <a
                                    href='./modificar-misProductos.php?id_producto=".$producto['id_producto']."'>
                                    <img src='../../../imgs/edit.png' alt='Editar producto' class='user-tools'>
                                </a
                            </td>
                            <td>";
                                    if ($producto['enventa']== true) {
                                        echo "
                                            <a 
                                                onClick=\"javascript: return confirm('¿Seguro que quieres borrar este producto?');\"
                                                href='../../admin/productos//borrar_producto.php?id_producto=".$producto['id_producto']."";
                                    }else {
                                        echo "
                                            <a 
                                                onClick=\"javascript: alert('Lo sentimos, no puedes eliminar un producto vendido');\"
                                                href='#";
                                    }
                                    echo "
                                    '>
                                    <img src='../../../imgs/delete.png' alt='Eliminar Producto' class='user-tools'>
                                </a
                            </td>
                    </tr>";
                }
                ?>
                </table>
            </div>
            <?php
            require_once ("../../../vistas/utils/paginacion.php");
            ?>
            <div class="div-button">
                <div class="admin-button">
                    <a href='../../productos/home.php'>Inicio</a>
                </div>
            </div>
        </main>
    </body>
</html>