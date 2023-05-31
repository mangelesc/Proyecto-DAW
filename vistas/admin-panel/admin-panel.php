<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../styles/log-in.css" />
        <link rel="stylesheet" href="../../styles/navbar.css" />
        <link rel="stylesheet" href="../../styles/admin-panel.css" />
        <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
        <title>Admin Panel</title>
    </head>
    <body>
        <?php
            require_once ("../../vistas/navbar.php");
        ?>
        <main>
            <div class="main">
                <div class="user-main">
                    <h1 class="tittle-h1">Panel de administración</h1>
                </div>
            </div>
            <div class="admin-main-section">
                <div class="admin-divs-buttons">
                    <a href="./usuarios/admin-usuarios.php">
                        <img src="../../imgs/usuarios.png" alt="Gestión de usuarios">Gestión de usuarios</a>
                </div>
                <div class="admin-divs-buttons">
                    <a href="./productos/admin-productos.php">
                        <img src="../../imgs/productos.png" alt="Gestión de productos">Gestión de productos</a>
                </div>
            </div>
            <div>

        </main>
    </body>
</html>