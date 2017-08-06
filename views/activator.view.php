<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IngPlantae</title>
	<?php require 'includes/includes_header.php'; ?>
</head>
<body onload="loadDataView();">
	<?php require 'includes/navbar.php'?>
	<!--Content goes here-->
    <div class="container main-container">
        <div class="table-responsive">
            <table class="table" id="tableActivators">
                <thead>
                    <tr>
                        <!--<th style="display:none;">Alarma</th>-->
                        <th>Estado</th>
                        <th>Hora activación</th>
                        <th>Tiempo de riego</th>
                        <th>Salidas activas</th>
                        <th>--------</th>
                    </tr>
                </thead>
                <tbody id='tableBodyActivators'>

                </tbody>
            </table>
            <a class="btn-floating btn-small waves-effect waves-light" href="activator_add_alarm.php"><i class="material-icons">add</i></a>
        </div>    
    </div>
	<?php require 'includes/footer.php'?>
	<?php require 'includes/includes_js.php'; ?>
</body>
</html>