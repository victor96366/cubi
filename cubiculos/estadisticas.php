<?php  include ("autenticar.php"); date_default_timezone_set('America/Bogota'); ?>
<style>
  .consultaCubiculos,.tabla,.consulta_general,.tabla1{
    display:none;
  }
  tfoot input {
      width: 100%;
      padding: 3px;
      box-sizing: border-box;
  }
</style>
<div class="row content">
    <div class="row">
         <div class="col-md-12">
             <form class="form-horizontal">
                  <legend>Seleccione el tipo de consulta que desea realizar</legend>
                  <div class="form-group">
                      <div class="col-lg-12 btn-group btn-group-justified" role="group" >
                        <div class="col-lg-4 btn-group" role="group">
                          <button type="button" id="consulta1" class="btn btn-success">Consulta de Cubículos</button>
                        </div>
                        <div class="col-lg-4 btn-group" role="group">
                          <button type="button" id="consulta2" class="btn btn-success">Consulta General</button>
                        </div>
                      </div>
                  </div>
                  <div class="form-group consultaCubiculos">
                    <label class="col-lg-2 control-label" for="inputPrograma">Fecha Inicio: </label>
                     <div class="col-lg-4">
                        <div class="input-group">
                          <input class="form-control" id="fechaInicio" value="<?php echo date("Y/m/d");?>" data-provide="datepicker" type="text" placeholder="Seleccione Fecha">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                      </div>
                      <label class="col-lg-2 control-label" for="inputPrograma">Fecha Fin: </label>
                       <div class="col-lg-4">
                          <div class="input-group">
                            <input class="form-control" id="fechaFin" value="<?php echo date("Y/m/d");?>" data-provide="datepicker" type="text" placeholder="Seleccione Fecha">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                          </div>
                        </div>
                  </div>
                  <div class="form-group consultaCubiculos">
                     <div class="col-lg-1 col-lg-offset-2">
                       <a class="btn btn-info"  id="consultarCubiculos" role="button">Consultar</a>
                     </div>
                   </div>
                   <div class="form-group consulta_general">
                    <label class="col-lg-2 control-label" for="inputPrograma">Fecha Inicio: </label>
                     <div class="col-lg-4">
                        <div class="input-group">
                          <input class="form-control" id="fechaIniciog" value="<?php echo date("Y/m/d");?>" data-provide="datepicker" type="text" placeholder="Seleccione Fecha">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                      </div>
                      <label class="col-lg-2 control-label" for="inputPrograma">Fecha Fin: </label>
                       <div class="col-lg-4">
                          <div class="input-group">
                            <input class="form-control" id="fechaFing" value="<?php echo date("Y/m/d");?>" data-provide="datepicker" type="text" placeholder="Seleccione Fecha">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                          </div>
                        </div>
                  </div>
                  <div class="form-group consulta_general">
                     <div class="col-lg-1 col-lg-offset-2">
                       <a class="btn btn-info"  id="consultarGeneral" role="button">Consultar</a>
                     </div>
                   </div>
            </form>
        </div>
    </div>
    <!--Se utilizaron dos tablas para que no ocasionara problemas en la primera se encuentra la de consulta de cubiclos y en la segunda consulta general estas son solo la estructura-->
    <!--Tabla 1-->
    <div class="tabla col-md-12">
      <legend>Resultados</legend>
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead class="cabecera">
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody id="cuerpo">
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-12" id="formulario">
                   <form class="form-horizontal">
                         <legend>Información</legend>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" id="labelHorasC" >Total Horas: </label>
                          <div class="col-lg-4">
                              <button type="button" id="calcularHorasC" class="btn btn-primary">Calcular</button>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label"  id="labelUtilizacionC">Total Utilización: </label>
                          <div class="col-lg-4">
                              <button type="button" id="calcularUtilizacionC" class="btn btn-primary">Calcular</button>
                          </div>
                        </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
    <!--Tabla 2-->
    <div class="tabla1 col-md-12">
      <legend>Resultados</legend>
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-bordered" id="sampleTable1">
            <thead class="cabecera1">
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            <tfoot>
            <tbody id="cuerpo1">
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-12" id="formulario">
                   <form class="form-horizontal">
                         <legend>Información</legend>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" id="labelHoras" >Total Horas: </label>
                          <div class="col-lg-4">
                              <button type="button"  class="btn btn-primary" id="calcularHoras">Calcular</button>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label"  id="labelUtilizacion">Total Utilización: </label>
                          <div class="col-lg-4">
                              <button type="button" id="calcularUtilizacion" class="btn btn-primary">Calcular</button>
                          </div>
                        </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
