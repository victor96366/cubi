<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "cubiculos";
$tbl_name = "usuarios"; 
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
 
if ($conexion->connect_error) {
    die("La conexion falló");
}

$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];

$sql = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario' and contrasena='$pass'";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
    header("location: /cubiculos/index.php");
    
    $row = mysqli_fetch_array($result);
    $nombre=$row[4];
    $rol=$row[3];
    // se crea una sesion para verificar en las demas vista que el usuario si haya iniciado sesion 
    session_start();
    $_SESSION["autenticado"]= "SI";
    $_SESSION["nombre_usuario"]= $nombre;
    $_SESSION["rol"]= $rol;

}else{
    echo '<script type="text/javascript">alert("Usuario y/o contraseña incorrecta");</script>';
    echo '<script type="text/javascript"> window.location="http://localhost/cubiculos/login.php";</script>';
}
?>