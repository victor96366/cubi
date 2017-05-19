<?php
include ("autenticar.php");
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "cubiculos";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
    if ($conexion->connect_error) {
        die("La conexion falló");
        $data='0';
    }else{
        $validar = $_POST['validar'];
        $fecha = $_POST['fecha'];
        if($validar=='1'){
            $datos="";
            $cedula = $_POST['cedula'];
            //$fecha = date("Y/m/d"); 
            $sql = "SELECT id_registro,grupo_investigacion,numero_cubiculo,hora_entrada,responsable_inicio FROM `registroinicio` WHERE id_registro=(SELECT MAX(id_registro) FROM registroinicio where codigo_investigador='$cedula'and fecha='$fecha' and estado='0')";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows > 0) {    
                while ($fila=mysqli_fetch_array($resultado)){ 
                    $datos.='<form class="form-horizontal">
                              <legend>Datos de Inicio</legend>
                              <div class="form-group">
                                <label class="col-lg-2 control-label">Gr. Investigación: </label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="grupo" value="'.$fila['grupo_investigacion'].'" placeholder="GIII-UCP" disabled>
                                    <input type="text"  id="codigo"  value="'.$fila['id_registro'].'" style="display:none;">
                                </div>
                                <label class="col-lg-2 control-label" for="inputPrograma">No. Cubiculo: </label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="cubiculo"  value="'.$fila['numero_cubiculo'].'" placeholder="1" disabled>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-lg-2 control-label">Hora Inicio: </label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="horai" value="'.$fila['hora_entrada'].'" placeholder="08:20 PM" disabled>
                                </div>
                                <label class="col-lg-2 control-label" for="inputPrograma">Res. Entrada: </label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="respentrada" value="'.$fila['responsable_inicio'].'" placeholder="Juan Camilo" disabled>
                                </div>
                              </div>
                        </form>';
                }
            }else{
                $datos="No tiene asignado préstamo alguno";
            }
            echo $datos;
        }else if($validar=='2'){
            $codigo = $_POST["codigo"];
            $responsable_salida = $_POST["nombre"];
            $horafin = $_POST["horafin"];
            $observaciones = $_POST["observaciones"];
            $data=0;       
                $host_db = "localhost";
                $user_db = "root";
                $pass_db = "";
                $db_name = "cubiculos";
                $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
                if ($conexion->connect_error) {
                    die("La conexion falló");
                    $data='0';
                }else{
                    mysqli_query($conexion, "INSERT INTO registrofin(id_registro, hora_salida, responsable_salida,observaciones) VALUES ('$codigo','$horafin','$responsable_salida','$observaciones')");
                    $sql="UPDATE registroinicio SET estado='1'  WHERE id_registro='$codigo' and fecha='$fecha'";
                    mysqli_query($conexion,$sql);
                    $data='1';
                }  
                echo $data; 
        }
        
    }  

?>