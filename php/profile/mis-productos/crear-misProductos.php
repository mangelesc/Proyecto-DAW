<?php

session_start();

// Comprobamos el usuario
require_once("../../user-control/user-control.php");
$location = "../../../index.php";
sessionControl($location);

require_once ("../../../database/connect-db.php");
require_once ("../../../database/products-db.php");

$categorias_add = verCategorias();

$imgLogo = "../../../imgs/logo.png";
  $urlHome = "../../productos/home.php";
  $urlAdminPanel = "../../admin/admin.php";
  $urlProfile = "../mi-perfil/my-profile.php";
  $urlSignout = "../../signout/cerrar_sesion.php";
  $urlLogin = "../../../index.php";
  $urlSignUp = "../../signup/sign-up.php";

require_once("../../../vistas/mi-perfil/mis-productos/mis-productos-crear.php");


cerrarConexion();

?>