<?php
session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");

require_once ("../../../database/connect-db.php");
require_once ("../../../database/users-db.php");
$page = $_SERVER['HTTP_REFERER'];

if(isset($_GET['id_usuario'])){
    $id_usuario=$_GET['id_usuario'];
    if($_SESSION['id_usuario']==$_GET['id_usuario']){
        try {
            borrarUsuario($id_usuario);
            echo "<script type='text/javascript'>alert('Cuenta eliminada correctamente');</script>";
            session_destroy(); 
            header("Refresh:0; url=../../../index.php");
        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, el usuario no ha podido ser borrado');</script>";
            header("Refresh:0; url=$page");
        }
    }else{
        $location = "../../../index.php";
        adminControl($location);
        try {
            borrarUsuario($id_usuario);
            echo "<script type='text/javascript'>alert('Usuario borrado correctamente');</script>";
        } catch (Exception $e){
            echo "<script type='text/javascript'>alert('Ha habido un error, el usuario no ha podido ser borrado');</script>";
        }
        header("Refresh:0; url=$page");
    }
}

?>