<?php
header("Content-type: text/json");

function connectDB(){
    try {
        $mbd = new PDO('mysql:host=localhost;dbname=ingplantaeDB', 'johanduran', '');
        return $mbd;
    } catch (PDOException $e) {
        print "¡Error!: " . 'Error al conectar a la Base de Datos' . "<br/>";
        return null;
    }
}

function select($var, $mbd){
    $response = array();
    $ayer = date ("Y-m-d H:i:s", time() - 24 * 60 * 60); 
    $manana = date ("Y-m-d H:i:s", time() + 24 * 60 * 60);
    $q='SELECT '.$var.', fecha_stamp from variables where fecha_stamp BETWEEN \''.$ayer.'\' AND \''.$manana.'\'';
    $query=$mbd->query($q);
    if($query!=null){
        $contador=0;
        foreach($query as $fila) {
            //if($contador<20){
            $response[]=[strtotime($fila['fecha_stamp'])*1000,floatval($fila[$var])];
            $contador++;
            //}
        }
        $cantidadElem = count($response);
        if($cantidadElem>20){
            array_splice($response,0,$cantidadElem-20);
        }
        $mbd = null;        
        return $response;
    }else{
        return null;
    }
}

function insert($vars, $mbd){
    $sentencia = $mbd->prepare("INSERT INTO variables (temperatura_interna, humedad_relativa, radiacion, humedad_sustrato_A, humedad_sustrato_B) VALUES (:temperatura_interna, :humedad_relativa, :radiacion, :humedad_sustrato_A, :humedad_sustrato_B)");
    $sentencia->bindParam(':temperatura_interna', $vars['temperatura_interna']);
    $sentencia->bindParam(':humedad_relativa', $vars['humedad_relativa']);
    $sentencia->bindParam(':radiacion', $vars['radiacion']);
    $sentencia->bindParam(':humedad_sustrato_A', $vars['humedad_sustrato_A']);
    $sentencia->bindParam(':humedad_sustrato_B', $vars['humedad_sustrato_B']);
    $sentencia->execute();
}

?>