<?php 
    if(isset($_GET['variable'])){
        $handle=fopen("encender.txt",'w')or die("Unable to open file!");
        fwrite($handle,'1');
        //echo fgets($handle);
        fclose($handle);
    }else{
        $handle = fopen("encender.txt", "r") or die("Unable to open file!");
        //se lee la bandera 1 indica regar 0 no
        $valorEncendido=fgets($handle);
        fclose($handle);
        //independientemente se escribe cero
        $handle=fopen("encender.txt",'w')or die("Unable to open file!");
        fwrite($handle,'0');
        fclose($handle);
        if($valorEncendido=='0'){
            echo "apagado";
        }else{
            echo "encender";
        }
        
    }
?>