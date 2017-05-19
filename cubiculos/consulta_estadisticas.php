<?php
    include ("autenticar.php");// incluyo el archivo autenticar para verificar que si hay un usuario que haya iniciado sesion 
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "";
    $db_name = "cubiculos";
    $datos="";
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $tipoConsulta = $_POST['tipoConsulta'];
    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name); // conexion a la base de datos 
    if ($conexion->connect_error) {
        die("La conexion falló");
        $data='No se pudo establecer la conexion a la base de datos';
    }else{
        if($tipoConsulta=='1'){ // se verifica que tipo de consulta se va a realizar 1 es para la consulta de cubiculos y 2 para la consulta general.
            $sql = "SELECT registroinicio.numero_cubiculo,count(*) as num, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(registroinicio.hora_entrada, registrofin.hora_salida))*-1)) TotalHoras FROM registroinicio INNER JOIN registrofin on(registroinicio.id_registro=registrofin.id_registro) where registroinicio.fecha BETWEEN '$fechaInicio' and '$fechaFin' GROUP BY numero_cubiculo";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows > 0) {
                // esta es la cabecera de la tabla
                $datos.='<thead><tr><th>Nº Cubículo</th><th>Utilización</th><th>Total Horas</th></tr></thead><tbody>';   
                while ($fila=mysqli_fetch_array($resultado)){ 
                    // este es el cuerpo de la tabla donde se listan todos los registros 
                    $datos.='<tr>
                                <td>'.$fila['numero_cubiculo'].'</td>
                                <td class="cantidadc">'.$fila['num'].'</td>
                                <td class="horasc">'.$fila['TotalHoras'].'</td>
                              </tr>';
                }
                $datos.='</tbody>';
            }else{
                $datos="0";
            }
        }else if($tipoConsulta=='2'){
            $sql = "SELECT registroinicio.numero_cubiculo,count(*) as num,registroinicio.nombre_investigador,registroinicio.facultad,registroinicio.programa,registroinicio.grupo_investigacion, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(registroinicio.hora_entrada, registrofin.hora_salida))*-1)) TotalHoras FROM registroinicio INNER JOIN registrofin on(registroinicio.id_registro=registrofin.id_registro) where registroinicio.fecha BETWEEN '$fechaInicio' and '$fechaFin' GROUP BY registroinicio.numero_cubiculo,registroinicio.nombre_investigador,registroinicio.grupo_investigacion";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows > 0) {  
                // esta es la cabecera de la tabla 
               $datos.='<thead><tr><th>Nº Cubículo</th><th>Utilización</th><th>Investigador</th><th>Facultad</th><th>Programa</th><th>Grupo de Investigación</th><th>Total Horas</th></tr></thead><tfoot><tr><th>Cubículo</th><th>Utilización</th><th>Investigador</th><th>Facultad</th><th>Programa</th><th>Grupo</th><th>Horas</th></tr>
                    </tfoot><tbody>';    
                while ($fila=mysqli_fetch_array($resultado)){ 
                    // este es el cuerpo de la tabla donde se listan todos los registros 
                    $datos.='<tr>
                                <td>'.$fila['numero_cubiculo'].'</td>
                                <td class="cantidad">'.$fila['num'].'</td>
                                <td>'.$fila['nombre_investigador'].'</td>
                                <td>'.$fila['facultad'].'</td>
                                <td>'.$fila['programa'].'</td>
                                <td>'.$fila['grupo_investigacion'].'</td>
                                <td class="horas" >'.$fila['TotalHoras'].'</td>
                              </tr>';
                }
                $datos.='</tbody>';
            }else{
                $datos="0";
            }
        }
        echo $datos;  // devuelvo los datos de la consulta que se realizo sin tener en cuenta a que tipo de consulta entro si a la 1 o la 2 
    }
?>