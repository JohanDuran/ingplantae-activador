<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IngPlantae</title>
	<?php require 'includes/includes_header.php'; ?>
</head>
<body onload="loadDataUpdate('<?=$_GET['activatorId']?>')">
	<?php require 'includes/navbar.php'?>
	<!--Content goes here-->
    <div class="container main-container">
		<div class="row">
			<h5 class="center">Editar valores correspondientes a la alarma </h5>
		    <form class="col s12" action="activator.php" onsubmit="return updateActivator('<?=$_GET['activatorId']?>')">
		    	
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="duracion_riego" type="number" min=0>
			          <label for="riego" id="activarDuracion" >Duración del riego (Segundos)</label>
			        </div>
			      </div>		      
			      
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="hora_riego" type="text" class="timepicker">
			          <label for="hora_riego" id="activarHora">Hora de activación</label>
			        </div>
			      </div>
			      
				<div class="switch">
					<label>
						Apagado
						<input type="checkbox" id='estado'>
						<span class="lever"></span>
						Encendido
					</label>
				</div>
				
				<br>
				<div class="inline">
					<?php for($i=1;$i<=8;$i++):?>
						<input type="checkbox" id="salida<?=$i?>" />
						<label for="salida<?=$i?>">salida<?=" ".$i?></label>
					<?php endfor;?>
				</div>				
				<br><br>
				<button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
					<i class="material-icons right">send</i>
				</button>
			</form>
    	</div>
	</div>
	<?php require 'includes/footer.php'?>
	<?php require 'includes/includes_js.php'; ?>
</body>
</html>