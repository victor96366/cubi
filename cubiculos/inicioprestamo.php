<?php  include ("autenticar.php"); date_default_timezone_set('America/Bogota'); ?>
<div class="row content">
    <div class="row fila1">
        <div class="col-md-12 fila11">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                     <form class="form-inline">
                          <div class="form-group">
                            <label >Código: </label>
                            <input type="text" class="form-control" id="codigo" name="codigo_investigador" placeholder="106628939">
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
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre: </label>
                            <div class="col-lg-4">
                                <input class="form-control" id="nombre" type="text" name="nombre_investigador" placeholder="Andres">
                            </div>
                            <label class="col-lg-2 control-label" for="inputPrograma">Escuela: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="escuela" name="facultad" placeholder="UCP">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Carrera: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="carrera" name="programa" placeholder="IST">
                            </div>
                            <label class="col-lg-2 control-label" for="inputPrograma">Grupo: </label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="grupo" name="tipo_usuario" placeholder="1">
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
                  <legend>Registro Inicio</legend>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Gr. Investigación: </label>
                    <div class="col-lg-4">
                        <select class="form-control" tabindex="-1" id="investigacion" name="grupo_investigacion" aria-hidden="true" >
                          <optgroup label="FACULTAD DE CIENCIAS ECONÓMICAS Y ADMINISTRATIVAS">
                            <option value="Crecimiento economico y desarrollo">Crecimiento económico y desarrollo</option>
                            <option value="Desarrollo Empresarial">Desarrollo Empresarial</option>
                          </optgroup>
                          <optgroup label="FACULTAD DE CIENCIAS SOCIALES  HUMANAS Y DE LA EDUCACIÓN">
                            <option value="Clinica y Salud Mental">Clínica y Salud Mental</option>
                            <option value="Comunicacion y conflicto">Comunicación y conflicto</option>
                            <option value="Fenomeno Religioso">Fenómeno Religioso</option>
                            <option value="Comunicacion, educacion y cultura">Comunicación, educación y cultura</option>
                         </optgroup>
                         <optgroup label="FACULTAD DE ARQUITECTURA Y DISEÑO">
                            <option value="Arquitectura y Diseno">Arquitectura y Diseño</option>
                         </optgroup>
                         <optgroup label="FACULTAD DE CIENCIAS BASICAS E INGENIERIA">
                            <option value="GIII-UCP">Grupo de Investigación e Innovación en Ingeniería de la UCP ( GIII-UCP)</option>
                            <option value="Gema">Gema</option>
                         </optgroup>
                         <optgroup label="OTROS">
                            <option value="Semilleros y asesoria a estudiantes">Semilleros y asesoría a estudiantes</option>
                            <option value="libre">Uso Libre</option>
                         </optgroup>
                        </select>
                    </div>
                    <label class="col-lg-2 control-label" for="inputPrograma">No. Cubículo: </label>
                    <div class="col-lg-4">
                        <input type="number" class="form-control" id="num_cubiculo" name="numero_cubiculo" placeholder="1" min="1" max="7">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Hora Inicio: </label>
                    <div class="col-lg-4">
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="timepicker1" type="text"  name="hora_entrada" class="form-control input-small">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                    <label class="col-lg-2 control-label" for="inputPrograma">Respo. Entrada: </label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="responsable" name="responsable_inicio" placeholder="Juan Camilo">
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-lg-2 control-label" for="inputPrograma">Fecha: </label>
                   <div class="col-lg-4">
                      <div class="input-group">
                        <input class="form-control" id="fecha" value="<?php echo date("Y/m/d");?>" data-provide="datepicker" type="text" placeholder="Seleccione Fecha">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                    </div>
                 </div>
                 <div class="form-group">
                   <div class="col-lg-1 col-lg-offset-2">
                     <a class="btn btn-info"  id="insertar" role="button">Registrar</a>
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
<script>
function buscar() {
    var codigo = $("#codigo").val();
    if (codigo != "") {
        $.post("bdsiabuc.php", {codigo: codigo}, function(datos) {
            $("#formulario").html(datos);
        }); 
    } 
};
</script>
<script>
  $("#insertar").click(function(){
    if($('#codigo').val()!='' && $('#nombre').val()!='' && $('#escuela').val()!='' && $('#carrera').val()!='' && $('#grupo').val()!='' && $('#investigacion').val()!="" && $('#num_cubiculo').val()!="" &&  $('#responsable').val()!=""){
        $.post( "insertar.php", { codigo: $('#codigo').val(), nombre: $('#nombre').val(), escuela: $('#escuela').val(),carrera: $('#carrera').val(),grupo: $('#grupo').val(),investigacion: $('#investigacion').val(), cubiculo: $('#num_cubiculo').val(), responsable: $('#responsable').val(), hora: $('#timepicker1').timepicker().val(),fecha: $('#fecha').datepicker().val()}).done(function(data) {
                  if(data==1){
                      $('#modal_header').removeClass('btn-danger');
                      $('#modal_header').addClass('btn-primary');
                      $('.modal-title').text("Información"); 
                      $('#modal_body').text("Registro Exitoso!");  
                      $('#myModal').modal('show');
                      $('#codigo').val(''); $('#nombre').val('');$('#escuela').val('');$('#carrera').val(''); $('#grupo').val('');
                      $('#num_cubiculo').val('');$('#responsable').val('');
                  }else if(data==2){
                      $('#modal_header').removeClass('btn-primary');
                      $('#modal_header').addClass('btn-danger');
                      $('.modal-title').text("Información"); 
                      $('#modal_body').text("El modulo se encuentra ocupado!");  
                      $('#myModal').modal('show');
                  }else{
                      $('#modal_header').removeClass('btn-primary');
                      $('#modal_header').addClass('btn-danger');
                      $('.modal-title').text("Información"); 
                      $('#modal_body').text("No se pudo realizar el registro, puede tener un préstamo sin finalizar!");  
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
<script type="text/javascript">$('#timepicker1').timepicker({maxhours:24,showMeridian: false}); </script>
<script>
  $('#fecha').datepicker({
    format: "yyyy/mm/dd",
    autoclose: true,
    todayHighlight: true,
    today: "Today",
  });
</script>

