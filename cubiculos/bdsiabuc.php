<?php
include ("autenticar.php");
$host_db = "10.1.4.6";
$user_db = "BiblioCDCH";
$port_db=  "9000";
$pass_db = "Biblio2010";
$db_name = "siabuc9";
$codigo = $_POST['codigo'];
//Conexion a la base de datos 
$conexion =pg_connect("host=$host_db port=$port_db user=$user_db password=$pass_db dbname=$db_name") or die("Error en la Conexión: ".pg_last_error());

//consulta a la base de datos
$query = "select usuarios.nombre AS nombre1, grupos.descripcion, escuelas.nombre AS nombre2, carreras.nombre AS nombre3
from catalogos.usuarios AS usuarios 
inner join catalogos.grupos AS grupos ON (grupos.no_grupo=usuarios.no_grupo)
inner join catalogos.escuelas AS escuelas ON (escuelas.idescuela=usuarios.idescuela)
inner join catalogos.carreras AS carreras ON (carreras.idcarrera=usuarios.idcarrera) WHERE usuarios.no_cuenta='".$codigo."' ";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

$numReg = pg_num_rows($resultado);
$datos="";
$dato1="";
if($numReg>0){
    //Colocar los datos de la consulta en un formulario  
    while ($fila=pg_fetch_array($resultado)) {
        $datos.='<form class="form-horizontal">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre: </label>
                            <div class="col-lg-4">
                                <input class="form-control" id="nombre" type="text" value="'.$fila['nombre1'].'" placeholder="Andres" disabled>
                            </div>
                            <label class="col-lg-2 control-label" for="inputPrograma">Escuela: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="escuela" value="'.$fila['nombre2'].'" placeholder="UCP" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Carrera: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="carrera" value="'.$fila['nombre3'].'" placeholder="IST" disabled>
                            </div>
                            <label class="col-lg-2 control-label" for="inputPrograma">Grupo: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="grupo" value="'.$fila['descripcion'].'" placeholder="1" disabled>
                            </div>
                          </div>
                    </form>';
        }
}else{
    $datos= "no hay datos";
}
echo $datos;// Se devuelve lo que contiene la variable datos ya sea el formulario o informando que la consulta no tiene dato alguno.
?>


