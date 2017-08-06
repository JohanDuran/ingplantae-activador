<?php
require 'db.php';
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		//conexión a la BD
		$conexion=connectDB();
		if($conexion!=null){
			$vars=['temperatura_interna'=>$_GET['temperatura_interna'], 'humedad_relativa'=>$_GET['humedad_relativa'], 'radiacion'=>$_GET['radiacion'], 'humedad_sustrato_A'=>$_GET['humedad_sustrato_A'],'humedad_sustrato_B'=>$_GET['humedad_sustrato_B']];
			insert($vars,$conexion);
		}
	}

?>