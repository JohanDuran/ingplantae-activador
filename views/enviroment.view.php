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

	<div class="container-fluid main-container">
	<!--Content goes here-->
	<div class="chart-frame">
        <div id="container-temperatura" class="chart"></div>
        <div id="container-relativa" class="chart"></div>
        <div id="container-radiacion" class="chart"></div>
        <div id="container-suelo" class="chart"></div>
    </div>    
	</div>
	<?php require 'includes/footer.php'?>
	<?php require 'includes/includes_js.php'; ?>
	<script type="text/javascript" src="js/charts.js"></script>
</body>
</html>