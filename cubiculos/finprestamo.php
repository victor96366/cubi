<?php  include ("autenticar.php"); date_default_timezone_set('America/Bogota');?>
<div class="row content">
    <div class="row fila1">
        <div class="col-md-12 fila11">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                     <form class="form-inline">
                          <div class="form-group">
                            <label >Código: </label>
                            <input type="text" class="form-control" id="cedula" placeholder="106628939">
                          </div>
                           <div class="form-group">
                            <label >Fecha: </label>
                            <div class="input-group">
                              <input class="form-control" id="fecha" value="<?php echo date("Y/m/d");?>" data-provide="datepicker" type="text" placeholder="Seleccione Fecha">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                          </div>
                          <button type="button" class="btn btn-primary"  onclick="buscar();" >Validar</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="clearfix">---------------------------------</div>
         <div class="col-md-12">
            <div class="row">
                <div class="col-md-12" id="formulario">
                     <form class="form-horizontal">
                          <legend>Datos de Inicio</legend>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Gr. Investigación: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="grupo" placeholder="GIII-UCP">
                                <input type="text"  id="codigo"   style="display:none;">
                            </div>
                            <label class="col-lg-2 control-label" for="inputPrograma">No. Cubículo: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="cubiculo" placeholder="1" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Hora Inicio: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="horai" placeholder="08:20 PM" >
                            </div>
                            <label class="col-lg-2 control-label" for="inputPrograma">Respo. Entrada: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="respentrada" placeholder="Juan Camilo">
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-md-12">
             <form class="form-horizontal">
                  <legend>Registro Fin</legend>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Hora Fin: </label>
                    <div class="col-lg-4">
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="timepicker2" type="text" class="form-control input-small">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                    <label class="col-lg-2 control-label" for="inputPrograma">Respo. Salida: </label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="respsalida" placeholder="Juan Camilo">
                    </div>
                  </div>
                 <div class="form-group">
                    <label class="col-lg-2 control-label">Observaciones: </label>
                    <div class="col-lg-4">
                        <textarea class="form-control" id="textObservacion" rows="2"></textarea>
                    </div>
                 </div>
                 <div class="form-group">
                   <div class="col-lg-1 col-lg-offset-2">
                     <a class="btn btn-info"  id="insertarfin" role="button">Registrar</a>
                   </div>
                 </div>
            </form>
        </div>
    </div>
</div>
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
<script type="text/javascript">
  function buscar() {
      // busqueda a la base de datos de siabuc del ususario que desea relizar el prestamo 
      var cedula = $("#cedula").val();
      var fecha = $("#fecha").val();
      if (cedula != "") {
          $.post("insertarfin.php", {cedula: cedula,validar: '1',fecha:fecha}, function(datos) {
              $("#formulario").html(datos);
          }); 
      } 
  };
</script>
<script>
  $("#insertarfin").click(function(){
    // velifico que los campos esten llenos 
    if($('#cedula').val()!='' && $('#grupo').val()!=''  && $('#respsalida').val()!="" && $('#codigo').val()!=''){
        var fecha = $("#fecha").val();
        // insertar los datos de manera asincrona sin que se recargue la pagina, llamo al archivo y le mando los datos necesarios
        $.post( "insertarfin.php", { codigo: $('#codigo').val(), nombre: $('#respsalida').val(),horafin: $('#timepicker2').timepicker().val(),observaciones: $('#textObservacion').val(), validar:'2',fecha:fecha}).done(function(data) {
                  if(data==1){
                      //se muestra el modal informando que el registro fue exitoso 
                      $('#modal_header').removeClass('btn-danger');
                      $('#modal_header').addClass('btn-primary');
                      $('.modal-title').text("Información"); 
                      $('#modal_body').text("Registro Exitoso!");  
                      $('#myModal').modal('show');
                      $('#codigo').val(''); $('#cedula').val('');$('#horai').val('');$('#respentrada').val(''); $('#grupo').val('');
                      $('#cubiculo').val('');$('#respsalida').val(''),$('#textObservacion').val('');//se colocan los campos en blanco 
                  }else{
                      //se informa que no se realizo el registro 
                      $('#modal_header').removeClass('btn-primary');
                      $('#modal_header').addClass('btn-danger');
                      $('.modal-title').text("Información"); 
                      $('#modal_body').text("No se pudo realizar el registro!");  
                      $('#myModal').modal('show');
                  }
              });
    }else{
          $('#modal_header').removeClass('btn-primary');
          $('#modal_header').addClass('btn-danger');
          $('.modal-title').text("Información"); 
          $('#modal_body').text("Debe de llenar todos los campos solicitados!");  
          $('#myModal').modal('show');
    }

});
</script>
<script type="text/javascript">$('#timepicker2').timepicker({maxhours:24,showMeridian: false}); //script que me permite seleccionar la fecha </script>  
<script>
  $('#fecha').datepicker({
    format: "yyyy/mm/dd",
    autoclose: true,
    todayHighlight: true,
    today: "Today",
  });
</script>