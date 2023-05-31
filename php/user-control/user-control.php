<?php

// Evitar que los usuarios puedan entrar en admin
function adminControl($location){
  if(!isset($_SESSION['id_usuario'])){
    session_destroy();
		header("Location: $location");
  } else {
        if($_SESSION['tipo_usuario'] != 0){
            session_destroy();
            header("Location: $location");
        }
  }
}

function userControl($locationUser){
  if(isset($_SESSION['tipo_usuario'])){
      header("Location: $locationUser");
  }   
}

function sessionControl($location){
  if(!isset($_SESSION['id_usuario'])){
    session_destroy();
		header("Location: $location");
  } else {
      if($_SESSION['tipo_usuario'] != 1 && $_SESSION['tipo_usuario'] != 0){
          session_destroy();
          header("Location: $location");
      }   
  }
}

?>