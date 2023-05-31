<?php
    //Iniciamos sesión
    session_start();

    require_once("./php/user-control/user-control.php");
    $locationUser = "./php/productos/home.php";
    userControl($locationUser);
    
    $imgLogo = "./imgs/logo.png";
    $urlHome = "./php/productos/home.php";
    $urlAdminPanel = "./php/admin/admin.php";
    $urlProfile = "./php/profile/my-profile.php";
    $urlSignout = "./php/signout/cerrar_sesion.php";
    $urlLogin = "./index.php";
    $urlSignUp = "./php/signup/sign-up.php";

    require_once("./vistas/log-in.php");
?>