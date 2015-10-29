<?php
	require_once('Socio.php');
	if(isset($_POST['AddSocio'])){
		$socio = new Socio();
		@$socio->setSocio($_POST['nombre'],$_POST['telefono'],$_POST['correo'],$_POST['fechanac'],$_POST['domicilio'],$_POST['fechasoc']);
		if($socio->addSocio()){
		?>
			<div class="alert alert-success" role="alert" id="valoracionTrue">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              Socio agregado correctamente.
            </div>
		<?php
		} else {
		?>
			<div class="alert alert-danger" role="alert" id="valoracionFalse">
              <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
              Error al agregar el socio a la base de datos.
            </div>
		<?php
		}
	} else if(isset($_POST['AddVinculo'])) {
		$socio = new Socio();
		$socio->getSocio($_POST['socio']);
		$socio->setVinculo($_POST['vinculo']);
		if(@$socio->addVinculo()){
		?>
			<div class="alert alert-success" role="alert" id="valoracionTrue">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              El v&iacute;nculo ha sido asignado correctamente.
            </div>
		<?php
		} else {
		?>
			<div class="alert alert-danger" role="alert" id="valoracionFalse">
              <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
              No ha sido posible asignar el v&iacute;nculo.
            </div>
		<?php
		}
	} else if($_POST['socio']!=""){
		$socio = new Socio();
		$socio->getSocio($_POST['socio']);
		?>
			<dl class="dl-horizontal">
			  <dt>Nombre</dt>
			  <dd><?php echo $socio->getNombre(); ?></dd>
			  <dt>Telefono</dt>
			  <dd><?php echo $socio->getTelefono(); ?></dd>
			  <dt>Correo</dt>
			  <dd><?php echo $socio->getCorreo(); ?></dd>
			  <dt>Domicilio</dt>
			  <dd><?php echo $socio->getDomicilio(); ?></dd>
			</dl>
		<?php
	}
?>