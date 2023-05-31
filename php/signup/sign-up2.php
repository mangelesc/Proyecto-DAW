<?php
session_start();
require_once ("../../database/connect-db.php");
require_once("../../database/users-db.php");
$page = $_SERVER['HTTP_REFERER'];

if(isset($_POST['new-user'])){
    if( empty($_POST['user-new']) || empty($_POST['email-new']) || empty($_POST['password-new']) || 
        empty($_POST['email-new'])|| empty($_POST['nombre-new']) || empty($_POST['priapellido-new'])|| 
        empty($_POST['segapellido-new']) || !isset($_POST['tipo_usuario-new'])){
        echo "<script type='text/javascript'>alert('Debes rellenar todos los campos para crear un nuevo usuario');</script>";
        header("Refresh:0; url=$page");
    }
    else{
        try{
            crearUsuario(trim($_POST['user-new']), trim($_POST['email-new']), trim($_POST['password-new']), 1, 
            trim($_POST['nombre-new']), trim($_POST['priapellido-new']), trim($_POST['segapellido-new']));
            echo "<script type='text/javascript'>alert('Usuario añadido correctamente');</script>";
            try{
                $resultado = login($_POST['email-new'], $_POST['password-new']);
                $_SESSION['id_usuario'] = $resultado['id_usuario'];
                $_SESSION['user'] = $resultado['nombre'];
                $_SESSION['email'] = $resultado['email'];
                $_SESSION['tipo_usuario'] = $resultado['tipo_usuario'];
            }catch (Exception $e){
                echo "<script type='text/javascript'>alert('Ha habido un error, no se ha podido añadir el nuevo usuario. Inténtalo de nuevo');</script>";
                header("Refresh:0; url=$page");
            }
            header("Location: ../productos/home.php");
        } catch (Exception $e){
        echo "<script type='text/javascript'>alert('Ha habido un error, no se ha podido añadir el nuevo usuario. Inténtalo de nuevo');</script>";
        header("Refresh:0; url=$page");
        }
        
    }
} else {
    echo "<script type='text/javascript'>alert('Ha habido un error, no se ha podido añadir el nuevo usuario. Inténtalo de nuevo');</script>";
    header("Refresh:0; url=$page");
}

?>