<?php
include_once 'Database.php';
include_once 'Encuesta.php';
/**
 * Objeto de negocio GastosModel. Implementa funciones CRUD
 * y varias funciones de negocio de la aplicacion Anexo de
 * gastos personales.
 *
 * @author Gaby
 */
class GastosModel {
    /**
     * Retorna la lista de facturas de la bdd.
     * @return array
     */
    
    public function getEncuesta(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from dencuesta order by numero_encuesta asc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $res){ // le transforma de filas a objetos
            $encuesta = new Encuesta($res['numero_encuesta'],$res['edad'],$res['sexo'],$res['tipo_de_ingreso'],$res['nivel_de_educacion']);
            array_push($listado, $encuesta);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    
   public function insertarEncuesta($numero_encuesta,$edad,$sexo,$tipo_de_ingreso,$nivel_de_educaion) {
        $pdo = Database::connect();
           $mensaje1=" ";
        $sql = "select * from  dencuesta where numero_encuesta=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($numero_encuesta));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        //comtamos las veces ingresadas
        $veces_ingresadas_fac = $consulta->rowCount();
        if ($veces_ingresadas_fac < 1) {
             $mensaje1=" ";
            $sql = "insert into  dencuesta(numero_encuesta,edad,sexo,tipo_de_ingreso,nivel_de_educacion) values(?,?,?,?,?)";
            $consulta = $pdo->prepare($sql);
            //Ejecutamos y pasamos los parametros:
            try {
                $consulta->execute(array($numero_encuesta,$edad,$sexo,$tipo_de_ingreso,$nivel_de_educaion));
            } catch (PDOException $e) {
                Database::disconnect();
                throw new Exception($e->getMessage());
            }
        }else {
        $mensaje1="ERROR DATO REPETIDO";
        }
        Database::disconnect();
        return $mensaje1;
    }
   
  
}
