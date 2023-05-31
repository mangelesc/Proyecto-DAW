<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../../styles/log-in.css" />
        <link rel="stylesheet" href="../../../styles/navbar.css" />
        <link rel="stylesheet" href="../../../styles/admin-panel.css"/>
        <link rel="stylesheet" href="../../../styles/utils.css"/>
        <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
        <title>Gestión Productos</title>
    </head>
    <body>
        <?php
        require_once ("../../../vistas/navbar.php");
        ?>
        <main>
            <div class="user-main">
                <h1>Administrar productos</h1>
                <a id="add-user" class="boton" href="./crear_producto.php" id="adduser">
                    <img src="../../../imgs/add-product.png" alt="Add user" id="adduser-img">
                    Crear producto
                </a>
            </div>
            <div>
                <table class="admin-table">
                    <tr>
                        <th class="th">Id</th>
                        <th class="th">Nombre</th>
                        <th class="th">Id propietario</th>
                        <th class="th">En venta</th>
                        <th class="th">Más info</th>
                        <th class="th tr-icons" >Modificar</th>
                        <th class="th tr-icons">Eliminar</th>
                    </tr>
                <?php
                foreach($productos as $producto){
                    echo "<tr>
                            <td>".$producto['id_producto']."</td>
                            <td>".$producto['nombre_producto']."</td>
                            <td>".$producto['propietario']."</td>";
                            if ($producto['enventa'] == true){
                                echo "<td>Sí</td>";
                            }
                            else{
                                echo "<td>No</td>";
                            }
                            echo "
                            <td>
                                <a
                                    href='./info_producto.php?id_producto=".$producto['id_producto']."'>
                                    <img src='../../../imgs/moreinfo.png' alt='Más información producto' class='user-tools'>
                                </a
                            </td>
                            <td>
                                <a
                                    href='./modificar_producto.php?id_producto=".$producto['id_producto']."'>
                                    <img src='../../../imgs/edit.png' alt='Editar producto' class='user-tools'>
                                </a
                            </td>
                            <td>
                                <a onClick=\"javascript: return confirm('¿Seguro que quieres borrar este producto?');\"
                                    href='./borrar_producto.php?id_producto=".$producto['id_producto']."'>
                                    <img src='../../../imgs/delete.png' alt='Eliminar producto' class='user-tools'>
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
                    <a href='../admin.php'>Volver</a>
                </div>
            </div>
        </main>
    </body>
</html>