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
	breack detiene un bucle
	continue omite una iteracion
	*/
	
	
	//Aumentando la variabl $i en 1
		for($i = 0; $i <= 10; $i ++){
				echo "<p>Hemos entrado en el bucle </p>";
				echo $i;
			//Deteniendo bucle
			if($i == 6){
				echo"<p> Bucle interrumpido</p>";
				break;
			}
		}
	//Decremento de $ibase_add_user
		for($x = 10; $x >= 0; $x --){
			echo "<p> Usando el bucle for para decrementar un valor </p>";
			echo $x;
			
		}
		
	//Haciendo que iteración del bucle no se ejecute
		for($y = 0; $y <= 10; $y ++){
			echo "9 * $y = " . 9 * $y . "<br>";
		}
		echo "Hemos salido del bucle <br>";
	
	//Dividir un valor 
		for($z = 10; $z >= -10; $z --){
			
			if($z == 0){
				echo "Division entre 0 no es posible <br>";
				
				continue;
			}
			echo "9 / $z = " . 9 / $z . "<br>";
		}
		echo "Hemos salido del bucle de la división";
	?>
</body>
</html>

