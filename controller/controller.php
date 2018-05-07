<?php
///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/GastosModel.php';
session_start();
$gastosModel = new GastosModel();
//recibimos la opcion desde la vista:
$opcion = $_REQUEST['opcion'];
unset($_SESSION['mensaje2']);
//limpiamos cualquier mensaje previo:



switch($opcion){
    case "listar":
        //obtenemos la lista de facturas:
        $listado = $gastosModel->getEncuesta();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //redireccionamos a la pagina index para visualizar:
       header('Location: ../view/index.php');
        break;
    
    case "insertar":
        //obtenemos los parametros del formulario:
        $edad=$_REQUEST['edad'];
        $sexo=$_REQUEST['sexo'];
        $tipo_de_ingreso=$_REQUEST['tipo_de_ingreso'];
        $nivel_de_educacion=$_REQUEST['nivel_de_educacion'];
        
       $mensaje=$gastosModel->insertarEncuesta($numero_encuesta, $edad, $sexo, $tipo_de_ingreso, $nivel_de_educacion);
        $listado = $gastosModel->getEncuesta();
       $_SESSION['mensaje2']=$mensaje;
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
   
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}
