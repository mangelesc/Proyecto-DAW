<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../../../styles/log-in.css" />
        <link rel="stylesheet" href="../../../styles/navbar.css" />
        <link rel="stylesheet" href="../../../styles/admin-panel.css" />
        <link rel="stylesheet" href="../../../styles/utils.css"/>
        <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
        <title>Gestión Usuarios</title>
    </head>
    <body>
        <?php
            require_once ("../../../vistas/navbar.php");
        ?>
        <main>
            <div class="user-main">
                <h1>Administrar usuarios</h1>
                <a id="add-user" class="boton" href="./crear_usuario.php" id="adduser">
                    <img src="../../../imgs/add-user.png" alt="Add user" id="adduser-img">
                    Crear usuario
                </a>
            </div>
            <div>
                <table class="admin-table">
                    <tr>
                        <th class="th">Id</th>
                        <th class="th">Username</th>
                        <th class="th">Nombre</th>
                        <th class="th">Email</th>
                        <th class="th">Rol</th>
                        <th class="th tr-icons" >Detalles</th>
                        <th class="th tr-icons" >Modificar</th>
                        <th class="th tr-icons">Eliminar</th>
                    </tr>
                <?php
                foreach($usuarios as $usuario){
                    echo "<tr>
                            <td>".$usuario['id_usuario']."</td>
                            <td>".$usuario['username']."</td>
                            <td>".$usuario['nombre'].' '. $usuario['apellido1']. "</td>
                            <td>".$usuario['email']."</td>";
                            if ($usuario['tipo_usuario'] == 0){
                                echo "<td>Admin</td>";
                            }
                            else{
                                echo "<td>User</td>";
                            }
                            echo "
                            <td class='td-icon'>
                                <a
                                    href='../../profile/mi-perfil/my-profile.php?id_usuario=".$usuario['id_usuario']."'>
                                    <img src='../../../imgs/moreinfo.png' alt='Detalles de usuario' class='user-tools'>
                                </a
                            </td>
                            <td class='td-icon'>
                                <a
                                    href='./modificar_usuario.php?id_usuario=".$usuario['id_usuario']."'>
                                    <img src='../../../imgs/edit.png' alt='Editar usuario' class='user-tools'>
                                </a
                            </td>
                            <td class='td-icon'>
                                <a onClick=\"javascript: return confirm('¿Seguro que quieres borrar este usuario?');\"
                                    href='./borrar_usuario.php?id_usuario=".$usuario['id_usuario']."'>
                                    <img src='../../../imgs/delete.png' alt='Eliminar usuario' class='user-tools'>
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
                    <a href='../admin.php'>Volver</a>
                </div>
            </div>
        </main>
    </body>
</html>