<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/navbar.css" />
    <link rel="stylesheet" href="../../styles/home.css" />
    <link rel="stylesheet" href="../../styles/productos.css" />
    <link rel="stylesheet" href="../../styles/utils.css" />
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <title>WallaMerch</title>
</head>
<body>
    <?php
        require_once ("../../vistas/navbar.php");
    ?>
    <main>

        <?php
        require_once ("../../vistas/productos/productos-search-options.php");
        ?>
        <div class="slogan-section">
            <h1 id="slogan-section-h1">
                <?php
                echo ucfirst($nombre_categoria), ucfirst($nombre_producto);
                ?>
            </h1>
        </div>
        <div id="margin-body">
            <?php
            if (isset($NoEncontrado)) {
                echo '<p style="text-align: center">'.$NoEncontrado.'</p>';
            } else {
                require_once ("../../vistas/productos/productos-cards.php");
            }
        
            require_once ("../../vistas/utils/paginacion.php");

            require_once ("../../vistas/utils/scroll-up.html");
            ?>

        </div>
    </main>
</body>
</html>