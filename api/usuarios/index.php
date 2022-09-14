<?php 
include_once "../../model/modeloUsuario.php";
$a = new modeloUsuario();
$json = [];

if(isset($_REQUEST['site'])){
    switch($_REQUEST['site']){
        case "crear":
            if(!isset($_REQUEST['nombre'])){
                $json = array('mensaje' => 'No ha ingresado nombre');
            }
            else if(!isset($_REQUEST['correo'])){
                $json = array('mensaje' => 'No ha ingresado correo');
            }
            else if(!isset($_REQUEST['contrasena'])){
                $json = array('mensaje' => 'No ha ingresado contrasena');
            }
            else if(!isset($_REQUEST['dirrecion'])){
                $json = array('mensaje' => 'No ha ingresado dirrecion');
            }
            else if(!isset($_REQUEST['telefono'])){
                $json = array('mensaje' => 'No ha ingresado telefono');
            }
            else if(!isset($_REQUEST['fecha_nac'])){
                $json = array('mensaje' => 'No ha ingresado fecha_nac');
            }else{
                if($a->crear(array('nombre' => $_REQUEST['nombre'], 'correo' => $_REQUEST['correo'], 'contrasena' => md5($_REQUEST['contrasena']), 'dirrecion' => $_REQUEST['dirrecion'], 'telefono' => $_REQUEST['telefono'], 'fecha_nac' => $_REQUEST['fecha_nac']))){
                    $json = array('mensaje'=>'Operación Realizada con exito');
                }else{
                    $json = array('mensaje'=>'Error al realizar la operación');
                }
            }
        break;

        case "login":
            if(!isset($_REQUEST['correo'])){
                $json = array('mensaje' => 'No ha ingresado correo');
            }else if(!isset($_REQUEST['contrasena'])){
                $json = array('mensaje' => 'No ha ingresado contrasena');
            }else{
                if($b = $a->login($_REQUEST['correo'])){

                    if(md5($_REQUEST['contrasena']) == $b->contrasena){
                        $json = array('mensaje'=>'Login Exitoso');
                    }else{
                        $json = array('mensaje'=>'Contraseñna Incorrecta');
                    }
                    
                }else{
                    $json = array('mensaje'=>'El correo Ingresado No existe');
                }
            }
        break;

        default:
            $json = array('mensaje'=> 'EXISTE UN ERROR EN LOS PARAMETROS');
        break;
    }
}else{
    $json = array('mensaje'=> 'NOT FOUNT');
}

echo json_encode($json);
 
?>