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
	
		/*SELECT campo1, campo2 FROM nameTable;
		
		$host = "74.208.32.115";
		$userName = "backupAppvant";
		$pass = "qD&218Nr7Mg6LLVL4";
		$dbName = "lojackconnect.com.mx";
		
		$mysqlBack = new mysqli($host, $userName, $pass, $dbName);
		
		if($mysqlBack -> connect_errno){
			echo "Fallo la conexion a MySQL: (" . $mysqlBack->errno . ") " .$mysqlBack->connect_errno;
		}
		echo $mysqlBack->host_info . "\n" . "<br>";
		
		$host = "70.35.196.80";
		$userName = "asilveiro";
		$pass = "NvBhnVzS5";
		$dbName = "lojackconnect.com.mx";
		
		$mysqlProd = new mysqli($host, $userName, $pass, $dbName);
		
		if($mysqlProd -> connect_errno){
			echo "Fallo la conexion a MySQL: (" . $mysqlProd->errno . ") " .$mysqlProd->connect_errno;
		}
		echo $mysqlProd->host_info . "\n" . "<br>";*/
		
		
		/*
		Modos de conectar una base de datos
		Orientado a objetos: usando la clase mysqli
		Por procedimientos:usando la funcion mysqli_connect
		*/
		
		//Conexion por procedimientos 
		$host = "74.208.32.115";
		$userName = "backupAppvant";
		$pass = "qD&218Nr7Mg6LLVL4";
		$dbName = "lojackconnect.com.mx";
		
		$conBack = mysqli_connect($host, $userName, $pass, $dbName);
		
		$queryBack = 
		
		$hostProd = "70.35.196.80";
		$userNameProd = "asilveiro";
		$passProd = "NvBhnVzS5";
		$dbNameProd = "lojackconnect.com.mx";
		
		$conProd = mysqli_connect($hostProd, $userNameProd, $passProd, $dbNameProd);
		if($conProd -> connect_errno){
			echo "Fallo la conexion a MySQL: (" . $conProd->errno . ") " .$conProd->connect_errno;
		}
		echo $conProd->host_info . "\n" . "<br>";
		
		$queryProd = "SELECT a.n_dispositivo_id, a.c_dispositivo_mmid, b.c_unidad_alias, b.c_unidad_placa, b.c_unidad_vin 
					  FROM dat_Dispositivo a, dat_Unidad b, rel_UnidadDispositivo c 
					  WHERE a.n_dispositivo_id = c.n_dispositivo_id AND b.n_unidad_id = c.n_unidad_id AND a.n_estatus_id=4 AND b.n_estatus_id=1 AND c.n_estatus_id=1 AND b.n_cliente_id=14;";
					  
		//Ejecutamos la consulta usando la funcion mysqli_query(conexion, sql);
		//Con esto acabamos de ejecutar la consulta y cargamos en memoria los datos 
		$resultQueryProd = mysqli_query($conProd, $queryProd);
		
		//Usando el metodo mysqli_fetch_row para mirar dentro de la tabla virtual
		
		$fila = mysqli_fetch_row($resultQueryProd); //Almacenando los datos en un array que en este caso el fila
		
		echo $fila[0] . " ";
		echo $fila[1] . " ";
		echo $fila[2] . " ";
		echo $fila[3] . " ";
		echo $fila[4] . " ";
	?>
</body>
</html>


