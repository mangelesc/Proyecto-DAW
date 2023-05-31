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
    <title>Añadir usuario</title>
</head>
<body>
    <?php
        require_once ("../../../vistas/navbar.php");
    ?>
    <main>
        <div class="main">
        <div class="user-main">
            <h1 class="tittle-h1">Añadir usuarios</h1>
        </div>
        <div class="admin-form-div">
            <form action= "./crear_usuario2.php" method='post' class="admin-form"> 
                <div class="form-column">
                    <div class="formSection">
                        <label for="">Username</label>
                        <input
                            type="text"
                            name="user-add"
                            placeholder="MyUserName" 
                            required
                        />
                    </div>
                    <div class="formSection">
                        <label for="">Nombre</label>
                        <input
                            type="text"
                            name="nombre-add"
                            placeholder="Nombre" 
                            required
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label for="">Primer Apellido</label>
                        <input
                            type="text"
                            name="apellido1-add"
                            placeholder="Primer apellido" 
                            required
                        />
                    </div>
                    <div class="formSection">
                        <label for="">Segundo Apellido</label>
                        <input
                            type="text"
                            name="apellido2-add"
                            placeholder="Segundo Apellido" 
                            required
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection-full">
                        <label for="">Email address</label>
                        <input
                            type="text"
                            name="email-add"
                            pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                            placeholder="myemail@mail.com" 
                            required
                        />
                    </div>
                </div>
                <div class="form-column">
                    <div class="formSection">
                        <label for="">Password</label>
                        <input 
                            type="password" 
                            placeholder="Password" 
                            name="password-add"
                            required/>
                    </div>
                    <div class="formSection">
                        <p>Rol</p>
                        <div>
                            <input type="radio" id="admin" name="tipo_usuario-add" value=0 />
                            <label for="admin">Administrador</label>
                        </div>
                        <div>
                            <input type="radio" id="user" name="tipo_usuario-add" value=1 checked/>
                            <label for="admin">Usuario</label>
                        </div>
                        
                    </div>
                </div>
                <div class="formSection-btn">
                    <input class="admin-button" name="add-user" type="submit" value="Crear">
                </div>
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