<?php 
include_once "../../model/modeloNoticias.php";
$a = new modeloNoticias();
$json = [];

if(isset($_REQUEST['site'])){
    switch($_REQUEST['site']){
        case "listar":
            $json = $a->listar();
        break;

        case "crear":
            if(!isset($_REQUEST['titulo'])){
                $json = array('mensaje'=> 'No ha ingresado el Titulo');
            }else if(!isset($_REQUEST['descripcion'])){
                $json = array('mensaje'=> 'No ha ingresado La descripcion');
            }else{
                if($a->crear(array("titulo"=>$_REQUEST['titulo'], "descripcion"=>$_REQUEST['descripcion']))){
                    $json = array('mensaje'=>'Operación Realizada con exito');
                }else{
                    $json = array('mensaje'=>'Error al realizar la operación');
                }
            }
        break;

        case "editar":
            if(!isset($_REQUEST['id'])){
                $json = array('mensaje'=> 'No ha ingresado el ID');
            }else if(!isset($_REQUEST['titulo'])){
                $json = array('mensaje'=> 'No ha ingresado el Titulo');
            }else if(!isset($_REQUEST['descripcion'])){
                $json = array('mensaje'=> 'No ha ingresado La descripcion');
            }else{
                if($a->editar(array("titulo"=>$_REQUEST['titulo'], "descripcion"=>$_REQUEST['descripcion']), $_REQUEST['id'])){
                    $json = array('mensaje'=>'Operación Realizada con exito');
                }else{
                    $json = array('mensaje'=>'Error al realizar la operación');
                }
            }
        break;

        case "eliminar":
            if(!isset($_REQUEST['id'])){
                $json = array('mensaje'=> 'No ha ingresado el ID');
            }else{
                if($a->eliminar($_REQUEST['id'])){
                    $json = array('mensaje'=>'Operación Realizada con exito');
                }else{
                    $json = array('mensaje'=>'Error al realizar la operación');
                }
            }
        break;

        case "comentario":
            if(!isset($_REQUEST['id'])){
                $json = array('mensaje'=> 'No ha ingresado la noticia');
            }else if(!isset($_REQUEST['comentario'])){
                $json = array('mensaje'=> 'No ha ingresado el Comentario');
            }else{
                if($a->consultar($_REQUEST['id'])){
                    if($a->comentario($_REQUEST['comentario'], $_REQUEST['id'])){
                        $json = array('mensaje'=>'Operación Realizada con exito');
                    }else{
                        $json = array('mensaje'=>'Error al realizar la operación');
                    }
                }else{
                    $json = array('mensaje'=>'La noticia no existe');
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