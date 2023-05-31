<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../styles/log-in.css" />
        <link rel="stylesheet" href="../../styles/navbar.css" />
        <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
        <title>Log in</title>
    </head>
    <body>
        <?php
        require_once ("../../vistas/navbar.php");
        ?>
        <main id="main">
            <div id="form-full-section">
                <div id="leftSection">
                    <div id="logo" class=rightSection-div">
                        <h1>WallaMerch</h1>
                    </div>
                    <div id="info" class=rightSection-div">
                        <p>Crea una nueva cuenta</p>
                    </div>
                    <div id="form" class=rightSection-div">
                        <form action="./sign-up2.php" method="post">
                            <div class="formSection">
                                <label for="user-new">Username</label>
                                <input
                                    type="text"
                                    placeholder="myUsername"
                                    name="user-new"
                                    required
                                />
                            </div>
                            <div class="formSection">
                                <label for="email-new">Email address</label>
                                <input
                                    type="text"
                                    placeholder="myemail@grupo05.com"
                                    pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                                    name="email-new"
                                    required
                                />
                            </div>
                            <div class="formSection">
                                <label for="password-new">Password</label>
                                <input 
                                    type="password" 
                                    placeholder="MyPassW0rd" 
                                    name="password-new" 
                                    required />
                            </div>
                            <div class="formSection">
                                <label for="nombre-new">Nombre</label>
                                <input 
                                    type="text" 
                                    placeholder="Nombre" 
                                    name="nombre-new" 
                                    required />
                            </div>
                            <div class="formSection">
                                <label for="priapellido-new">Primer Apellido</label>
                                <input 
                                    type="text" 
                                    placeholder="Primer Apellido" 
                                    name="priapellido-new" 
                                    required />
                            </div>
                            <div class="formSection">
                                <label for="segapellido-new">Segundo Apellido</label>
                                <input 
                                    type="text" 
                                    placeholder="Segundo Apellido" 
                                    name="segapellido-new" 
                                    required />
                            </div>
                            <div class="formSection">
                                <div>
                                    <input type="radio" id="user" name="tipo_usuario-new" value="1" required/>
                                    <label for="admin">
                                        He leído y acepto 
                                            <a href="#" 
                                            onClick="alert('A través de este sitio web no se recaban datos de carácter personal de las personas usuarias sin su conocimiento, ni se ceden a terceros. Los datos personales proporcionados se conservarán durante el tiempo necesario para cumplir con la finalidad para la que se recaban y para determinar las posibles responsabilidades que se pudieran derivar de la finalidad, además de los períodos establecidos en la normativa de archivos y documentación. ')">
                                            la Política de Privacidad
                                            </a>
                                    </label>
                                </div>
                            </div>
                            <div class="formSection">
                                <input id="signup-submit" type="submit" name="new-user" value="Registrarme">
                            </div>
                        </form>
                        <div id="change" class="formSection">
                            <p>
                                ¿Ya eres miembro?
                                <a href="../../index.php">Inicia sesión</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div id="rightSection">
                    <img src="../../imgs/img-form.jpg" alt="Registro de usuario">
                </div>
            </div>
        </main>
        <footer id="footer">
            <h3 >Mª Ángeles Córdoba</h3>
        </footer>
    </body>
</html>