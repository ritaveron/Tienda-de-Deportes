<?php 
session_start();
$mensaje="";
$ID = null; // Inicializar la variable $ID

if(isset($_POST['btnAccion'])){ // si hacemos una recepción POST
switch($_POST['btnAccion']){
   
    case 'Agregar':

if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
$ID= openssl_decrypt($_POST['id'],COD,KEY);
$mensaje.= "Ok.... ID correcto".$ID ."<br/>";
}else{
$mensaje.= "Upss.... ID incorrecto".$ID ."<br/>";
}

if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
    $NOMBRE= openssl_decrypt($_POST['nombre'],COD,KEY);
    $mensaje.= "Ok.... nombre correcto".$NOMBRE ."<br/>";
    }else{
    $mensaje.= "Upss.... nombre incorrecto" ."<br/>";      
    break;
    }

    if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
        $CANTIDAD= openssl_decrypt($_POST['cantidad'],COD,KEY);
        $mensaje.= "Ok.... cantidad correcto".$CANTIDAD ."<br/>";
        }else{
        $mensaje.= "Upss.... cantidad incorrecto"."<br/>";                
        break;
        }
        
        if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
            $PRECIO= openssl_decrypt($_POST['precio'],COD,KEY);
            $mensaje.= "Ok.... precio correcto".$PRECIO ."<br/>";
            }else{
            $mensaje.= "Upss.... precio incorrecto" ."<br/>";                   
            break;
            }

            if(!isset($_SESSION['CARRITO'])){
                $_SESSION['CARRITO'] = array();
            }
             $producto = array(
                'ID' => $ID,
                'NOMBRE' => $NOMBRE,
                'CANTIDAD' => $CANTIDAD,
                'PRECIO' => $PRECIO,
             );

             $_SESSION['CARRITO'][] = $producto;

             $mensaje = print_r($_SESSION, true);

break;
}
}

?>