</div>   
<!--Este es el modal que permite mostrar algunos mensajes de errores o de resgistros que se hicieron-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="modal_header" class="modal-header btn-danger">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">titulo</h4>
      </div>
      <div class="modal-body">
        <p id="modal_body">mensaje</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Aceptar</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<script>
  //se realiza el calculo de la utilizacion de los cubiculos para la opcion de consulta de cubiculos 
  $("#calcularUtilizacion").click(function(){
      var cantidad=0;
      $('.cantidad').each(function() {
          cantidad+=parseInt($(this).html()) || 0;
      });
      $('#labelUtilizacion').text('Total Utilización: '+cantidad);
  });
  //se realiza el calculo de la utilizacion de los cubiculos por horas para la opcion de consulta de cubiculos 
  $("#calcularHoras").click(function(){
      var hora,cantidad,sumatoria=0;
      $('.horas').each(function() {
          cantidad=$(this).html();
          hora=cantidad.split(':');
          sumatoria+=parseInt(hora[0]*60)+parseInt(hora[1]);
      });
      var horaTotal = Math.floor(sumatoria/60);  
      var minutosTotal = sumatoria%60;
      if(minutosTotal<'10'){
        minutosTotal='0'+minutosTotal;
      }
      $('#labelHoras').text('Total Horas: '+horaTotal+':'+minutosTotal);
  });
  //se realiza el calculo de la utilizacion de los cubiculos para la opcion de consulta general 
  $("#calcularUtilizacionC").click(function(){
      var cantidad=0;
      $('.cantidadc').each(function() {
          cantidad+=parseInt($(this).html()) || 0;
      });
      $('#labelUtilizacionC').text('Total Utilización: '+cantidad);
  });
  //se realiza el calculo de la utilizacion de los cubiculos por horas para la opcion de consulta general 
  $("#calcularHorasC").click(function(){
      var hora,cantidad,sumatoria=0;
      $('.horasc').each(function() {
          cantidad=$(this).html();
          hora=cantidad.split(':');
          sumatoria+=parseInt(hora[0]*60)+parseInt(hora[1]);
      });
      var horaTotal = Math.floor(sumatoria/60);  
      var minutosTotal = sumatoria%60;
      if(minutosTotal<'10'){
        minutosTotal='0'+minutosTotal;
      }
      $('#labelHorasC').text('Total Horas: '+horaTotal+':'+minutosTotal);
  });
  // este funcion me permite esconder y mostrar los elementos correspondiente a la consulta que se desearealizar en este caso es la opcion de  consulta de cubiculos
  $("#consulta1").click(function(){
      $('.consultaCubiculos').css('display','block');// muestra la opcion de las fechas para consulta de cubiculos 
      $('.consulta_general').css('display','none');// esconde la opcion de las fechas para consulta general 
      $('.tabla').css('display','none');
      $('.tabla1').css('display','none');
  });
  //consulta general
  $("#consulta2").click(function(){
      $('.consulta_general').css('display','block');
      $('.consultaCubiculos').css('display','none');
      $('.tabla').css('display','none');
      $('.tabla1').css('display','none');
  });
  // esta funcion permite que al momento de dar clic realice la consulta de las fechas seleccionadas 
  $("#consultarCubiculos").click(function(){
      var fechaInicio = $("#fechaInicio").val();// capturo la fecha que seleccionaron 
      var fechaFin = $("#fechaFin").val();
      if (fechaInicio != "" && fechaFin!="") {
          // Esto me permite realizar una consulta asincrona en la cual lllamo al archivo que realiza la consulta y le mando los parametros necesarios para realizarla y este automaticamente me devuelve los datos encontrados en la cosnulta. 
          $.post("consulta_estadisticas.php", {fechaInicio: fechaInicio,fechaFin:fechaFin,tipoConsulta:'1'}, function(datos) {
              if(datos=='0'){// verifica que si hay datos o no
                  $('#modal_header').removeClass('btn-primary');// le quito la clase primary a la cabecera 
                  $('#modal_header').addClass('btn-danger');// le asigno una nueva clase danger para indicar que hay un error 
                  $('.modal-title').text("Información"); //le asigno el titulo al modal 
                  $('#modal_body').text("No se encontraron datos para las fechas seleccionadas!"); //le asigno  el mensaje en el modal  
                  $('#myModal').modal('show');//Muestro el modal 
              }else{
                $('#sampleTable').html(datos);
                $('.tabla').css('display','block');
                $('#sampleTable').DataTable({'destroy':true});// esto me permite inicializar la tabla, el destroy:true me permite que al realizar una nueva consulta me tome esos datos y no los anteriores 
              }  
          });
      } 
  });
  $("#consultarGeneral").click(function(){
      var fechaInicio = $("#fechaIniciog").val();
      var fechaFin = $("#fechaFing").val();
      if (fechaInicio != "" && fechaFin!="") {
          $.post("consulta_estadisticas.php", {fechaInicio: fechaInicio,fechaFin:fechaFin,tipoConsulta:'2'}, function(datos) {
               if(datos=='0'){
                  $('#modal_header').removeClass('btn-primary');
                  $('#modal_header').addClass('btn-danger');
                  $('.modal-title').text("Información"); 
                  $('#modal_body').text("No se encontraron datos para las fechas seleccionadas!");  
                  $('#myModal').modal('show');
              }else{
                $('.tabla1').css('display','block');
                $("#sampleTable1").html(datos);
                $('#sampleTable1 tfoot th').each(function() {
                    var title=$(this).text();
                    $(this).html('<input type="text" placeholder="Buscar '+title+'" />');
                });
                // DataTable
                var table = $('#sampleTable1').DataTable({'destroy':true});
                // aplicacion de los filtros 
                table.columns().every(function() {
                    var that = this;
                    $('input',this.footer()).on('keyup change',function() {
                        if (that.search() !== this.value) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    });
                });
            }
          }); 
      } 
  });
</script>
<script>
  // scripts necesarios para poder seleccionar la fecha 
  $('#fechaInicio').datepicker({
    format: "yyyy/mm/dd",
    autoclose: true,
    todayHighlight: true,
    today: "Today",
  });
  $('#fechaFin').datepicker({
    format: "yyyy/mm/dd",
    autoclose: true,
    todayHighlight: true,
    today: "Today",
  });
  $('#fechaIniciog').datepicker({
    format: "yyyy/mm/dd",
    autoclose: true,
    todayHighlight: true,
    today: "Today",
  });
  $('#fechaFing').datepicker({
    format: "yyyy/mm/dd",
    autoclose: true,
    todayHighlight: true,
    today: "Today",
  });
</script>

