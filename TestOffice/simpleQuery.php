<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
date_default_timezone_set('America/Mexico_City');
$path = "/var/www/html/bayer/";


//Server settings

$mysqli = new mysqli('70.35.196.80', 'thernandez', 'J33pP4tr10t', 'lojackconnect.com.mx');

$sql = "SELECT a.n_dispositivo_id, a.c_dispositivo_mmid, b.c_unidad_alias, b.c_unidad_placa, b.c_unidad_vin FROM dat_Dispositivo a, dat_Unidad b, rel_UnidadDispositivo c WHERE a.n_dispositivo_id = c.n_dispositivo_id AND b.n_unidad_id = c.n_unidad_id AND a.n_estatus_id=4 AND b.n_estatus_id=1 AND c.n_estatus_id=1 AND b.n_cliente_id=14;";


$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()){
			   $idDevice = $row["n_dispositivo_id"];
				   $mmid     = $row["c_dispositivo_mmid"];
				   $alias    = $row["c_unidad_alias"];
				   $vin      = $row["c_unidad_vin"];
				   $placa    = $row["c_unidad_placa"];		   

 echo  $idDevice;
}