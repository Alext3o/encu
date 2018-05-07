<!DOCTYPE html>
<?php
    session_start();
   // include '../model/Factura.php';
    include_once '../model/Encuesta.php';
    include_once '../model/GastosModel.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de encuestas </title>
    </head>
    <body>
        <table>
            <tr>
                <td>
                    <form action="../controller/controller.php">
                        <input type="hidden" name="opcion" value="insertar">
                        <table>

                            <tr>
                                <td>EDAD</td>
                                <td><input title="Se necesita una EDAD"  type="text" name="edad"  required></td>
                            </tr>
                            <tr>
                                <td>SEXO</td>
                                <td><select name="sexo"> 
                                        <OPTION VALUE="H">H</OPTION>
                                        <OPTION VALUE="M">M</OPTION>
                                        
                                    </select></td>
                            </tr>
                            <tr>
                                <td>TIPO DE INGRESO</td>
                                <td><select name="tipo_de_ingreso"> 
                                        <OPTION VALUE="S">sueldo</OPTION>
                                        <OPTION VALUE="N">negocio</OPTION>
                                        <OPTION VALUE="O">otro</OPTION>
                                        
                                    </select></td>
                            </tr>
                            <tr>
                                <td>NIVEL DE EDUCACION</td>
                                <td><select name="nivel_de_educacion"> 
                                        <OPTION VALUE="P">primaria</OPTION>
                                        <OPTION VALUE="S">secundaria</OPTION>
                                        <OPTION VALUE="U">superior</OPTION>
                                        <OPTION VALUE="N">ninguno</OPTION>
                                        
                                    </select></td>
                            </tr>
                        

                            <tr>
                                <td><input type="submit" value="Insertar nuevo Encuesta"></td>

                            </tr>
                        </table>
                    </form> 
                </td>

            </tr>
            <tr>
                 <td>
                    <form action="../controller/controller.php">
                        <input type="hidden" value="listar" name="opcion">
                        <input type="submit" value="Consultar listado de Encuestas">
                    </form>
                </td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <th>NUMERO DE ENCUESTA</th>
                <th>EDAD</th>
                <th>SEXO</th>
                <th>TIPO DE INGRESO</th>
                <th>NIVEL DE EDUCACION</th>
                
            </tr>
            <?php
            
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod->getNumero_encuesta() . "</td>";
                    echo "<td>" . $prod->getEdad() . "</td>";
                    echo "<td>" . $prod->getSexo() . "</td>";
                    echo "<td>" . $prod->getTipo_de_ingreso() . "</td>";
                    echo "<td>" . $prod->getNivel_de_educacion() . "</td>";
                   
                    echo "</tr>";
                }
            } else{
                echo "No se han cargado datos.";
            }
            ?>
        </table>
        <?php
       
        if (isset($_SESSION['mensaje2'])) {
        echo "<br>MENSAJE DEL SISTEMA: <font color='blue'>" . $_SESSION['mensaje2'] . "</font><br>";
        }
        ?>
</body>
</html>
