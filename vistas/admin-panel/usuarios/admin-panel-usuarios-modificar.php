<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/navbar.css" />
    <link rel="stylesheet" href="../../../styles/admin-panel.css" />
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <title>Edit user</title>
</head>
<body>
    <?php
        require_once ("../../../vistas/navbar.php");
    ?>
    <main>
        <div class="main">
        <div class="user-main">
            <h1 class="tittle-h1">Modificar usuario <?php echo $currentUser['username']." id # ".$currentUser['id_usuario'];?></h1>
        </div>
        <!-- Modificar Datos personales -->
        <div class="admin-form-div">
            <form action= "./modificar-usuario2.php?id_usuario=<?php echo $currentUser['id_usuario'];?>" method='post' enctype="multipart/form-data" class="admin-form"> 
                <div class="form-column">
                    <h3>Datos personales</h3>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Id Usuario: </label>
                        <p class="productDetail"><?php echo $currentUser['id_usuario'];?></p>
                    </div>
                    <div class="formSection">
                        <label>Fecha de registro:</label>
                        <p class="productDetail"><?php echo $currentUser['fechaRegistro'];?></p>
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Username: </label>
                        <p class="productDetail"><?php echo $currentUser['username'];?></p>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="text"
                            name="user-edit"
                            value="<?php echo $currentUser['username'];?>"
                        />
                    </div>
                    <div class="formSection">
                        <label>Nombre:</label>
                        <p class="productDetail">
                            <?php 
                            if (isset($currentUser['nombre'])){
                                echo $currentUser['nombre'];
                            }?>
                        </p>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="text"
                            name="nombre-edit"
                            value="<?php echo $currentUser['nombre'];?>"
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label>Primer apellido: </label>
                        <p class="productDetail"><?php if (isset($currentUser['apellido1'])){
                                echo $currentUser['apellido1'];
                            }?></p>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="text"
                            name="apellido1-edit"
                            value="<?php echo $currentUser['apellido1'];?>"
                        />
                    </div>
                    <div class="formSection">
                        <label>Segundo apellido:</label>
                        <p class="productDetail"><?php if (isset($currentUser['apellido2'])){
                                echo $currentUser['apellido2'];
                            };?></p>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="text"
                            name="apellido2-edit"
                            value="<?php echo $currentUser['apellido2'];?>"
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label>Email:</label>
                        <p class="productDetail-full"><?php echo $currentUser['email'];?></p>
                        <label class="smallLabel">Modificar:</label>
                        <input
                            type="text"
                            name="email-edit"
                            pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                            value="<?php echo $currentUser['email'];?>"
                        />
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
                        <label class="smallLabel">Modificar:</label>
                        <div>
                            <div>
                                <input type="radio" id="admin" name="tipo_usuario-edit" value="0" 
                                <?php
                                if ($currentUser['tipo_usuario'] == 0){
                                    echo "checked";
                                }
                                ?>
                                />
                                <label for="admin">Administrador</label>
                            </div>
                            <div>
                                <input type="radio" id="user" name="tipo_usuario-edit" value="1" 
                                <?php
                                if ($currentUser['tipo_usuario'] == 1){
                                    echo "checked";
                                }
                                ?>/>
                                <label for="admin">Usuario</label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="formSection">
                        <label>Contraseña:</label>
                        <p class="productDetail">
                            ******
                        </p>
                        <label class="smallLabel">Modificar:</label>
                        <input type="password" placeholder="Password" name="password-edit"/>
                    </div>
                </div>
                
                <div class="formSection-btn">
                    <input class="admin-button" name="edit-user" type="submit" value="Modificar">
                </div>
            </form>
        </div>

        <!-- Modificar direcciones -->
        <?php 
        $n = 1;
        foreach($currentUserAddress as $address) { ?>
            <div class="admin-form-div">
                <form action= "./modificar-usuario2.php?id_direccion=<?php echo $address['id_direccion'];?>" method='post' enctype="multipart/form-data" class="admin-form"> 
                    <div class="form-column">
                        <h3>Dirección #<?php echo $n;?></h3>
                    </div>
                    <div class="form-column">
                        <div class="formSection">
                            <label>Calle: </label>
                            <p class="productDetail"><?php echo $address['calle'];?></p>
                            <label class="smallLabel">Modificar:</label>
                            <input
                                type="text"
                                name="calle-edit"
                                value="<?php echo $address['calle'];?>"
                            />
                        </div>
                        <div class="formSection">
                            <label>Número:</label>
                            <p class="productDetail"><?php echo $address['numero'];?></p>
                            <label class="smallLabel">Modificar:</label>
                            <input
                                type="number"
                                name="numero-edit"
                                value="<?php echo $address['numero'];?>"
                            />
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="formSection">
                            <label>Piso: </label>
                            <p class="productDetail"><?php echo $address['piso'];?></p>
                            <label class="smallLabel">Modificar:</label>
                            <input
                                type="text"
                                name="piso-edit"
                                value="<?php echo $address['piso'];?>"
                            />
                        </div>
                        <div class="formSection">
                            <label>Letra:</label>
                            <p class="productDetail">
                                <?php 
                                if (isset($address['letra'])){
                                    echo $address['letra'];
                                }?>
                            </p>
                            <label class="smallLabel">Modificar:</label>
                            <input
                                type="text"
                                name="letra-edit"
                                value="<?php echo $address['letra'];?>"
                            />
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="formSection">
                            <label>Código Postal: </label>
                            <p class="productDetail"><?php if (isset($address['codigoPostal'])){
                                    echo $address['codigoPostal'];
                                }?></p>
                            <label class="smallLabel">Modificar:</label>
                            <input
                                type="text"
                                name="codigoPostal-edit"
                                value="<?php echo $address['codigoPostal'];?>"
                            />
                        </div>
                        <div class="formSection">
                            <label>Ciudad:</label>
                            <p class="productDetail"><?php if (isset($address['ciudad'])){
                                    echo $address['ciudad'];
                                };?></p>
                            <label class="smallLabel">Modificar:</label>
                            <input
                                type="text"
                                name="ciudad-edit"
                                value="<?php echo $address['ciudad'];?>"
                            />
                        </div>
                    </div>
                    <div class="formSection-btn">
                        <input class="admin-button" name="edit-address" type="submit" value="Modificar">
                    </div>
                </form>
            </div>

        <?php 
        $n += 1; 
        } 
        ?>
        </div>
        <div class="div-button">
            <div class="admin-button">
                <a href='./admin-usuarios.php'>Volver</a>
            </div>
        </div>
    </main>
</body>
</html>