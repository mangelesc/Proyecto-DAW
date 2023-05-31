<?php
    //Iniciamos sesión
    session_start();

    require_once("../user-control/user-control.php");
    $locationUser = "../productos/home.php";
    userControl($locationUser);


    require_once ("../../database/connect-db.php");
    require_once("../../database/users-db.php");
    
    $imgLogo = "../../imgs/logo.png";
    $urlHome = "../productos/home.php";
    $urlAdminPanel = "./admin.php";
    $urlMyProducts = "../mis-productos/ver-misProductos.php";
    $urlProfile = "../profile/mi-perfil/my-profile.php";
    $urlSignout = "../signout/cerrar_sesion.php";
    $urlLogin = "../../index.php";
    $urlSignUp = "../signup/sign-up.php";

    require_once("../../vistas/sign-up.php");
?>