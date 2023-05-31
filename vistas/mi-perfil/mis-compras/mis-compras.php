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
        <title>Mis compras</title>
    </head>
    <body>
        <?php
        require_once ("../../../vistas/navbar.php");
        require_once ("../../../vistas/navbar-user.php");
        ?>
        <main id="main-doc">
            <div class="user-main">
                <h1>Mis compras</h1>
            </div>
            <div>
                <table class="admin-table">
                    <tr>
                        <th class="th">Nombre</th>
                        <th class="th">Código de venta</th>
                        <th class="th">Fecha venta</th>
                        <th class="th">Vendedor</th>
                        <th class="th">Ver producto</th>
                        <th class="th tr-icons">Cancelar</th>
                    </tr>
                <?php

                foreach($productos as $producto){
                    $propietario = verUsuario($producto['propietario']);

                    echo "<tr>
                            <td>".$producto['nombre_producto']."</td>
                            <td>". $producto['codigoVenta'] ."</td>
                            <td>". $producto['fechaVenta'] ."</td>
                            <td>".$propietario['username']."</td>
                            <td>
                                <a
                                    href='../../productos/detalle-producto.php?id_producto=".$producto['id_producto']."'>
                                    <img src='../../../imgs/moreinfo.png' alt='Más información producto' class='user-tools'>
                                </a
                            </td>
                            </td>
                            <td>
                                <a onClick=\"javascript: return confirm('¿Seguro que quieres cancelar la compra de este producto?');\"
                                    href='#'>
                                    <img src='../../../imgs/delete.png' alt='Cancelar Producto' class='user-tools'>
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