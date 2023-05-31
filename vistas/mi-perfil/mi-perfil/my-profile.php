<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/navbar.css" />
    <link rel="stylesheet" href="../../../styles/navbar-user.css" />
    <link rel="stylesheet" href="../../../styles/tarjetas.css" />
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
                    <h2 id="gretting">Mis datos</h2>
                    </div>
                    <div class="userProf-div">
                        <div class="userProf-div-img-div">
                            <img class="userProf-div-img" src="../../../imgs/username.png" alt="Username" />
                        </div>
                        <div class="userProf-div-info">
                            <p class="userProf-div-tittle"><b>Username</b></p>
                            <p><?php echo $currentUser['username'];?></p>
                        </div>
                        <!-- <div class="userProf-div-btn">
                            <a class='btn' href=''> Cambiar </a>
                        </div> -->
                    </div>
                    <div class="userProf-div">
                        <div class="userProf-div-img-div">
                            <img class="userProf-div-img" src="../../../imgs/email.png" alt="Email" />
                        </div>
                        <div class="userProf-div-info">
                            <p class="userProf-div-tittle"><b>Email</b></p>
                            <p><?php echo $currentUser['email'];?></p>
                        </div>
                        <!-- <div class="userProf-div-btn">
                            <a class='btn' href='#'> Cambiar </a>
                        </div> -->
                    </div>
                    <div class="userProf-div">
                        <div class="userProf-div-img-div">
                            <img class="userProf-div-img" src="../../../imgs/password.png" alt="Password" />
                        </div>
                        <div class="userProf-div-info">
                            <p class="userProf-div-tittle"><b>Password</b></p>
                            <p>*******</p>
                        </div>
                        <!-- <div class="userProf-div-btn">
                            <a class='btn' href='#'> Cambiar </a>
                        </div> -->
                    </div>
                    <div class="userProf-div">
                        <div class="userProf-div-img-div">
                            <img class="userProf-div-img" src="../../../imgs/name.png" alt="Password" />
                        </div>
                        <div class="userProf-div-info">
                            <p class="userProf-div-tittle"><b>Nombre</b></p>
                            <p><?php 
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
                        <!-- <div class="userProf-div-btn">
                            <a class='btn' href=''> Cambiar </a>
                        </div> -->
                    </div>
                    <div class="userProf-div">
                        <div class="userProf-div-img-div">
                            <img class="userProf-div-img"
                                src="../../../imgs/deleleAccount.png"
                                alt="Delete Account"
                            />
                        </div>
                        <div class="userProf-div-info">
                            <p class="userProf-div-tittle">
                                <b>Borrar mi cuenta</b>
                            </p>
                            <p>¿Ya no necesitas un usuario?</p>
                        </div>
                        <div class="userProf-div-btn">
                            <?php echo "
                            <a class='btn-delete' onClick=\"javascript: return confirm('¿Seguro que quieres borrar este usuario?');\"
                                href='../../admin/borrar_usuario.php?id_usuario=".$_SESSION['id_usuario']."'>
                                Borrar
                            </a>
                            "?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>