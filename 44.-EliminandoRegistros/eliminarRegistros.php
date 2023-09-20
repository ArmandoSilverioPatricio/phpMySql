<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $estatusName = $_GET["estatusName"];
    require("connection.php");
    $connLab = mysqli_connect($host, $user, $pass);
    if(mysqli_connect_errno()){
        echo "Fallo la conexion a la Base de datos";
        exit();
    }else{
        echo "La conexion se ha establecido corretamente !!!<br><br> ";
    }
    mysqli_select_db($connLab, $dbName) or die ("No se encontro la BD");
    mysqli_set_charset($connLab, "utf8");

    $queryInsert = "INSERT INTO cat_Estatus_copy1 (c_estatus_nombre ) VALUES ('$estatusName')";
    $resQueryInsert = mysqli_query($connLab, $queryInsert);

    if($resQueryInsert == false){
        echo "Error en la consulta";
    }else{
        echo "Registro guardado<br><br>";

        echo "<table><tr><td>$estatusName</td></tr></table>";
    }
    mysqli_close($connLab);
?>
</body>
</html>