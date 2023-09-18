<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores de Comparación</title>
</head>
<body>
    
<?php
	
$mysqli = new mysqli('74.208.32.115', 'backupAppvant', 'qD&218Nr7Mg6LLVL4', 'lojackconnect.com.mx');


$Enero   = "SELECT n_dispositivo_id  FROM dat_HistoricoEnero     limit 10";
$Febrero = "SELECT n_dispositivo_id  FROM dat_HistoricoFebrero   limit 10";
$Marzo   = "SELECT n_dispositivo_id  FROM dat_HistoricoMarzo     limit 10";
$Junio   = "SELECT n_dispositivo_id  FROM dat_HistoricoJunio     limit 10";


$result1 = $mysqli->query($Enero);
$result2 = $mysqli->query($Febrero);
$result3 = $mysqli->query($Marzo);
$result4 = $mysqli->query($Junio);


while($row = $result1->fetch_assoc()){
			       $idEnero = $row['n_dispositivo_id'];

 echo  $idEnero;

}


while($row = $result2->fetch_assoc()){
			       $idFebrero = $row['n_dispositivo_id'];

 echo  $idFebrero;
}



while($row = $result3->fetch_assoc()){
			       $idMarzo = $row['n_dispositivo_id'];

 echo  $idMarzo;
}



while($row = $result4->fetch_assoc()){
			       $idJunio = $row['n_dispositivo_id'];

 echo  $idJunio;
}



	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		
	}

//https://foro.elhacker.net/programacion_cc/cambiar_un_switch_por_un_dowhile-t366339.0.html
	
?>
	

</body>
</html>

