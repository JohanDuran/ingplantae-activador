<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IngPlantae</title>
	<?php require 'includes/includes_header.php'; ?>
</head>
<body>
	<?php require 'includes/navbar.php'?>
	<!--Content goes here-->
    <div class="container main-container">
		<div class="row">
			<h5 class="center">Complete los datos de la nueva alarma</h5>
		    <form action="activator.php" onsubmit="return writeActivator()" class="col s12">
				
				<div class="row">
					<div class="input-field col s12">
						<input id="duracion_riego" type="number" min=0 required>
						<label for="riego">Duración del riego (Segundos)</label>
					</div>
				</div>		      
			      
				<div class="row">
					<div class="input-field col s12">
						<input id="hora_riego" type="text" class="timepicker" required>
						<label for="hora_riego">Hora de activación</label>
					</div>
				</div>
				
				<div class="switch">
					<label>
						Apagado
						<input type="checkbox" id="estado">
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
				<button class="btn waves-effect waves-light" type="submit" name="action">Agregar
					<i class="material-icons right">send</i>
				</button>
			</form>
    	</div>
	</div>
	<?php require 'includes/footer.php'?>
	<?php require 'includes/includes_js.php'; ?>
</body>
</html>