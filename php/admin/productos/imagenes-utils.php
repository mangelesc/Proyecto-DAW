<?php

function sube_imagen($pathInfo, $pathfile){
  if(!empty($_FILES[$pathInfo]['name'])){
    $extension = pathinfo($_FILES[$pathInfo]['name'], PATHINFO_EXTENSION);
    $extensiones_aceptadas = array("", "png", "jpg", "jpeg","gif", "JPG", "JPEG","GIF", "PNG");
    $encontrado = array_search($extension, $extensiones_aceptadas);

    if($encontrado!=false){
      if(is_uploaded_file($_FILES[$pathInfo]['tmp_name'])){
          $ruta_imagen="images/".time().".".$extension;

          $ruta_imagen_guardar= $pathfile.$ruta_imagen;
        move_uploaded_file($_FILES[$pathInfo]['tmp_name'], $ruta_imagen_guardar);
        return $ruta_imagen; 
      } else{
        return '3'; //Error al subir la imagen
      }
    } else{
      return '3'; //Extensión no válida
    }
  } else{
    return null; //Imagen no añadida
  }
}

?>

