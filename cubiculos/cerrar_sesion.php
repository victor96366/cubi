<?php
	session_start();
	session_unset(); //libera las variables de sesión
	session_destroy();//destruye la informacion registrada de una sesión
	header("location: /cubiculos/login.php");//redirecciona al inicio de sesion
?>