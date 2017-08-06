<?php
	require 'db.php';
	// Set the JSON header
	header("Content-type: text/json");
	if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['variable'])) {
		//conexión a la BD
		$conexion=connectDB();
		if($conexion!=null){
			$data=json_encode(select($_GET['variable'], $conexion));
			echo str_replace(' ', '', $data);
		}
	}
?>