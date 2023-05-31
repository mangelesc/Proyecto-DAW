<?php
	define ('SERVER', 'localhost');
	define ('USER', 'Your_User_Here');
	define ('PASS', 'Your_PassWord_Here');
	define ('DB', 'Your_DB_Here');

	$con = mysqli_connect(SERVER, USER, PASS, DB) or die ("Error al conectar con la base de datos");

	function cerrarConexion(){
		mysqli_close($GLOBALS["con"]);
	}
?>