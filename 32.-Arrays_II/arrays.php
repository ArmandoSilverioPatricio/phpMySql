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
	/*
	Formas de declarar un array indexada
	$semana[] = "Lunes";
	$semana[] = "Martes";
	$semana[] = "Miercoles";
	$semana[] = "Jueves";
	
	$semana = array("Lunes", "Martes", "Miercoles", "Jueves");
	
	echo $semana[3];*/
	
	//Array asociativo
	
	$datos = array("Nombre"=>"Pedro", "Apellido"=>"Picapiedra", "Edad"=>31);
	/*
	$datos = "Martin";		
	//usando la funcion is_array para comprobar si es un array o no
	if(is_array($datos)){
		echo "Es un array <br>";
	}else{
		echo "No es un array <br>";
	}
	
	// echo $datos["Apellido"];*/
	
	//Recorriendo array asociativo usando el bucle foreach
	//Agregando elemento a un arrary asociativo
	$datos["Pais"] = "Mexico";
	
	foreach($datos as $clave => $valor){
		echo "A $clave le corresponde $valor <br>";
	}//Fin foreach
	
	/*//Recorriendo un arreglo indexado
	$semana[] = "Lunes";
	$semana[] = "Martes";
	$semana[] = "Miercoles";
	$semana[] = "Jueves";
	$semana[] = "Viernes";
	$semana[] = "Sabado";
	
	for($i = 0; $i < count($semana); $i ++){
		
		echo $semana[$i] . "<br>";
	}
	//Agregando nuevo elemento al array
	$semana[]= "Domingo";
	
	for($i = 0; $i < count($semana); $i ++){
		
		echo $semana[$i] . "<br>";
	}*/
	
	//Ordenando elementos por orden alfabetico
	//Usando la funcion sort();
	$semana2 = array("Lunes", "Martes", "Miercoles", "Jueves");
	
	sort($semana2);
	
	for($i = 0; $i < count($semana2); $i ++){
		
		echo $semana2[$i] ."<br>";
	}
	
	?>
</body>
</html>

