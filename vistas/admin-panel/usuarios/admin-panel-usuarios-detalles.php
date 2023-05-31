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
    <title>Detalles de usuario</title>
</head>
<body>
    <?php
        require_once ("../../../vistas/navbar.php");
    ?>
    <main>
        <div class="main">
        <div class="user-main">
            <h1 class="tittle-h1">Detalles del usuario <?php echo $currentUser['username'];?></h1>
        </div>
        <div class="admin-form-div">
            <form action= "./crear_producto2.php" method='post' class="admin-form"> 
                <div class="form-column">
                    <h3>Datos personales</h3>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Username: </label>
                        <p class="productDetail"><?php echo $currentUser['username'];?></p>
                    </div>
                    <div class="formSection">
                        <label>Fecha de registro:</label>
                        <p class="productDetail"><?php echo $currentUser['fechaRegistro'];?></p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Nombre completo:</label>
                        <p class="productDetail-full"><?php 
                            if (isset($currentUser['nombre'])){
                                echo $currentUser['nombre'];
                            }
                            echo ' ';
                            if (isset($currentUser['apellido1'])){
                                echo $currentUser['apellido1'];
                            }
                            echo ' ';
                            if (isset($currentUser['apellido2'])){
                                echo $currentUser['apellido2'];
                            }
                            ?></p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Email:</label>
                        <p class="productDetail-full">
                            <?php echo $currentUser['email'];?>
                        </p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Tipo de usuario:</label>
                        <p class="productDetail">
                            <?php 
                                switch($currentUser['tipo_usuario']){
                                    case 0:
                                        echo 'Administrador';
                                        break;
                                    case 1:
                                        echo 'Usuario';
                                        break;
                                    }
                            ?> 
                        </p>
                    </div>
                    <div class="formSection">
                        <label>Id de usuario:</label>
                        <p class="productDetail">
                            <?php echo $currentUser['id_usuario'];?>
                        </p>
                    </div>
                </div>
                
                <?php 
                    $n = 1;
                    foreach($currentUserAddress as $address) { ?>
                    <div class="form-column">
                <h3 style="padding-top: 30px;">Dirección #<?php echo $n?>:</h3>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Dirección:</label>
                        <p class="productDetail-full"><?php 
                            if (isset($address['calle'])){
                                echo $address['calle'];
                            }
                            echo ', número ';
                            if (isset($address['numero'])){
                                echo $address['numero'];
                            }
                            echo ',  ';
                            if (isset($address['piso'])){
                                echo $address['piso'];
                            }
                            echo 'º ';
                            if (isset($address['letra'])){
                                echo $address['letra'];
                            }
                            ?></p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Código Postal:</label>
                        <p class="productDetail">
                            <?php 
                                if (isset($address['codigoPostal'])){
                                echo $address['codigoPostal'];
                            }
                            ?> 
                        </p>
                    </div>
                    <div class="formSection">
                        <label>Ciudad:</label>
                        <p class="productDetail">
                            <?php 
                                if (isset($address['ciudad'])){
                                echo $address['ciudad'];
                            }
                            ?> 
                        </p>
                    </div>
                </div>
                <?php 
                $n += 1; 
                } 
                ?>
                
            </form>
        </div>
        </div>
        <div class="div-button">
            <div class="admin-button">
                <a href='./admin-usuarios.php'>Volver</a>
            </div>
        </div>
    </main>
</body>
</html>