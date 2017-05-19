<!DOCTYPE html>
<?php  include ("autenticar.php"); ?>
<html lang="es">
<head>
    <title>Control de llaves de cubiculos de investigación</title>
    <meta charset="utf-8" />
     <!--Se llaman todos los css -->
    <link rel="stylesheet" href="CSS/dataTables.bootstrap.css" /> 
    <link rel="stylesheet" href="CSS/jquery.dataTables.css" /> 
    <link rel="stylesheet" href="CSS/bootstrap-timepicker.min.css" /> 
    <link rel="stylesheet" href="CSS/finprestamo.css" />  
    <link rel="stylesheet" href="CSS/inicioprestamo.css" />    
    <link rel="stylesheet" href="CSS/estilo1.css" /><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 
</head>
<body>  
    <header>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2"><img id="imgheader" src="IMG/fo-logo.png"></div>
            <div class="col-md-6"><h3 id="tittle1"><strong>Sistema para el control  de llaves de los cubículos de investigación</strong></h3></div>
            <div class="col-md-2"><img id="logobiblioteca" src="IMG/LOGO%20BIBLIOTECA%20FORTAMTO%20PNG_opt.png"></div>
        </div>  
    </header>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                        <nav class="navbar navbar-default">
                          <div class="container-fluid">
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav">
                                <li  id="inicioprestamo" ><a href="#">Inicio Préstamo</a></li>
                                <li  id="finprestamo"><a href="#">Fin Préstamo</a></li>
                                <?php
                                  if($_SESSION['rol']!='0'){
                                      ?>
                                        <li id="estadisticas"><a href="#">Estadísticas</a></li>
                                      <?php
                                  }
                                ?> 
                              </ul>
                              <ul class="nav navbar-nav navbar-right">
                                <li><h5 id="bienvenido"><strong>BIENVENIDO:</strong> <?php echo $_SESSION['nombre_usuario']; ?> </h5></li>
                                <li>
                                    <form method="get" action="cerrar_sesion.php">
                                        <button id="cerrar" type="submit" class="btn btn-default">Cerrar Sesión</button>
                                    </form>    
                                </li>
                              </ul>
                            </div><!-- /.navbar-collapse -->
                          </div><!-- /.container-fluid -->
                        </nav>  
                    </h3>
                  </div>
                  <div class="panel-body" id="contenido">
                    <img id="fondo" src="IMG/FOTOGRAF%C3%8DACUB%C3%8DCULOS.png"> 
                  </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>    
    <footer>
         <p id="footer"> Biblioteca Cardenal Darío Castrillón Hoyos</p>
    </footer>
    <header>
        <div class="row"> 
            <div class="col-md-12"><h6><p id="fotor1">© 2017 | Developed By: Comité de Desarrollo GTI</p></h6></div>
        </div>  
    </header>

</body>
    <!--Se llaman todos los script -->
   <script src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/bootstrap-timepicker.min.js" ></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script>
       $(document).ready(function(){
           $("#inicioprestamo").click(function(){
                $("#inicioprestamo").addClass("active");
                $("#finprestamo").removeClass("active");
                $("#estadisticas").removeClass("active");
                $("#contenido").load("inicioprestamo.php");    
           });
           $("#finprestamo").click(function(){
                $("#inicioprestamo").removeClass("active");
                $("#finprestamo").addClass("active");
                $("#estadisticas").removeClass("active");
                $("#contenido").load("finprestamo.php");    
           });
           $("#estadisticas").click(function(){
                $("#inicioprestamo").removeClass("active");
                $("#finprestamo").removeClass("active");
                $("#estadisticas").addClass("active");
                $("#contenido").load("estadisticas.php");    
           });
       });
   </script>
</html>
  