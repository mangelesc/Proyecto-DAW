<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/navbar.css" />
    <link rel="stylesheet" href="../../../styles/navbar-user.css" />
    <link rel="stylesheet" href="../../../styles/tarjetas.css" />
    <link rel="stylesheet" href="../../../styles/admin-panel.css" />
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <title>My Profife</title>
</head>
<body>
    <?php
    require_once ("../../../vistas/navbar.php");
    
    require_once ("../../../vistas/navbar-user.php");
    ?>
    <main id="main-doc">

    
        <div class="UserProfile-box">
            <div class="UserProfile-left">
                <img
                    src="../../../imgs/img-form.jpg"
                    alt="My Profile"
                    id="UserProfile-img"
                />
            </div>
            <div class="UserProfile-right">
                <div class="userProf-tbody">
                    <div class="userProf-header">
                        <h2 id="gretting">Mis direcciones</h2>
                    </div>

                    <?php 
                    $n = 1;
                    foreach($currentUserAddress as $address) { ?>
                        <div class="userProf-div">
                            <div class="userProf-div-img-div">
                                <img class="userProf-div-img" src="../../../imgs/address.png" alt="Dirección" />
                            </div>
                            <div class="userProf-div-info">
                                <p class="userProf-div-tittle"><b>Dirección #<?php echo $n?></b></p>
                                <p>
                                    <?php 
                                    if (isset($address['calle'])){
                                        echo $address['calle'];
                                    }
                                    echo ', nº ';
                                    if (isset($address['numero'])){
                                        echo $address['numero'];
                                    }
                                    echo ',  ';
                                    if (isset($address['piso'])){
                                        echo $address['piso'];
                                    }
                                    echo ' ';
                                    if (isset($address['letra'])){
                                        echo $address['letra'];
                                    }
                                    ?>
                                </p>
                                <p>
                                    <?php 
                                    if (isset($address['codigoPostal'])){
                                        echo $address['codigoPostal'];
                                    }
                                    ?> 
                                </p>
                                <p>
                                    <?php 
                                        if (isset($address['ciudad'])){
                                        echo $address['ciudad'];
                                    }
                                    ?> 
                                </p>
                            </div>
                            <div class="userProf-div-btn">
                                <?php echo "
                                <a class='btn-delete' onClick=\"javascript: return confirm('¿Seguro que quieres borrar esta dirección?');\"
                                    href='./eliminar-direccion.php?id_direccion=".$address['id_direccion']."&id_usuario=".$_SESSION['id_usuario']."'>
                                    Borrar
                                </a>
                                "?>
                            </div>
                        </div>
                        
                    <?php 
                    $n += 1; 
                    } 
                    ?>
                    <div class="userProf-div">
                        <h2>Añadir direcciones</h2>
                    </div>
                
            
                    <!-- Añadir dirección -->
                    <div>
                        <div >
                            <form action= "./crear-direccion.php?id_usuario=
                            <?php 
                            if(isset($_GET['id_usuario'])){
                                echo $_GET['id_usuario'];
                            } else {
                                echo $_SESSION['id_usuario'];
                            }
                            ?>" method='post'> 
                                <div class="form-column">
                                    <div class="formSection">
                                        <label>Calle: </label>
                                        <input
                                            type="text"
                                            name="calle-edit"
                                            placeholder="Calle"
                                            required 
                                            class="formSection-address"
                                        />
                                    </div>
                                    <div class="formSection">
                                        <label>Número:</label>
                                        <input
                                            type="number"
                                            name="numero-edit"
                                            placeholder="Número"
                                            required 
                                            class="formSection-address"
                                        />
                                    </div>
                                </div>
                                <div class="form-column">
                                    <div class="formSection">
                                        <label>Piso: </label>
                                        <input
                                            type="number"
                                            name="piso-edit"
                                            placeholder="Piso"
                                            class="formSection-address"
                                        />
                                    </div>
                                    <div class="formSection">
                                        <label>Letra:</label>
                                        <input
                                            type="text"
                                            name="letra-edit"
                                            placeholder="Letra"
                                            maxlength="10"
                                            class="formSection-address"
                                        />
                                    </div>
                                </div>
                                <div class="form-column">
                                    <div class="formSection">
                                        <label>Código Postal: </label>
                                        <input
                                            type="text"
                                            name="codigoPostal-edit"
                                            placeholder="Código Postal"
                                            minlength="5"
                                            maxlength="10"
                                            required 
                                            class="formSection-address"
                                        />
                                    </div>
                                    <div class="formSection">
                                        <label>Ciudad:</label>
                                        <input
                                            type="text"
                                            name="ciudad-edit"
                                            placeholder="Ciudad"
                                            required 
                                            class="formSection-address"
                                        />
                                    </div>
                                </div>
                                <div class="formSection-btn">
                                    <input class="admin-button" name="add-address" type="submit" value="Añadir">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>