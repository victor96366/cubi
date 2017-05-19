<?php
    include ("autenticar.php");// se incluye el archivo autenticar para verificar que el usuario se haya iniciado sesion 
    $grupo_investigacion = $_POST["investigacion"];
    $hora_entrada = $_POST["hora"];
    $numero_cubiculo = $_POST["cubiculo"];
    $responsable_inicio = $_POST["responsable"];
    $nombre_investigador = $_POST["nombre"];
    $facultad = $_POST["escuela"];
    $tipo_usuario = $_POST["grupo"];
    $programa = $_POST["carrera"];
    $codigo_investigador = $_POST["codigo"];
    $fecha = $_POST["fecha"];
    //$fecha = date("Y/m/d"); 
    $data=0;       
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "cubiculos";
        $tbl_name = "registroinicio"; 
        $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

        if ($conexion->connect_error) {
            die("La conexion falló");
            $data='0';
        }else{
            //consulta si el usuario tiene prestamos sin finalizar 
            $sql = "SELECT * FROM registroinicio WHERE estado='0' and codigo_investigador='$codigo_investigador' and fecha='$fecha'";
            $resultado = $conexion->query($sql);
            //consulta si el cubiculo esta ocupado
            $sql1 = "SELECT * FROM registroinicio WHERE estado='0'  and fecha='$fecha' and numero_cubiculo='$numero_cubiculo'";
            $resultado1 = $conexion->query($sql1);
            if ($resultado->num_rows > 0) {
                $data='0';
            }else if($resultado1->num_rows > 0){
                $data='2';
            }else{
                mysqli_query($conexion, "INSERT INTO registroinicio(grupo_investigacion, fecha, hora_entrada, numero_cubiculo, responsable_inicio, nombre_investigador,facultad, tipo_usuario, programa, codigo_investigador) VALUES ('$grupo_investigacion','$fecha','$hora_entrada','$numero_cubiculo','$responsable_inicio','$nombre_investigador','$facultad','$tipo_usuario','$programa','$codigo_investigador')");
                $data='1';
            }
        }  
        echo $data; 
?>