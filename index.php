<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCREEN-JUNKIES</title>
 
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
    <link href="css/tema.css" rel="stylesheet" media="screen">
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <!-- El logotipo y el icono que despliega el menú se agrupan
           para mostrarlos mejor en los dispositivos móviles -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
          <span class="sr-only">Desplegar navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">SCREEN-JUNKIES</a>
      </div>
     
    </nav>

    <div class="contaier">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="page-header">
            <h4>Control de Socios</h4>
          </div>
          <div class="col-lg-12">
            <ul class="nav nav-pills">
              <li role="presentation" class="active" id="tab1"><a href="#">Agregar Socio</a></li>
              <li role="presentation" id="tab2"><a href="#">Vincular Socio</a></li>
            </ul>
          </div>
          <?php
            require_once('Socio.php');
          ?>
          <div class="col-lg-12" id="AddVinculo" style="display:none;">
            <div class="row" id="responseVinculo"></div>
            <form>
              <div class="form-group">
                <select class="form-control" id="selectSocio">
                  <option></option>
                  <?php
                    $socio = new Socio();
                    $lista = $socio->getAll();
                    $x = 0;
                    while($lista[$x]!=null){
                      echo '<option value="'.$lista[$x]->getId().'">'.$lista[$x]->getNombre().'</option>';
                      $x++;
                    }
                  ?>
                </select>
              </div>
              
              <div class="row" id="socio"></div>
              
              <div class="form-group">
                <select class="form-control" id="selectVinculo">
                  <option></option>
                  <?php
                    $x = 0;
                    while($lista[$x]!=null){
                      echo '<option value="'.$lista[$x]->getId().'">'.$lista[$x]->getNombre().'</option>';
                      $x++;
                    }
                  ?>
                </select>
              </div>

              <div class="row" id="socio2"></div>
              <button class="btn btn-primary btn-lg" id="btnVinculo">Agregar Vinculo</button>
              <input type="reset" class="btn btn-default btn-lg" value="Cancelar"/>
            </form>
          </div>
          <div class="col-lg-12" id="AddSocio">
            <div class="row" id="responseSoc"></div>
            <form>
              <div class="form-group">
                <label for="txtNombre">Nombre</label>
                <input type="text" class="form-control" id="txtNombre" placeholder="Nombre del Socio">
              </div>
              <div class="form-group">
                <label for="txtTelefono">Tel&eacute;fono</label>
                <input type="text" class="form-control" id="txtTelefono" placeholder="N&uacute;mero telef&oacute;nico">
              </div>
              <div class="form-group">
                <label for="txtCorreo">Correo</label>
                <input type="email" class="form-control" id="txtCorreo" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="txtFechaNac">Fecha de Nacimiento</label>
                  <div class='input-group date' id='datetimepicker1'>
                      <input type='text' class="form-control" id="txtFechaNac" placeholder="Fecha de nacimiento del Socio"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
              <div class="form-group">
                <label for="txtDomicilio">Domicilio</label>
                <input type="text" class="form-control" id="txtDomicilio" placeholder="Domicilio del Socio">
              </div>
              <div class="form-group">
                <label for="txtFechaSoc">Fecha de Asociaci&oacute;n</label>
                  <div class='input-group date' id='datetimepicker2'>
                      <input type='text' class="form-control" id="txtFechaSoc" placeholder="Fecha en que se hace Socio"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
              <button class="btn btn-primary btn-lg" id="btnSocio">Agregar Socio</button>
              <input type="reset" value="Cancelar" class="btn btn-default btn-lg">
            </form>
          </div> 
        </div>
      </div>
    </div>

     <footer class="footer">
      <div class="container text-center">
        <p class="text-muted">Screen-Junkies&#174; 2015, An&aacute;lisis y Dise&ntilde;o de Sistemas 1</p>
      </div>
    </footer>
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>


    <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });

      $(function () {
          $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY'
          });
      });

      $(function () {
          $('#datetimepicker2').datetimepicker({
            format: 'DD/MM/YYYY'
          });
      });

      $('#tab1').click(function(){
          $('#tab1').addClass('active');
          $('#tab2').removeClass('active');
          $('#AddSocio').css("display", "block");
          $('#AddVinculo').css("display", "none");
      });

      $('#tab2').click(function(){
          $('#tab2').addClass('active');
          $('#tab1').removeClass('active');
          $('#AddSocio').css("display", "none");
          $('#AddVinculo').css("display", "block");
      });

      $('#selectSocio').click(function(){
        var parametros = {
          "socio": $('#selectSocio').val()
        };
        $.ajax({
          data: parametros,
          url: "ejecucion.php",
          type: "POST",
          success: function(response){
            $('#socio').text("");
            $('#socio').append(response);
          }
        });
      });

      $('#selectVinculo').click(function(){
        var parametros = {
          "socio": $('#selectVinculo').val()
        };
        $.ajax({
          data: parametros,
          url: "ejecucion.php",
          type: "POST",
          success: function(response){
            $('#socio2').text("");
            $('#socio2').append(response);
          }
        });
      });

      $('#btnVinculo').click(function(){
        var parametros = {
          "AddVinculo": "1",
          "socio": $('#selectSocio').val(),
          "vinculo": $('#selectVinculo').val()
        };
        $.ajax({
          data: parametros,
          url: "ejecucion.php",
          type: "POST",
          success: function(response){
            $('#responseVinculo').text("");
            $('#responseVinculo').append(response);
          }
        });
      });

      $('#btnSocio').click(function(){
        var parametros = {
          "AddSocio": "1",
          "nombre": $('#txtNombre').val(),
          "telefono": $('#txtTelefono').val(),
          "correo": $('#txtCorreo').val(),
          "fechanac": $('#txtFechaNac').val(),
          "domicilio": $('#txtDomicilio').val(),
          "fechasoc": $('#txtFechaSoc').val()
        };
        $.ajax({
          data: parametros,
          url: "ejecucion.php",
          type: "POST",
          success: function(response){
            $('#responseSoc').text("");
            $('#responseSoc').append(response);
          }
        });
      });
    </script>

    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
  </body>
</html>