<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="./styles/log-in.css" />
        <link rel="stylesheet" href="./styles/navbar.css" />
        <link rel="stylesheet" href="./styles/modal-window.css" />
        <title>Log in</title>
    </head>
    <body>
        <?php
        require_once ("./vistas/navbar.php");
        ?>
        <main id="main">
            <div id="form-full-section">
                <div id="leftSection">
                    <div id="logo" class=rightSection-div">
                        <h1>WallaMerch</h1>
                    </div>
                    <div id="info" class=rightSection-div">
                        <p>Inicia sesión en tu cuenta</p>
                    </div>
                    <div id="form" class=rightSection-div">
                        <form action="./php/login/login.php" method="post">
                            <div class="formSection">
                                <label for="email">Email address</label>
                                <input
                                    type="text"
                                    placeholder="myemail@mail.com"
                                    name="email"
                                    pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                                    required
                                />
                            </div>
                            <div class="formSection">
                                <label for="password">Password</label>
                                <input type="password" placeholder=" MyPassW0rd " name="password" required />
                            </div>
                            <div class="formSection">
                                <input id="login-submit" type="submit" value="Entrar">
                            </div>
                        </form>
                        <div id="change" class="formSection">
                            <p>
                                ¿Aún no eres miembro?
                                <a href="./php/signup/sign-up.php">Crea una cuenta</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div id="rightSection">
                    <img src="./imgs/img-form.jpg" alt="">
                </div>
            </div>
        <div id="divBtnHelp">
            <button
                id="btnHelp"
                class="btn btn-outline-light"
                data-bs-toggle="modal"
                data-bs-target="#infoModal"
            >
                <img id="imgHelp"src="./imgs/help.png">
            </button>
        </div>
        <div
            class="modal fade"
            id="infoModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">
                            ¿Como inicio sesión?
                        </h4>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <h5><b>Como Usuario</b></h6>
                        <p> Puedes crear un nuevo usuario <a id="sign-up"href="./php/signup/sign-up.php">aquí</a> o bien puedes usar uno de los usuarios creados previamente en la BBDD como: </p> 
                        </p>
                        <p>Username: <b>user1@user.com</b></p>
                        <p>Password: <b>1234</b></p>
                        <br>
                        <h5><b>Como Administrador</b></h5>
                        <p>Puedes usar unos de los usuarios de prueba, como: </p>
                        <p>Username: <b>adm1@admin.com</b></p>
                        <p>Password: <b>1234</b></p>
                        <br>
                        <h5><b>Infomación importante</b></h5>
                        <p>Recuerda que para iniciar el proyecto en local, necesitas tener un servidor <b>Apache</b>, PHP y una base de datos <b>MySQL</b> instalados en el equipo, e inciciar la BBDD, 
                            el archivo de inicio se encuentra dentro del proyecto con el nombre <b>bbdd_proyecto.sql</b>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </main>
        <footer id="footer">
            <h3 >Mª Ángeles Córdoba</h3>
        </footer>
    </body>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"
></script>
</html>
