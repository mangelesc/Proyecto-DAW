<?php

session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
adminControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/users-db.php");

if(isset($_POST['add-user'])){
    $page = $_SERVER['HTTP_REFERER'];

    if(empty($_POST['user-add']) || empty($_POST['email-add']) ||empty($_POST['password-add']) 
    || empty($_POST['email-add']) || empty($_POST['nombre-add']) || empty($_POST['apellido1-add']) || empty($_POST['apellido2-add'])){
        echo "<script type='text/javascript'>alert('Debes rellenar todos los campos para crear un nuevo usuario');</script>";
        header("Refresh:0; url=$page");
    }
    else{
        try{
            crearUsuario(trim($_POST['user-add']), trim($_POST['email-add']), trim($_POST['password-add']), trim($_POST['tipo_usuario-add']), trim($_POST['nombre-add']), trim($_POST['apellido1-add']),trim($_POST['apellido2-add']),);
            echo "<script type='text/javascript'>alert('Usuario añadido correctamente');</script>";
            header("Refresh:0; url=./admin-usuarios.php");
        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, no se ha podido añadir el nuevo usuario. Inténtalo de nuevo');</script>";
        }
        header("Refresh:0; url=$page");
    }
} else {
    header("Refresh:0; url=$page");
}

cerrarConexion();

?>