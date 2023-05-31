<?php

// *******************
// GESTIÓN DE USUARIOS
// *******************
  function login($email, $password){
		  // Utilizamos una sentencia preparada para evitar inyecciones de código
			$query = "SELECT * 
								FROM usuario 
								WHERE email=? AND pass=?";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			// Vinculamos el parámetro de la sentencia preparada con el valor del id que recibimos como parámetro
			mysqli_stmt_bind_param($stmt, "ss", $email, $password);
			// Ejecutamos la sentencia preparada
			mysqli_stmt_execute($stmt);
			// Obtenemos el resultado de la consulta
			$result = mysqli_stmt_get_result($stmt);

			// Comprobamos que el usuario y la contraseña son correctas
			if (mysqli_num_rows($result)==1) {	
					$usuario = mysqli_fetch_array($result);
					return $usuario;
			}else{
					return 0;
			}
	}

	function verUsuarios($limit, $offset){
			$query = "SELECT * 
								FROM usuario 
								ORDER BY nombre ASC 
								LIMIT ? OFFSET ?";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "ii", $limit, $offset);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$usuarios = array();
			while($fila = mysqli_fetch_array($result)){
					$usuarios[] = $fila;
			}
			return $usuarios;
	}

	function conteoUsuarios(){
			$query = "SELECT count(*) AS conteo 
								FROM usuario";
			$result = mysqli_query($GLOBALS["con"], $query);
			$total = mysqli_fetch_array($result);
			return $total['conteo'];
}

	function verUsuario($id_usuario){
			$query = "SELECT * FROM usuario 
								WHERE id_usuario=?";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "i", $id_usuario);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);;
			$usuario = mysqli_fetch_array($result);
			return $usuario;
	}

  function crearUsuario($username,$email, $pass, $tipo_usuario, $nombre=null, $apellido1=null, $apellido2=null){
			$query = "INSERT INTO usuario(username, email, pass, tipo_usuario, nombre, apellido1, apellido2) 
								VALUES(?, ?, ?, ?, ?, ?, ?)";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "sssisss", $username, $email, $pass, $tipo_usuario, $nombre, $apellido1, $apellido2);
			mysqli_stmt_execute($stmt);
	}
	

	function modificarUsuario($id_usuario, $username, $email, $pass, $tipo_usuario, $nombre=null, $apellido1=null, $apellido2=null){
			$query = "UPDATE usuario 
								SET username=?, email=?, pass=?, tipo_usuario=?, nombre=?, apellido1=?, apellido2=? 
								WHERE id_usuario=?";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "sssisssi", $username, $email, $pass, $tipo_usuario, $nombre, $apellido1, $apellido2, $id_usuario);
			mysqli_stmt_execute($stmt);
	}
	
	function borrarUsuario($id_usuario){
			$query = "DELETE FROM usuario 
								WHERE id_usuario=?";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "i", $id_usuario);
			mysqli_stmt_execute($stmt);
	}

// ********************	
// GESTIÓN DE DIRECCIÓN
// ********************
	function crearDireccion($id_usuario, $calle, $numero, $piso, $letra, $codigoPostal, $ciudad){
			$query = "INSERT INTO direccion (id_usuario, calle, numero, piso, letra, codigoPostal, ciudad) 
								VALUES (?,?,?,?,?,?,?);";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "isiisis", $id_usuario,$calle,$numero,$piso,$letra,$codigoPostal,$ciudad);
			mysqli_stmt_execute($stmt);
	}	

	function verDireccion($id_usuario){
			$query = "SELECT * 
								FROM direccion 
								WHERE id_usuario=?";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "i", $id_usuario);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$direcciones = array();
			while($row = mysqli_fetch_array($result)){
				$direcciones[] = $row;
			}
			return $direcciones; 
	}

	function modificarDireccion($id_direccion, $calle, $numero, $piso, $letra, $codigoPostal, $ciudad){
			$query =" UPDATE direccion 
								SET calle=?, numero=?, piso=?, letra=?, codigoPostal=?, ciudad=?
								WHERE id_direccion=?";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "siisisi", $calle, $numero, $piso ,$letra, $codigoPostal, $ciudad, $id_direccion);
			mysqli_stmt_execute($stmt);
	}

	function borrarDireccion($id_direccion){
			$query ="DELETE FROM direccion WHERE id_direccion=?";
			$stmt = mysqli_prepare($GLOBALS["con"], $query);
			mysqli_stmt_bind_param($stmt, "i", $id_direccion);
			mysqli_stmt_execute($stmt);
	}

?>